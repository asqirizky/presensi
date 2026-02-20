<?php

namespace App\Http\Controllers\Kehadiran;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kehadiran\Libur;
use App\Models\Kehadiran\Jadwal;
use App\Models\Kehadiran\Pegawai;
use App\Http\Controllers\Controller;
use App\Models\Kehadiran\IzinPegawai;
use App\Models\Kehadiran\AbsenPegawai;

class KehadiranController extends Controller
{
    public function index() {

        return view('admin.Kehadiran.kehadiran.hadir');
    }

    public function absen() {

        return view('admin.Kehadiran.kehadiran.absen_biasa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
        ]);

        $nik = $request->nik;
        $now = Carbon::now();
        $tanggal = $now->toDateString();
        $jam = $now->format('H:i:s');
        $hari = $now->translatedFormat('l');

        // Cek pegawai
        $pegawai = Pegawai::where('nik', $nik)->first();
        if (!$pegawai) {
            return back()->with('error', 'Nomor ID tidak terdaftar.');
        }

        // Ambil jadwal pegawai hari ini
        $jadwalPegawai = $pegawai->jadwals()->where('hari', $hari)->first();
        // if (!$jadwalPegawai) {
        //     return back()->with('error', 'Anda tidak memiliki jadwal di hari ini.');
        // }

        //  Cek shift aktif berdasarkan jam sekarang
        $shiftAktif = Jadwal::whereTime('jamMasuk', '<=', $jam)
            ->whereTime('jamPulang', '>=', $jam)
            ->first();

        // if (!$shiftAktif) {
        //     return back()->with('error', 'Sekarang bukan jam shift manapun.');
        // }

        // Pengecekan izin per shift
        $izinPegawai = IzinPegawai::where('nik', $nik)
            ->whereDate('tgl_mulai', '<=', $tanggal)
            ->whereDate('tgl_selesai', '>=', $tanggal)
            ->whereHas('jadwals', function ($q) use ($shiftAktif) {
                $q->where('jadwal_id', $shiftAktif->id);
            })
            ->exists();

        if ($izinPegawai) {
            return back()->with('error', "Anda sedang izin pada shift {$shiftAktif->jadwal} hari ini.");
        }

        // Cek apakah pegawai punya shift ini
        $punyaShift = false;
        if ($shiftAktif->jadwal === 'Pagi' && $jadwalPegawai->pagi) $punyaShift = true;
        if ($shiftAktif->jadwal === 'Siang' && $jadwalPegawai->siang) $punyaShift = true;
        if ($shiftAktif->jadwal === 'Malam' && $jadwalPegawai->malam) $punyaShift = true;

        // if (!$punyaShift) {
        //     return back()->with('error', "Anda tidak memiliki shift {$shiftAktif->jadwal} hari ini.");
        // }

        // Cegah absen ganda
        $sudahAbsen = AbsenPegawai::where('nik', $nik)
            ->where('tanggal', $tanggal)
            ->where('shift', $shiftAktif->jadwal)
            ->exists();

        if ($sudahAbsen) {
            return back()->with('error', "Anda sudah absen shift {$shiftAktif->jadwal} hari ini.");
        }

        $libur = Libur::whereDate('tanggal', $tanggal)->first();

        if ($libur) {
            $ruangLibur = $libur->ruang;

            if ($ruangLibur === "Semua Ruang") {
                return back()->with('error', 'Hari ini adalah hari libur, sistem juga butuh healing');
            }

            if ($ruangLibur === $pegawai->ruang) {
                return back()->with('error', "Hari ini {$pegawai->ruang} sedang libur, silahkan healing");
            }
        }

        // Simpan data absen
        $absen = AbsenPegawai::create([
            'nik' => $nik,
            'nama_pegawai' => $pegawai->nama_pegawai,
            'tanggal' => $tanggal,
            'jam_masuk' => $jam,
            'shift' => $shiftAktif->jadwal,
            'keterangan' => 'Hadir',
        ]);

        // Respon sukses
        if ($absen) {
            return back()->with('success', 'Terima kasih ' . $pegawai->nama_pegawai . ' sudah absen hari ini');
        }

        return back()->with('error', 'Terjadi kesalahan saat menyimpan data absen.');
    }

}
