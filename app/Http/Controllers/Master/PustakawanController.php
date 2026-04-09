<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Jabatan;
use App\Models\Master\Pustakawan;
use App\Models\Master\PustakawanJadwal;
use App\Models\Master\Ruang;
use Carbon\Carbon;
use Google\Service\Storage;
use Symfony\Component\HttpFoundation\Request;

class PustakawanController extends Controller
{
    public function index()
    {
        $pustakawan = Pustakawan::with('jabatan', 'ruang')
            ->get()
            ->sortBy('jabatan.eselon'); // sorting di collection

        $jabatan = Jabatan::where('status', 1)->get();

        return view('admin.Master.pustakawan.pustakawan', compact(
            'pustakawan',
            'jabatan',
        ));
    }

    public function tambah () {

        $ruang = Ruang::get();
        $jabatan = Jabatan::where('status', 1)->get();

        return view('admin.Master.pustakawan.tambah_pustakawan', compact(
            'ruang',
            'jabatan',
        ));
    }

    public function detail ($id) {

        $ruangs = Ruang::get();
        $pustakawan = Pustakawan::findOrFail($id);
        $jabatan = Jabatan::where('status', 1)->get();

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $shiftList = [
            1 => 'Pagi',
            2 => 'Siang',
            3 => 'Malam'
        ];

        $jadwalAktif = PustakawanJadwal::where('pustakawan_id', $pustakawan->id)->get()->keyBy('hari');

        $shiftAktif = PustakawanJadwal::where('pustakawan_id', $pustakawan->id)->get();

        foreach ($shiftAktif as $shift) {
            $key = $shift->hari . '-' . $shift->shift_id;
            $jadwalAktif[$key] = true;
        }

        return view('admin.Master.pustakawan.detail_pustakawan', compact(
            'ruangs',
            'pustakawan',
            'jabatan',
            'jadwalAktif',
            'shiftList',
            'hariList',
        ));
    }

    public function kelolah_pustakawan(Request $request, $id) {

        $pustakawan = Pustakawan::findOrFail($id);

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $shiftMap = [
            1 => 'pagi',
            2 => 'siang',
            3 => 'malam',
        ];

        foreach ($hariList as $hari) {
            $data = [
                'pagi' => 0,
                'siang' => 0,
                'malam' => 0,
            ];

            if (isset($request->aktif[$hari])) {
                foreach ($request->aktif[$hari] as $index => $value) {
                    $shiftName = $shiftMap[$index] ?? null;
                    if ($shiftName) {
                        $data[$shiftName] = 1;
                    }
                }
            }

            if ($data['pagi'] == 0 && $data['siang'] == 0 && $data['malam'] == 0) {
                PustakawanJadwal::where('pustakawan_id', $id)
                    ->where('hari', $hari)
                    ->delete();
            } else {
                PustakawanJadwal::updateOrCreate(
                    ['pustakawan_id' => $id, 'hari' => $hari],
                    array_merge($data, ['nik' => $pustakawan->nik])
                );
            }
        }

        $jadwalAktif = [];
        $jadwalPegawai = PustakawanJadwal::where('pustakawan_id', $id)->get();

        foreach ($hariList as $hari) {
            $jadwal = $jadwalPegawai->firstWhere('hari', $hari);
            $jadwalAktif[$hari] = [
                'pagi'  => $jadwal?->pagi ?? 0,
                'siang' => $jadwal?->siang ?? 0,
                'malam' => $jadwal?->malam ?? 0,
            ];
        }

        return back()->with('success', 'Jadwal sudah diperbarui');
    }

