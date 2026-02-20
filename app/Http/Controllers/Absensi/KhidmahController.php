<?php

namespace App\Http\Controllers\Absensi;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Absensi\Shift;
use App\Models\Absensi\Lokasi;
use App\Models\Absensi\Khidmah;
use App\Http\Controllers\Controller;

class KhidmahController extends Controller
{
    public function index(){

        $khidmah = Khidmah::get();
        $lokasi = Lokasi::latest()->get();

        return view('admin.Absensi.Khidmah.khidmah', compact('khidmah', 'lokasi', ));
    }
    public function detail($id){

        $khidmah = Khidmah::findOrFail($id);
        $lokasi = Lokasi::latest()->get();
        $shifts = Shift::latest()->get();

        return view('admin.Absensi.Khidmah.detail_khidmah', compact('khidmah', 'shifts', 'lokasi'));
    }
    public function tambah(){

        $lokasi = Lokasi::latest()->get();
        $khidmah = Lokasi::latest()->get();

        return view('admin.Absensi.Khidmah.khidmah_tambah', compact('lokasi', 'khidmah', ));
    }

    public function kelolah_shift(Request $request, $id)
    {
        $khidmah = Khidmah::findOrFail($id);

        $request->validate([
            'shifts' => 'array', // Tidak required agar bisa menghapus semua shift jika kosong
        ]);

        // Ambil semua shift yang saat ini tersimpan di database untuk khidmah ini
        $existingShifts = $khidmah->shifts()->get(['shift_id', 'hari']);

        // Ambil shift yang dicentang dari form (jika tidak ada, set array kosong)
        $selectedShifts = $request->shifts ?? [];

        // Hapus shift yang tidak dicentang
        foreach ($existingShifts as $shift) {
            if (!isset($selectedShifts[$shift->hari]) || !in_array($shift->shift_id, $selectedShifts[$shift->hari])) {
                $khidmah->shifts()->detach($shift->shift_id);
            }
        }

        // Tambahkan shift baru jika belum ada
        foreach ($selectedShifts as $hari => $shift_ids) {
            foreach ($shift_ids as $shift_id) {
                // Pastikan shift belum ada sebelum ditambahkan
                $exists = $khidmah->shifts()
                    ->wherePivot('hari', $hari)
                    ->wherePivot('shift_id', $shift_id)
                    ->exists();
                if (!$exists) {
                    $khidmah->shifts()->attach($shift_id, ['hari' => $hari]);
                }
            }
        }

        return back()->with('success', 'Shift berhasil disimpan!');
    }

    public function store(Request $request)
    {

        // create unique number
        $lastUser = Khidmah::latest()->first();
        $lastId = $lastUser ? $lastUser->id : 0; // ambil id terakhir
        $nik = Carbon::now()->isoFormat('Y') . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT); // Format NI-000001, NI-000002, dst.

        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'nama' => 'required|string',

        ]);

        Khidmah::create([
            'nik' => $nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_khidmah' => $request->tanggal_khidmah,
            'alamat' => $request->alamat,
            'asrama' => $request->asrama,
            'lokasi' => $request->lokasi,
            'diniyah' => $request->diniyah,
            'sekolah_sore' => $request->sekolah_sore,
            'gender' => $request->gender,
            'foto' => $request->file('foto')->store('public/foto'),
        ]);

        return redirect('/admin/absensi-khidmah')->with('success', 'Alhamdulillah, data berhasil ditambahkan');

    }

    public function update(Request $request, $id){

        $khidmah = Khidmah::findOrFail($id);

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');
            $foto->storeAs('public/khidmah', $foto->hashName());

            $khidmah->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tanggal_khidmah' => $request->tanggal_khidmah,
                'alamat' => $request->alamat,
                'asrama' => $request->asrama,
                'lokasi' => $request->lokasi,
                'diniyah' => $request->diniyah,
                'sekolah_sore' => $request->sekolah_sore,
                'gender' => $request->gender,
                'foto' => $foto->hashName(),
            ]);
        } else {
            $khidmah->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tanggal_khidmah' => $request->tanggal_khidmah,
                'alamat' => $request->alamat,
                'asrama' => $request->asrama,
                'lokasi' => $request->lokasi,
                'diniyah' => $request->diniyah,
                'sekolah_sore' => $request->sekolah_sore,
                'gender' => $request->gender,
            ]);
        }

        return back()->with('success', 'Alhamdulillah, data berhasil diperbarui');
    }

    public function destroy($id){

        $khidmah = Khidmah::findOrFail($id);

        $khidmah->delete();

        return back()->with('success', 'Alhamdulillah, data berhasil dihapus');
    }

}
