<?php

namespace App\Http\Controllers\Absensi;

use Carbon\Carbon;
use App\Models\Absensi\Izin;
use Illuminate\Http\Request;
use App\Models\Absensi\Absen;
use App\Models\Absensi\Holiday;
use App\Models\Absensi\Khidmah;
use App\Http\Controllers\Controller;

class AbsenController extends Controller
{
    public function index(){
        return view('admin.Absensi.Absen.absen');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
        ]);

        $nik = $request->nik;
        $now = Carbon::now();
        $tanggal = $now->toDateString();
        $jam = $now->toTimeString();
        $hari = $now->translatedFormat('l'); // Pengambilan hari dalam format lokal

        // Cek apakah NIK terdaftar
        $khidmah = Khidmah::where('nik', $nik)->first();
        if (!$khidmah) {
            return back()->with('error', 'Nomor ID tidak terdaftar.');
        }

        // Cek apakah hari ini adalah hari libur
        if (Holiday::where('tanggal_libur', $tanggal)->exists()) {
            return back()->with('error', 'Hari ini adalah hari libur. Silahkan Healing.');
        }

         // Ambil shift yang dimiliki oleh Khidmah dan berlaku pada hari ini
        $shifts = $khidmah->shifts()->where('hari', $hari)->get();

        if ($shifts->isEmpty()) {
            return back()->with('error', 'Anda tidak memiliki shift hari ini.');
        }

        // Cari shift yang sesuai dengan jam absen
        $shift_terpilih = null;
        foreach ($shifts as $shift) {
            if ($jam >= $shift->jam_masuk && $jam <= $shift->jam_pulang) {
                $shift_terpilih = $shift;
                break;
            }
        }

        if (!$shift_terpilih) {
            return back()->with('error', 'Belum masuk jam kerja. Anda terlalu bersemangat!');
        }

        // Cek apakah sudah pernah absen untuk shift yang sama dan tanggal yang sama
        $sudahAbsen = Absen::where('nik', $nik)
            ->where('tanggal', $tanggal)
            ->where('shift', $shift_terpilih->shift)
            ->exists();

        if ($sudahAbsen) {
            return back()->with('error', 'Anda sudah absen untuk shift ini hari ini.');
        }

        // Cek apakah sedang dalam masa izin
        $izin = Izin::where('nik', $nik)
            ->whereDate('tanggal_mulai', '<=', $tanggal)
            ->whereDate('tanggal_selesai', '>=', $tanggal)
            ->whereHas('shifts', function ($q) use ($shift_terpilih) {
                $q->where('shift_id', $shift_terpilih->id);
            })
            ->first();

        if ($izin) {
            return back()->with('error', 'Anda sedang dalam masa izin, sistem absen tidak aktif.');
        }

        // Simpan absensi jika sudah valid
        Absen::create([
            'nik' => $nik,
            'nama' => $khidmah->nama,
            'tanggal' => $tanggal,
            'jam_masuk' => $jam,
            'shift' => $shift_terpilih->shift,
            'keterangan' => 'Hadir',
        ]);

        return back()->with('success', 'Alhamdulillah, Anda sudah absen hari ini.');
    }


}
