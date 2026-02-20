<?php

namespace App\Http\Controllers\Administrasi;

use App\Http\Controllers\Controller;
use App\Models\Administrasi\Surat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\TcpdfFpdi;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\RedirectResponse;
use TCPDF;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kode kategori dari query string
        $kode = $request->query('kode');

        // Jika kode tidak ada, kembalikan tampilan dengan data kosong
        if (!$kode) {
            $surat = collect(); // Mengembalikan koleksi kosong
        } else {
            // Jika kode ada, cari kategori yang diawali dengan kode + "-"
            $surat = Surat::where('kategori', 'like', $kode . '-%')->get();
        }

        return view('admin.Administrasi.Surat.index', compact('surat'));
    }


    public function create()
    {
        return view('admin.Administrasi.Surat.tambah');
    }

    public function store(Request $request)
    {
        // Simpan file ke penyimpanan Laravel
        // $file = $request->file('isi');
        // $filename = time() . '_' . $file->getClientOriginalName();
        // $file->storeAs('public/surat_keluar', $filename);


        // Simpan data ke dalam database
        $surat = Surat::create([
            'kategori' => $request->kategori,
            'namasurat' => $request->namasurat,
            'tujuan_nama' => $request->tujuan_nama,
            'tujuan_jabatan' => $request->tujuan_jabatan,
            'tempat' => $request->tempat,
            'lampiran' => $request->lampiran,
            'isi' => json_encode($request->isi), // Simpan isi dalam bentuk JSON
        ]);



        $token = 'd8qnqLEEtppBhAsXq7Ns';
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
            'target'  => '087861994222',
            'message' => '_Assalamu’alaikum warahmatullahi wabarakatuh_

Yth. Bpk. Muhammad Ali Ridla, M.Kom,

Mohon kesediaan anda untuk melakukan verifikasi surat ' . $request->namasurat . ' Perpustakaan Ibrahimy melalui tautan berikut:
📜 www.lib.ibrahimy.ac.id/layanan-cekplagiasi/hasil/'.$surat->id.'

Terima kasih atas perhatian dan kerja samanya.

_Wassalamu’alaikum warahmatullahi wabarakatuh._'
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . $token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return redirect('/admin/administrasi-surat')->with('success', 'Alhamdulillah, data berhasil ditambahkan');

    }


    public function edit($id)
    {
        $surat = Surat::findOrFail($id);

        return view('admin.administrasi.surat.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        // $instrumen = Akreditasi_instrumen::findOrFail($id);
        $surat = Surat::findOrFail($id);

        $surat->update([
            'kategori' => $request->kategori,
            'namasurat' => $request->namasurat,
            'tujuan_nama' => $request->tujuan_nama,
            'tujuan_jabatan' => $request->tujuan_jabatan,
            'tempat' => $request->tempat,
            'lampiran' => $request->lampiran,
        ]);

        return redirect('/admin/administrasi-surat')->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }

    public function hapus($id): RedirectResponse
    {
        //get post by ID
        $surat = Surat::findOrFail($id);
        $surat->delete();

        //redirect to index
        // return back()->with('success', 'Alhamdulillah, data berhasil dihapus!');
        return redirect('/admin/administrasi-surat')->with('success', 'Alhamdulillah, data berhasil dihapus!');
    }

    public function verifikasi($id)
    {
        $surat = Surat::findOrFail($id);

        return view('admin.Administrasi.Surat.verifikasi', compact('surat'));
    }

    public function verified(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);

        $surat->update([
            'verifikasi' => "Terverifikasi",
        ]);

        return back()->with('success', 'Alhamdulillah, dokumen berhasil diverifikasi');
    }

    public function cetak($id)
    {
        $surat = Surat::findOrFail($id);

        // return view('admin.Layanan.bebaspustaka.cetak', compact('bebaspustaka'));
        $pdf = Pdf::loadView('admin.Administrasi.Surat.cetak', [
            'surat' => $surat,
        ]);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('Surat Keluar - Perpustakaan Ibrahimy.pdf');
    }

}