    public function upBerkas (Request $request, $id) {

        $request->validate([
            'berkas' => 'required|file|mimes:png,jpg,jpeg|max:1024',
            'keterangan' => 'required|string|max:255',
        ]);

        $pustakawan = Pustakawan::findOrFail($id);

        $berkas = $request->file('berkas');
        $fileName = $berkas->getClientOriginalName();

        $berkas->storeAs('public/berkas', $fileName);

        $pustakawan->update([
            'berkas' => $fileName,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Berkas berhasil disimpan');
    }

    public function store (Request $request) {

        $tahunTmt = Carbon::parse($request->tmt)->format('Y');
        $jabatan = Jabatan::findOrfail($request->jabatan_id);
        $eselon = $jabatan->eselon;

        $jumlah = Pustakawan::whereYear('tmt', $tahunTmt)
            ->whereHas('jabatan', function ($q) use ($eselon) {
                $q->where('eselon', $eselon);
            })->count();

        $urut = str_pad($jumlah + 1, 3, '0', STR_PAD_LEFT);

        $nik = $tahunTmt . $eselon . $urut;

        $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'nama_pustakawan' => 'required|string',
            'domisili' => 'required|string',
        ]);

        // foto pustakawan
        $foto = $request->file('foto');
        $foto->storeAs('public/pustakawan', $foto->hashName());

        Pustakawan::create([
            'nik' => $nik,
            'nama_pustakawan' => $request->nama_pustakawan,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'tmt' => $request->tmt,
            'tmt_mengajar' => $request->tmt_mengajar,
            'domisili' => $request->domisili,
            'pend_terakhir' => $request->pend_terakhir,
            'jk' => $request->jk,
            'status_perkawinan' => $request->status_perkawinan,
            'jabatan_id' => $request->jabatan_id,
            'status' => $request->input('status', '0'),
            'foto' => $foto->hashName(),
        ]);

        return redirect()->route('master-pustakawan.index')->with('success', 'data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $pustakawan = Pustakawan::findOrFail($id);

        $request->validate([
            'nama_pustakawan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'status' => 'nullable|in:0,1',
        ]);

        // =========================
        // JABATAN
        // =========================
        $jabatan = Jabatan::findOrFail($request->jabatan_id);
        $eselon = $jabatan->eselon ?? 0;

        // =========================
        // CEK KHIDMAH / STRUKTURAL
        // =========================
        $isKhidmah = str_contains(strtolower($jabatan->nama_jabatan), 'khidmah');

        // tentukan field & tahun
        $field = $isKhidmah ? 'tgl_khidmah' : 'tmt';

        $tanggal = $isKhidmah ? $request->tgl_khidmah : $request->tmt;
        $tahun = Carbon::parse($tanggal)->format('Y');

        // =========================
        // HITUNG NOMOR URUT
        // =========================
        $jumlah = Pustakawan::whereYear($field, $tahun)
            ->where('jabatan_id', $request->jabatan_id)
            ->where('id', '!=', $id)
            ->count();

        $noUrut = str_pad($jumlah + 1, 3, '0', STR_PAD_LEFT);

        // =========================
        // GENERATE NIK
        // =========================
        $nik = $tahun . $eselon . $noUrut;

        // =========================
        // HANDLE FOTO
        // =========================
        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($pustakawan->foto && file_exists(storage_path('app/public/pustakawan/' . $pustakawan->foto))) {
                unlink(storage_path('app/public/pustakawan/' . $pustakawan->foto));
            }

            $foto = $request->file('foto');
            $foto->storeAs('public/pustakawan', $foto->hashName());

            $pustakawan->foto = $foto->hashName();
        }

        // =========================
        // UPDATE DATA
        // =========================
        $pustakawan->update([
            'nik' => $nik,
            'nama_pustakawan' => $request->nama_pustakawan,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'tmt' => $request->tmt,
            'tmt_mengajar' => $request->tmt_mengajar,
            'tgl_khidmah' => $request->tgl_khidmah,
            'pend_terakhir' => $request->pend_terakhir,
            'jk' => $request->jk,
            'status_perkawinan' => $request->status_perkawinan,
            'status' => $request->has('status') ? '1' : '0',
            'jabatan_id' => $request->jabatan_id,
            'ruang_id' => $request->ruang_id,
            'asrama' => $request->asrama,
            'sekolah_pagi' => $request->sekolah_pagi,
            'sekolah_sore' => $request->sekolah_sore,
            'foto' => $pustakawan->foto
        ]);

        return back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy ($id) {

        $pustakawan = Pustakawan::findOrFail($id);

        if ($pustakawan->foto && Storage::exists('public/foto/' . $pustakawan->foto)) {
            Storage::delete('public/foto/' . $pustakawan->foto);
        }

        if ($pustakawan->berkas && Storage::exists('public/berkas/' . $pustakawan->berkas)) {
            Storage::delete('public/berkas/' . $pustakawan->berkas);
        }

        $pustakawan->delete();

        return back()->with('success', 'Data berhasil di hapus');
    }
}
