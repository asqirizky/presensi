<?php

namespace App\Http\Controllers\Kehadiran;

use Carbon\Carbon;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Absensi\Shift;
use App\Models\Kehadiran\Jadwal;
use App\Models\Kehadiran\Jabatan;
use App\Models\Kehadiran\Pegawai;
use App\Models\Kehadiran\Domisili;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kehadiran\JadwalPegawai;
use App\Models\Kehadiran\PegawaiJadwal;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {

        $pegawai = Pegawai::all();
        $jabatan = Jabatan::where('status', 1)->get();

        return view('admin.Kehadiran.pegawai.pegawai', compact('pegawai', 'jabatan'));
    }

    public function tambah()
    {
        return view('admin.Kehadiran.pegawai.tambah_pegawai');
    }

    public function detail($id)
    {

        $pegawai = Pegawai::findOrFail($id);
        $jabatan = Jabatan::where('status', 1)->get();

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $shiftList = [
            1 => 'Pagi',
            2 => 'Siang',
            3 => 'Malam'
        ];

        $jadwalAktif = PegawaiJadwal::where('pegawai_id', $pegawai->id)->get()->keyBy('hari');

        $shiftAktif = PegawaiJadwal::where('pegawai_id', $pegawai->id)->get();

        foreach ($shiftAktif as $shift) {
            $key = $shift->hari . '-' . $shift->shift_id;
            $jadwalAktif[$key] = true;
        }

        return view('admin.Kehadiran.pegawai.detail_pegawai', compact(
            'pegawai',
            'hariList',
            'shiftList',
            'jadwalAktif',
            'jabatan'
        ));
    }


    public function kelolah_pegawai(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $shiftMap = [
            1 => 'pagi',
            2 => 'siang',
            3 => 'malam',
        ];

        foreach ($hariList as $hari) {
            // Default semua shift = 0
            $data = [
                'pagi' => 0,
                'siang' => 0,
                'malam' => 0,
            ];

            // Jika ada shift yang aktif, set jadi 1
            if (isset($request->aktif[$hari])) {
                foreach ($request->aktif[$hari] as $index => $value) {
                    $shiftName = $shiftMap[$index] ?? null;
                    if ($shiftName) {
                        $data[$shiftName] = 1;
                    }
                }
            }

            // Jika semua shift 0 → hapus data jika ada
            if ($data['pagi'] == 0 && $data['siang'] == 0 && $data['malam'] == 0) {
                PegawaiJadwal::where('pegawai_id', $id)
                    ->where('hari', $hari)
                    ->delete();
            } else {
                // Jika ada shift aktif → update atau buat baru
                PegawaiJadwal::updateOrCreate(
                    ['pegawai_id' => $id, 'hari' => $hari],
                    array_merge($data, ['nik' => $pegawai->nik])
                );
            }
        }

        $jadwalAktif = [];
        $jadwalPegawai = PegawaiJadwal::where('pegawai_id', $id)->get();

        foreach ($hariList as $hari) {
            $jadwal = $jadwalPegawai->firstWhere('hari', $hari);
            $jadwalAktif[$hari] = [
                'pagi'  => $jadwal?->pagi ?? 0,
                'siang' => $jadwal?->siang ?? 0,
                'malam' => $jadwal?->malam ?? 0,
            ];
        }

        // Redirect atau bisa juga langsung return view dengan data baru
        return redirect()->back()->with('success', 'Jadwal berhasil disimpan.');
    }


    public function store(Request $request)
    {

        $tahunTmt = Carbon::parse($request->tmt)->format('Y');
        $jumlahTahunIni = Pegawai::whereYear('tmt', $tahunTmt)->count();
        $nik = $tahunTmt . str_pad($jumlahTahunIni + 1, 3, '0', STR_PAD_LEFT);

        $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'nama_pegawai' => 'required|string',
            'domisili' => 'required|string',
        ]);

        // foto pegawai
        $foto = $request->file('foto');
        $foto->storeAs('public/pegawai', $foto->hashName());

        Pegawai::create([
            'nik' => $nik,
            'nama_pegawai' => $request->nama_pegawai,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'tmt' => $request->tmt,
            'tmt_mengajar' => $request->tmt_mengajar,
            'domisili' => $request->domisili,
            'pend_terakhir' => $request->pend_terakhir,
            'jk' => $request->jk,
            'status_perkawinan' => $request->status_perkawinan,
            'status' => $request->input('status', '0'),
            'ruang' => $request->ruang,
            'foto' => $foto->hashName(),
        ]);

        return redirect('/admin/kehadiran-pegawai')->with('success', 'Alhamdulillah, data berhasil disimpan');
    }

    public function upBerkas(Request $request, $id)
    {
        $request->validate([
            'berkas' => 'required|file|mimes:png,jpg,jpeg|max:1024',
            'keterangan' => 'required|string|max:255',
        ]);

        $pegawai = Pegawai::findOrFail($id);

        $berkas = $request->file('berkas');
        $fileName = $berkas->getClientOriginalName();

        // Simpan file ke storage/app/public/berkas dengan nama aslinya
        $berkas->storeAs('public/berkas', $fileName);

        // Simpan nama file dan keterangan ke database
        $pegawai->update([
            'berkas' => $fileName,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Berkas berhasil disimpan');
    }


    public function update(Request $request, $id)
    {

        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama_pegawai'  => 'required|string',
            'status' => 'nullable|in:0,1',
        ]);

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');
            $foto->storeAs('public/pegawai', $foto->hashName());

            $pegawai->update([
                'nama_pegawai' => $request->nama_pegawai,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'tmt' => $request->tmt,
                'tmt_mengajar' => $request->tmt_mengajar,
                'pend_terakhir' => $request->pend_terakhir,
                'jk' => $request->jk,
                'status_perkawinan' => $request->status_perkawinan,
                'status' => $request->has('status') ? '1' :  '0',
                'jabatan' => $request->jabatan,
                'ruang' => $request->ruang,
            ]);
        } else {
            $pegawai->update([
                'nama_pegawai' => $request->nama_pegawai,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'tmt' => $request->tmt,
                'tmt_mengajar' => $request->tmt_mengajar,
                'pend_terakhir' => $request->pend_terakhir,
                'jk' => $request->jk,
                'status_perkawinan' => $request->status_perkawinan,
                'status' => $request->has('status') ? '1' :  '0',
                'jabatan' => $request->jabatan,
                'ruang' => $request->ruang,
            ]);
        }

        return back()->with('success', 'Data berhasil di perbarui');
    }

    public function destroy($id)
    {

        $pegawai = Pegawai::findOrFail($id);

        if ($pegawai->foto && Storage::exists('public/foto/' . $pegawai->foto)) {
            Storage::delete('public/foto/' . $pegawai->foto);
        }

        if ($pegawai->berkas && Storage::exists('public/berkas/' . $pegawai->berkas)) {
            Storage::delete('public/berkas/' . $pegawai->berkas);
        }

        $pegawai->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }
}
