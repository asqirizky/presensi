<?php

namespace App\Http\Controllers\Layanan;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Layanan\Layanan_plagiasi;
use App\Models\Layanan\Riwayat_plagiasi;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CekplagiasiController extends Controller
{
    public function index()
    {

        // Ambil rata-rata plagiasi terakhir per prodi (via relasi), angkatan 2021
        $rataPlagiasi = DB::table('prodis as p')
        ->leftJoin('mahasiswas as m', function ($join) {
            $join->on('p.id', '=', 'm.prodi_id')
                ->where('m.angkatan', '2021');
        })
        ->leftJoin('layanan_plagiasis as lp', 'm.id', '=', 'lp.mahasiswa_id')
        ->leftJoin('riwayat_plagiasis as rp', function ($join) {
            $join->on('lp.id', '=', 'rp.layanan_plagiasi_id')
                ->whereRaw('rp.created_at = (
                    SELECT MAX(created_at)
                    FROM riwayat_plagiasis
                    WHERE layanan_plagiasi_id = lp.id
                )');
        })
        ->select(
            'p.prodi as prodi',
            'p.fakultas',
            DB::raw('AVG(rp.persentase) as rata_plagiasi')
        )
        ->groupBy('p.id', 'p.prodi', 'p.fakultas')
        ->orderBy('p.fakultas')
        ->get();


        $totalRataPlagiasi = round(
            $rataPlagiasi->filter(fn($item) => $item->rata_plagiasi !== null)->avg('rata_plagiasi'), 2
        );


        $plagiasi = Layanan_plagiasi::with('mahasiswa')
        ->orderByDesc('updated_at') // urutkan berdasarkan waktu terakhir diedit
        ->get();

        // Hitung jumlah mahasiswa yang cek lebih dari 1 kali
        $riwayat = Riwayat_plagiasi::with('layananPlagiasi.mahasiswa')->get();

        $grouped = $riwayat->groupBy(function ($item) {
            return optional($item->layananPlagiasi)->mahasiswa_id;
        });

        $jumlahPutra = 0;
        $jumlahPutri = 0;

        foreach ($grouped as $group) {
            $mahasiswa = optional($group->first()->layananPlagiasi)->mahasiswa;

            if (!$mahasiswa) continue;

            // Filter hanya angkatan 2020 dan yang cek > 1 kali
            if (($mahasiswa->angkatan ?? substr($mahasiswa->nim, 0, 4)) != 2021) continue;
            if ($group->count() <= 1) continue;

            // Pisahkan berdasarkan jenis kelamin
            if ($mahasiswa->jk === 'Putra') {
                $jumlahPutra++;
            } elseif ($mahasiswa->jk === 'Putri') {
                $jumlahPutri++;
            }
        }

        $jumlahTotal = $jumlahPutra + $jumlahPutri;


        $grouped = $riwayat
            ->groupBy(function ($item) {
                return optional($item->layananPlagiasi)->mahasiswa_id;
            });

        $putra = 0;
        $putri = 0;

        foreach ($grouped as $group) {
            $mahasiswa = optional($group->first()->layananPlagiasi)->mahasiswa;
            if (!$mahasiswa) continue;

            // Filter hanya angkatan 2021
            if ($mahasiswa->angkatan != 2021) continue;

            $bayar = max($group->count() - 1, 0) * 5000;

            if ($mahasiswa->jk == 'Putra') {
                $putra += $bayar;
            } elseif ($mahasiswa->jk == 'Putri') {
                $putri += $bayar;
            }
        }

        $totalPendapatan = $putra + $putri;

        return view('admin.Layanan.cekplagiasi.index', compact('plagiasi' , 'rataPlagiasi', 'jumlahTotal' , 'totalPendapatan', 'putra', 'putri', 'jumlahPutra' , 'jumlahPutri' , 'totalRataPlagiasi'));
    }

    public function rekap()
    {
        $rataPlagiasi = DB::table('prodis as p')
            ->leftJoin('mahasiswas as m', function ($join) {
                $join->on('p.id', '=', 'm.prodi_id')
                    ->where('m.angkatan', '2021');
            })
            ->leftJoin('layanan_plagiasis as lp', 'm.id', '=', 'lp.mahasiswa_id')
            ->leftJoin('riwayat_plagiasis as rp', function ($join) {
                $join->on('lp.id', '=', 'rp.layanan_plagiasi_id')
                    ->whereRaw('rp.created_at = (
                        SELECT MAX(created_at)
                        FROM riwayat_plagiasis
                        WHERE layanan_plagiasi_id = lp.id
                    )');
            })
            ->leftJoin('riwayat_plagiasis as all_rp', 'lp.id', '=', 'all_rp.layanan_plagiasi_id')
            ->select(
                'p.prodi as prodi',
                'p.fakultas',
                DB::raw('COALESCE(AVG(rp.persentase), 0) as rata_plagiasi'),
                DB::raw('COUNT(DISTINCT CASE WHEN all_rp.id IS NOT NULL THEN m.id END) as jumlah_mahasiswa_cek'),
                DB::raw('COUNT(DISTINCT CASE WHEN rp.persentase <= 30 THEN m.id END) as jumlah_plagiasi_ok')
            )
            ->groupBy('p.id', 'p.prodi', 'p.fakultas')
            ->orderByDesc(DB::raw('COALESCE(AVG(rp.persentase), 0)'))
            ->get();

        $totalRataPlagiasi = round(
            $rataPlagiasi->filter(fn($item) => $item->jumlah_mahasiswa_cek > 0)->avg('rata_plagiasi'), 2
        );

        return view('admin.Layanan.cekplagiasi.rekap', compact('rataPlagiasi' , 'totalRataPlagiasi'));
    }


    public function create()
    {
        $mahasiswa = Mahasiswa::latest()->get();
        $dosen = Dosen::latest()->get();

        return view('admin.Layanan.cekplagiasi.tambah', compact('mahasiswa', 'dosen'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $nim = $request->nim;

        // Cek apakah nim sudah ada dan punya data plagiasi
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa) {
            $sudahAdaPlagiasi = Layanan_plagiasi::where('mahasiswa_id', $mahasiswa->id)->exists();

            if ($sudahAdaPlagiasi) {
                return redirect()->back()->with('error', 'Mahasiswa ini sudah memiliki data plagiasi.');
            }
        }
        
        $prodi = Prodi::where('prodi', $request->prodi)->first();

        if (!$prodi) {
            return back()->withErrors(['prodi' => 'Prodi tidak ditemukan']);
        }

        // Jika belum ada, buat mahasiswa baru atau gunakan yang sudah ada
        if (!$mahasiswa) {
            $mahasiswa = Mahasiswa::create([
                'nim' => $nim,
                'angkatan' => '2021',
                'nama' => $request->nama,
                'prodi' => $request->prodi,
                'jk' => $request->jk,
                'prodi_id' => $prodi->id,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
            ]);
        }

        // Format nama file
        $fileExtension = $request->file('file')->getClientOriginalExtension();
        $fileName = Str::slug('File_'.$mahasiswa->nama . '_' . $mahasiswa->nim . '_' . $mahasiswa->prodi) . '.' . $fileExtension;

        // Upload ke Google Drive
        $filePath = $request->file('file')->storeAs('', $fileName, 'google');

        // Simpan layanan plagiasi
        Layanan_plagiasi::create([
            'mahasiswa_id' => $mahasiswa->id,
            'dosen_id' => $request->dosen_id,
            'dosen2_id' => $request->dosen2_id,
            'judul' => $request->judul,
            'file' => $filePath,
        ]);

        return redirect('/admin/layanan-cekplagiasi')->with('success', 'Data berhasil disimpan.');
    }
    
    // Download file dari Google Drive
    public function download($id)
    {
        $plagiasi = Layanan_plagiasi::findOrFail($id);
        $fileContent = Storage::disk('google')->get($plagiasi->file);

        return response($fileContent)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="' . $plagiasi->file . '"');
    }
    public function downloadhasil($id)
    {
        $riwayat = Riwayat_plagiasi::findOrFail($id);

        $fileContent = Storage::disk('google')->get($riwayat->hasil);

        return response($fileContent)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="' . $riwayat->hasil . '"');
    }

    public function tambah(Request $request)
    {

        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

         // Cek apakah mahasiswa sudah memiliki entri di layanan_plagiasis
        $existingEntry = Layanan_plagiasi::where('nama', $request->nama)->exists();

        if ($existingEntry) {
            return redirect()->back()->with('error', 'Yang bersangkutan sudah memiliki data plagiasi.');
        }

        // Buat nama file sesuai dengan NIM, nama mahasiswa, dan persentase
        $fileExtension = $request->file('file')->getClientOriginalExtension();
        $fileName = Str::slug('File_'.$request->nama) . '.' . $fileExtension;

        // Unggah file ke Google Drive
        $filePath = $request->file('file')->storeAs('', $fileName, 'google');

         // Simpan data ke database
         Layanan_plagiasi::create([
             'nama' => $request->nama,
             'judul' => $request->judul,
             'ket' => $request->ket,
             'file' => $filePath,
         ]);


        return redirect('/admin/layanan-cekplagiasi')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        $mahasiswa = Mahasiswa::latest()->get();
        $dosen = Dosen::latest()->get();

        return view('admin.Layanan.cekplagiasi.edit', compact('mahasiswa', 'dosen' , 'plagiasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $plagiasi = Layanan_plagiasi::findOrFail($id);

        // Update data mahasiswa terkait (alamat)
        if ($plagiasi->mahasiswa_id) {
            $mahasiswa = Mahasiswa::find($plagiasi->mahasiswa_id);
            if ($mahasiswa) {
                $mahasiswa->nama = $request->nama; // kalau nama bisa diubah
                $mahasiswa->kecamatan = $request->kecamatan;
                $mahasiswa->kabupaten = $request->kabupaten;
                $mahasiswa->provinsi = $request->provinsi;
                $mahasiswa->save();
            }
        }

        // Update dosen pembimbing
        $plagiasi->dosen_id = $request->dosen_id;
        $plagiasi->dosen2_id = $request->dosen2_id;

        // Update judul
        $plagiasi->judul = $request->judul;

        // Handle file jika diupload
        if ($request->hasFile('file')) {
            // hapus file lama dari Google Drive
            if ($plagiasi->file) {
                Storage::disk('google')->delete($plagiasi->file);
            }

            $fileExtension = $request->file('file')->getClientOriginalExtension();
            $fileCount = Layanan_plagiasi::where('mahasiswa_id', $plagiasi->mahasiswa_id)->count();

            $fileName = Str::slug(
                ($plagiasi->mahasiswa->nama ?? $plagiasi->nama) . '_' .
                ($plagiasi->mahasiswa->nim ?? '') . '_' .
                ($plagiasi->mahasiswa->prodi ?? '') . '_' .
                $fileCount
            ) . '.' . $fileExtension;

            $filePath = $request->file('file')->storeAs('', $fileName, 'google');
            $plagiasi->file = $filePath;
        }

        $plagiasi->save();

        return redirect('/admin/layanan-cekplagiasi')->with('success', 'Data berhasil diperbarui.');
    }

    public function perbarui(Request $request, $id)
    {
        $request->validate([
            'file' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        // Ambil data plagiasi berdasarkan ID
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        // Jika ada file baru, hapus file lama dan upload yang baru
        if ($request->hasFile('file')) {
            // Hapus file lama dari Google Drive
            Storage::disk('google')->delete($plagiasi->file);

            // Buat nama file baru
            $fileExtension = $request->file('file')->getClientOriginalExtension();
            $fileName = Str::slug($plagiasi->nama) . '.' . $fileExtension;

            // Upload file baru
            $filePath = $request->file('file')->storeAs('', $fileName, 'google');

            $plagiasi->update([
                'nama' => $request->nama,
                'judul' => $request->judul,
                'ket' => $request->ket,
                'file' => $filePath
            ]);
        }else{
            $plagiasi->update([
                'nama' => $request->nama,
                'judul' => $request->judul,
                'ket' => $request->ket,
            ]);
        }

        return redirect('/admin/layanan-cekplagiasi')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        // Hapus file dari Google Drive jika ada
        if ($plagiasi->file) {
            Storage::disk('google')->delete($plagiasi->file);
        }

        // Hapus data dari database
        $plagiasi->delete();

        return redirect('/admin/layanan-cekplagiasi')->with('success', 'Data berhasil dihapus!');
    }
    
    public function uploadUlang(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        // Ambil data layanan plagiasi
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        // Ambil relasi mahasiswa jika ada
        $mahasiswa = Mahasiswa::find($plagiasi->mahasiswa_id);

        // Hitung update count saat ini dan siapkan untuk upload baru
        $fileCount = ($plagiasi->update_count ?? 1) + 1;

        if ($request->hasFile('file')) {
            // Hapus file lama dari Google Drive
            if ($plagiasi->file) {
                Storage::disk('google')->delete($plagiasi->file);
            }

            // Ekstensi file
            $fileExtension = $request->file('file')->getClientOriginalExtension();

            // Nama file format: file_nama_nim_prodi_keX.ext
            $fileName = Str::slug(
                ($mahasiswa->nama ?? $plagiasi->nama) . '_' .
                ($mahasiswa->nim ?? '') . '_' .
                ($mahasiswa->prodi ?? '') . '_' .
                $fileCount
            ) . '.' . $fileExtension;

            // Upload file ke Google Drive
            $filePath = $request->file('file')->storeAs('', $fileName, 'google');

            // Simpan ke model
            $plagiasi->file = $filePath;
            $plagiasi->update_count = $fileCount;
            $plagiasi->updated_at = now(); // update waktu terakhir
            $plagiasi->save();
        }

        return redirect()->back()->with('success', 'File berhasil diunggah ulang.');
    }

    public function hasil(Request $request, $id)
    {
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        if ($plagiasi->nama == null) {
            # code...
            // Ambil data plagiasi berdasarkan ID
            $mahasiswa = Mahasiswa::where('id', $plagiasi->mahasiswa_id)->firstOrFail();

            // Cek jumlah file mahasiswa yang sudah diunggah untuk menambah nomor urut
            $timestamp = Carbon::now()->format('YmdHis');
            // Buat nama file sesuai format: NIM_Nama_Prodi_X
            $fileExtension = $request->file('hasil')->getClientOriginalExtension();
            $fileName = Str::slug('hasil_'.$mahasiswa->nim . '_' . $mahasiswa->nama . '_' . $mahasiswa->prodi . '_' . $request->persentase . '_' . $timestamp) . '.' . $fileExtension;

            // Upload file baru ke Google Drive
            $filePath = $request->file('hasil')->storeAs('', $fileName, 'google');


            $riwayat = Riwayat_plagiasi::create([
                'layanan_plagiasi_id' => $plagiasi->id,
                'persentase' => $request->persentase,
                'hasil' => $filePath
            ]);

            $dosen1 = Dosen::where('id', $plagiasi->dosen_id)->first();
            $dosen2 = Dosen::where('id', $plagiasi->dosen2_id)->first();

            $curl = curl_init();

            // Pesan ke dosen
            $pesanDosen = '_Assalamu’alaikum warahmatullahi wabarakatuh_

Yth. Bpk/Ibu Dosen Pembimbing,

Dengan ini kami informasikan bahwa Mahasiswa bimbingan Bapak/Ibu:

Nama : *'.$mahasiswa->nama.'*
Program Studi : *'.$mahasiswa->prodi.'*
Judul Skripsi : *_"'.$plagiasi->judul.'"_*

telah melakukan cek plagiasi skripsi ke-'.$plagiasi->update_count.' di Perpustakaan Ibrahimy pada '. Carbon::parse($riwayat->created_at)->isoFormat('dddd, D MMMM Y') .' dengan hasil persentase plagiasi *'.$request->persentase.'%*.

dokumen hasil cek plagiasi dapat di unduh melalui tautan berikut:
📃 https://www.lib.ibrahimy.ac.id/layanan-cekplagiasi/hasil/'.$riwayat->id.'

Terima kasih atas perhatian dan kerja sama Bapak/Ibu.

_Wassalamu’alaikum warahmatullahi wabarakatuh._

ⓘ _Pesan ini dikirim secara otomatis melalui Sistem Layanan Cek Plagiasi Perpustakaan Ibrahimy._
🌐 www.lib.ibrahimy.ac.id';



            // Pesan ke prodi
            $pesanProdi = '_Assalamu’alaikum warahmatullahi wabarakatuh_

Yth. Bapak/Ibu Kepala Program Studi '.$mahasiswa->prodi.',

Dengan ini kami informasikan bahwa salah satu mahasiswa dari Program Studi '.$mahasiswa->prodi.':

Nama : *'.$mahasiswa->nama.'*
Program Studi : *'.$mahasiswa->prodi.'*
Judul Skripsi : *_"'.$plagiasi->judul.'"_*

telah melakukan cek plagiasi skripsi ke-'.$plagiasi->update_count.' di Perpustakaan Ibrahimy pada '. Carbon::parse($riwayat->created_at)->isoFormat('dddd, D MMMM Y') .' dengan hasil persentase plagiasi *'.$request->persentase.'%*.

dokumen hasil cek plagiasi dapat di unduh melalui tautan berikut:
📃 https://www.lib.ibrahimy.ac.id/layanan-cekplagiasi/hasil/'.$riwayat->id.'

Terima kasih atas perhatian dan kerja sama Bapak/Ibu.

_Wassalamu’alaikum warahmatullahi wabarakatuh._

ⓘ _Pesan ini dikirim secara otomatis melalui Sistem Layanan Cek Plagiasi Perpustakaan Ibrahimy._
🌐 www.lib.ibrahimy.ac.id';

            $token = 'CtBuHqwhxLBH4zAPsJcn';

            // Kirim ke dosen 1
            if ($dosen1 && $dosen1->nomor) {
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POSTFIELDS => array(
                        'target'  => $dosen1->nomor,
                        'message' => $pesanDosen
                    ),
                    CURLOPT_HTTPHEADER => array('Authorization: ' . $token),
                ));
                curl_exec($curl);
            }

            // Kirim ke dosen 2
            if ($dosen2 && $dosen2->nomor) {
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POSTFIELDS => array(
                        'target'  => $dosen2->nomor,
                        'message' => $pesanDosen
                    ),
                    CURLOPT_HTTPHEADER => array('Authorization: ' . $token),
                ));
                curl_exec($curl);
            }

            // Kirim ke prodi jika ada
            $kontakProdi = optional($mahasiswa->programstudi)->kontak;
            if ($kontakProdi) {
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POSTFIELDS => array(
                        'target'  => $kontakProdi,
                        'message' => $pesanProdi
                    ),
                    CURLOPT_HTTPHEADER => array('Authorization: ' . $token),
                ));
                curl_exec($curl);
            }

            // Tutup cURL setelah semua pengiriman selesai
            curl_close($curl);


        }else{

            $timestamp = Carbon::now()->format('YmdHis');
            // Buat nama file baru
            $fileExtension = $request->file('hasil')->getClientOriginalExtension();
            $fileName = Str::slug('Hasil_'.$plagiasi->nama. '-' . $request->persentase .'-' . $timestamp) . '.' . $fileExtension;

            // Upload file baru
            $filePath = $request->file('hasil')->storeAs('', $fileName, 'google');

            Riwayat_plagiasi::create([
                'layanan_plagiasi_id' => $plagiasi->id,
                'persentase' => $request->persentase,
                'hasil' => $filePath
            ]);
        }


        return back()->with('success', 'Hasil Plagiasi berhasil diupload.');

    }

    public function cetak($id)
    {
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        $pdf = Pdf::loadView('admin.Layanan.cekplagiasi.pdf', [
            'plagiasi' => $plagiasi,
        ]);

        $pdf->setPaper('A4', 'portrait');

        $namaFile = '' . 
            ($plagiasi->mahasiswa_id === null 
                ? $plagiasi->nama 
                : $plagiasi->mahasiswa->nama) . 
            ' - SKHCP Perpustakaan Ibrahimy.pdf';

        return $pdf->stream($namaFile);
    }
    
    public function bebaspustaka()
    {
        $plagiasi = Layanan_plagiasi::with('mahasiswa')->latest()->get();

        return view('admin.Layanan.bebaspustaka.2021.bebaspustaka', compact('plagiasi'));
    }

    public function verifikasi($id)
    {
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        return view('admin.Layanan.bebaspustaka.2021.verifikasi', compact('plagiasi'));
    }


    public function verified(Request $request, $id)
    {
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        // Nonaktifkan update timestamp sementara
        $plagiasi->timestamps = false;

        $plagiasi->update([
            'ket' => $request->verifikasi,
        ]);

        return back()->with('success', 'Alhamdulillah, dokumen berhasil diverifikasi');
    }

    public function kirim(Request $request, $id)
    {

        $plagiasi = Layanan_plagiasi::findOrFail($id);
        
        // Nonaktifkan update timestamp sementara
        $plagiasi->timestamps = false;
        
        $plagiasi->update([
            'ket' => 'Permohonan Terkirim',
        ]);

        $token = 'CtBuHqwhxLBH4zAPsJcn';

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target'  => '081353669222',
            'message' =>        
        'Assalamu’alaikum warahmatullahi wabarakatuh!

        Yth. Bpk. Muhammad Ali Ridla, M.Kom,

        Mahasiswa atas nama ' . $request->nama . ' saat ini sedang menunggu verifikasi tanda tangan elektronik untuk _Surat Keterangan Bebas Pustaka_.
        Kami mohon kesediaan Anda untuk melakukan verifikasi melalui tautan berikut:
        🌐 www.lib.ibrahimy.ac.id/layanan-ketbebaspustaka='.$request->id.'/verifikasi
        Terima kasih atas perhatian dan kerja samanya.

        Wassalamu’alaikum warahmatullahi wabarakatuh.'
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . $token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return back()->with('success', 'Permohonan verifikasi telah dikirim');
    }

    public function cetak_ket($id)
    {
        $plagiasi = Layanan_plagiasi::findOrFail($id);

        $pdf = Pdf::loadView('admin.Layanan.bebaspustaka.2021.cetak', [
            'plagiasi' => $plagiasi,
        ]);

        // Bersihkan nama dari karakter ilegal untuk nama file
        $namaFile = preg_replace('/[^A-Za-z0-9\- ]/', '', $plagiasi->mahasiswa->nama) . '_SKBP Perpustakaan Ibrahimy.pdf';

        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream($namaFile);
    }







}
