<?php

namespace App\Http\Controllers\Kehadiran;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran\AbsenPegawai;
use App\Models\Kehadiran\IzinPegawai;
use App\Models\Kehadiran\Jadwal;
use App\Models\Kehadiran\Pegawai;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Clock\now;

class RekapanController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = Carbon::parse(
            $request->input('tanggal', Carbon::now())
        )->format('Y-m-d');
        $now = now()->format('H:i:s');

        // Deteksi shift aktif berdasarkan jam sekarang
        $shiftAktif = Jadwal::whereTime('jamMasuk', '<=', $now)
            ->whereTime('jamPulang', '>=', $now)
            ->first();

        $pegawai = Pegawai::all()->keyBy('nik');
        $shift = Jadwal::all();

        // Ambil data absensi & izin hari ini
        $absen = AbsenPegawai::whereDate('tanggal', $tanggal)->get();
        $izin = IzinPegawai::whereDate('tgl_mulai', '<=', $tanggal)
                            ->whereDate('tgl_selesai', '>=', $tanggal)
                            ->get();

        // --- Hitung total umum (selalu tampil) ---
        $totalPegawai = Pegawai::count();
        $hadir = $absen->count();
        $izinJumlah = $izin->count();
        $tanpaKeterangan = $totalPegawai - ($hadir + $izinJumlah);

        // --- Buat rekap gabungan hadir + izin ---
        $indexIzin = $izin->mapWithKeys(fn($i) => [$i->nik . '|' . ($i->shift ?? '-') => true]);

        $absenFormat = $absen->filter(fn($a) => !isset($indexIzin[$a->nik . '|' . ($a->shift ?? '-')]))
            ->map(fn($a) => (object)[
                'nik' => $a->nik,
                'nama_pegawai' => $a->nama_pegawai,
                'shift' => $a->shift,
                'tanggal' => $a->tanggal,
                'jam_masuk' => $a->jam_masuk,
                'keterangan' => $a->keterangan ?? 'Hadir',
            ]);

        $izinFormat = $izin->map(fn($i) => (object)[
            'nik' => $i->nik,
            'nama_pegawai' => $i->nama_pegawai ?? ($pegawai[$i->nik]->nama_pegawai ?? '-'),
            'shift' => $i->shift ?? '-',
            'tanggal' => $tanggal,
            'jam_masuk' => '-',
            'keterangan' => $i->keterangan ?? 'Izin',
        ]);

        $rekap = $absenFormat
            ->concat($izinFormat)
            ->sortBy('shift')
            ->groupBy('shift');

        // --- Hitung ulang hanya jika shift aktif berubah ---
        if ($shiftAktif) {
            $hadir = AbsenPegawai::whereDate('tanggal', $tanggal)
                ->where('shift', $shiftAktif->jadwal)
                ->count();

            $izinJumlah = IzinPegawai::whereHas('jadwals', function ($q) use ($shiftAktif, $tanggal) {
                $q->where('jadwal_id', $shiftAktif->id)
                  ->where('izin_pegawai_jadwal.tanggal', $tanggal);
            })->count();

            $tanpaKeterangan = $totalPegawai - ($hadir + $izinJumlah);
        }

        return view('admin.Kehadiran.rekapan.rekapan', compact(
            'rekap',
            'absen',
            'shift',
            'pegawai',
            'shiftAktif',
            'totalPegawai',
            'hadir',
            'tanpaKeterangan',
            'tanggal',
            'izin',
            'izinJumlah',
        ));
    }



    public function mingguan() {

        return view('admin.Kehadiran.rekapan.mingguan');
    }

    public function bulanan() {

        return view('admin.Kehadiran.rekapan.perbulan');
    }

    public function edit(Request $request)
    {

        $tanggal = Carbon::parse(
            $request->input('tanggal', Carbon::now())
        )->format('Y-m-d');

        $now = Carbon::now()->format('H:i:s');

        $jadwal = Jadwal::get();

        $jadwalPegawai = DB::table('pegawai_jadwal')
            ->join('pegawais', 'pegawais.id', '=', 'pegawai_jadwal.pegawai_id')
            ->select(
                'pegawais.nik',
                'pegawai_jadwal.hari',
                'pegawai_jadwal.pagi',
                'pegawai_jadwal.siang',
                'pegawai_jadwal.malam'
            )
            ->get();

        // Deteksi shift aktif berdasarkan jam sekarang
        $shiftAktif = Jadwal::whereTime('jamMasuk', '<=', $now)
            ->whereTime('jamPulang', '>=', $now)
            ->first();

        $pegawai = Pegawai::all()->keyBy('nik');
        $shift = Jadwal::all();

        // Ambil data absensi & izin hari ini
        $absen = AbsenPegawai::whereDate('tanggal', $tanggal)->get();

        // Ambil izin yang aktif di tanggal ini (berdasarkan relasi jadwal pivot)
        $izin = IzinPegawai::whereDate('tgl_mulai', '<=', $tanggal)
            ->whereDate('tgl_selesai', '>=', $tanggal)
            ->with(['jadwals' => function ($q) use ($tanggal) {
                $q->wherePivot('tanggal', $tanggal);
            }])
            ->get();

        // Hitung total umum (selalu tampil)
        $totalPegawai = Pegawai::count();
        $hadir = $absen->count();
        $izinJumlah = $izin->count();
        $tanpaKeterangan = $totalPegawai - ($hadir + $izinJumlah);

        // Buat rekap gabungan hadir + izin
        $indexIzin = collect();
        foreach ($izin as $i) {
            foreach ($i->jadwals as $j) {
                $indexIzin[$i->nik.'|'.$j->jadwal] = true;
            }
        }

        // format hadir
        $absenFormat = $absen->filter(fn ($a) => ! isset($indexIzin[$a->nik.'|'.($a->shift ?? '-')]))
            ->map(fn ($a) => (object) [
                'nik' => $a->nik,
                'nama_pegawai' => $a->nama_pegawai,
                'shift' => $a->shift,
                'tanggal' => $a->tanggal,
                'jam_masuk' => $a->jam_masuk,
                'keterangan' => $a->keterangan ?? 'Hadir',
            ]);

        // format izin
        $izinFormat = collect();
        foreach ($izin as $i) {
            foreach ($i->jadwals as $j) {
                $izinFormat->push((object) [
                    'nik' => $i->nik,
                    'nama_pegawai' => $i->nama_pegawai ?? ($pegawai[$i->nik]->nama_pegawai ?? '-'),
                    'shift' => $j->jadwal ?? '-',
                    'tanggal' => $tanggal,
                    'jam_masuk' => '-',
                    'keterangan' => $i->keterangan ?? 'Izin',
                ]);
            }
        }

        $rekap = $absenFormat
            ->concat($izinFormat)
            ->sortBy('shift')
            ->groupBy('shift');

        // Hitung ulang hanya jika shift aktif berubah
        if ($shiftAktif) {
            $hadir = AbsenPegawai::whereDate('tanggal', $tanggal)
                ->where('shift', $shiftAktif->jadwal)
                ->count();

            $izinJumlah = IzinPegawai::whereHas('jadwals', function ($q) use ($shiftAktif, $tanggal) {
                $q->where('jadwal_id', $shiftAktif->id)
                    ->where('izin_pegawai_jadwal.tanggal', $tanggal);
            })->count();

            $tanpaKeterangan = $totalPegawai - ($hadir + $izinJumlah);
        }

        return view('admin.Kehadiran.rekapan.edit_rekap', compact(
            'rekap',
            'absen',
            'shift',
            'pegawai',
            'shiftAktif',
            'totalPegawai',
            'hadir',
            'tanpaKeterangan',
            'tanggal',
            'izin',
            'izinJumlah',
            'jadwal',
            'jadwalPegawai',
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:pegawais,nik',
            'mode_hari' => 'required|in:satu_full,satu_shift,banyak_full,banyak_shift',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'shifts' => 'nullable|array',
        ]);

        // satu hari → paksa tanggal sama
        if (in_array($request->mode_hari, ['satu_full', 'satu_shift'])) {
            $request->merge([
                'tanggal_selesai' => $request->tanggal_mulai,
            ]);
        }

        // ambil pegawai
        $pegawai = DB::table('pegawais')
            ->where('nik', $request->nik)
            ->first();

        if (! $pegawai) {
            return back()->with('error', 'Pegawai tidak ditemukan');
        }

        DB::beginTransaction();

        try {

            $periode = CarbonPeriod::create(
                $request->tanggal_mulai,
                $request->tanggal_selesai
            );

            foreach ($periode as $tanggal) {

                $tgl = $tanggal->format('Y-m-d');
                $hari = $tanggal->translatedFormat('l');

                /**
                 * ======================
                 * MODE BEBERAPA HARI FULL
                 * ======================
                 */
                if ($request->mode_hari === 'banyak_full') {

                    // ambil pegawai_id dari nik
                    $pegawaiId = DB::table('pegawais')
                        ->where('nik', $request->nik)
                        ->value('id');

                    if (! $pegawaiId) {
                        continue; // safety
                    }

                    // cek libur
                    if (DB::table('liburs')->whereDate('tanggal', $tgl)->exists()) {
                        continue;
                    }

                    // cek izin
                    if (DB::table('izin_pegawais')
                        ->where('nik', $request->nik)
                        ->whereDate('tgl_mulai', '<=', $tgl)
                        ->whereDate('tgl_selesai', '>=', $tgl)
                        ->exists()) {
                        continue;
                    }

                    // ambil hari
                    $hari = \Carbon\Carbon::parse($tgl)
                        ->locale('id')
                        ->dayName; // selasa

                    // ambil jadwal
                    $jadwal = DB::table('pegawai_jadwal')
                        ->where('pegawai_id', $pegawaiId)
                        ->whereRaw('LOWER(hari) = ?', [strtolower(ucwords($hari))])
                        ->first();

                    if (! $jadwal) {
                        continue;
                    }

                    // insert per shift
                    foreach (['pagi', 'siang', 'malam'] as $shift) {

                        if ($jadwal->$shift != 1) {
                            continue;
                        }

                        if (DB::table('absen_pegawais')
                            ->where('nik', $request->nik)
                            ->where('tanggal', $tgl)
                            ->where('shift', strtoupper($shift))
                            ->exists()) {
                            continue;
                        }

                        DB::table('absen_pegawais')->insert([
                            'nik' => $request->nik,
                            'nama_pegawai' => $pegawai->nama_pegawai,
                            'tanggal' => $tgl,
                            'shift' => ucfirst(strtolower($shift)),
                            'jam_masuk' => now()->format('H:i:s'),
                            'keterangan' => 'Hadir',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }

                    continue;
                }

                /**
                 * ======================
                 * MODE SATU HARI FULL
                 * ======================
                 */
                if ($request->mode_hari === 'satu_full') {

                    $jadwal = DB::table('pegawai_jadwal')
                        ->where('pegawai_id', $pegawai->id)
                        ->where('hari', $hari)
                        ->first();

                    if (! $jadwal) {
                        continue;
                    }

                    $shiftMap = [
                        'Pagi' => $jadwal->pagi,
                        'Siang' => $jadwal->siang,
                        'Malam' => $jadwal->malam,
                    ];

                    foreach ($shiftMap as $namaShift => $aktif) {

                        if ($aktif != 1) {
                            continue;
                        }

                        $exists = DB::table('absen_pegawais')
                            ->where('nik', $request->nik)
                            ->where('tanggal', $tgl)
                            ->where('shift', $namaShift)
                            ->exists();

                        if (! $exists) {
                            DB::table('absen_pegawais')->insert([
                                'nik' => $request->nik,
                                'nama_pegawai' => $pegawai->nama_pegawai,
                                'tanggal' => $tgl,
                                'shift' => $namaShift,
                                'jam_masuk' => now()->format('H:i:s'),
                                'keterangan' => 'Hadir',
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }

                    continue;
                }

                /**
                 * ======================
                 * MODE SATU HARI (SHIFT)
                 * ======================
                 */
                if ($request->mode_hari === 'satu_shift') {

                    $hari = Carbon::parse($request->tanggal_mulai)->translatedFormat('l');

                    $jadwal = DB::table('pegawai_jadwal')
                        ->where('pegawai_id', $pegawai->id)
                        ->where('hari', $hari)
                        ->first();

                    if (! $jadwal) {
                        return back()->with('error', 'Tidak ada jadwal hari ini');
                    }

                    $aktif = [
                        'Pagi' => $jadwal->pagi,
                        'Siang' => $jadwal->siang,
                        'Malam' => $jadwal->malam,
                    ];

                    foreach ($request->shifts ?? [] as $shift) {

                        if (! isset($aktif[$shift]) || $aktif[$shift] != 1) {
                            continue; // ❌ shift ilegal
                        }

                        DB::table('absen_pegawais')->updateOrInsert(
                            [
                                'nik' => $pegawai->nik,
                                'tanggal' => $request->tanggal_mulai,
                                'shift' => $shift,
                            ],
                            [
                                'nama_pegawai' => $pegawai->nama_pegawai,
                                'jam_masuk' => now()->format('H:i:s'),
                                'keterangan' => 'Hadir',
                                'updated_at' => now(),
                                'created_at' => now(),
                            ]
                        );
                    }
                }

                /**
                 * ==========================
                 * MODE BEBERAPA HARI (SHIFT)
                 * ==========================
                 */
                if ($request->mode_hari === 'banyak_shift') {

                    // ambil pegawai_id
                    $pegawaiId = DB::table('pegawais')
                        ->where('nik', $request->nik)
                        ->value('id');

                    if (! $pegawaiId) {
                        return; // safety
                    }

                    // shift yang dipilih user (pagi/siang/malam)
                    $selectedShifts = collect($request->shifts ?? [])
                        ->map(fn ($s) => strtolower($s))
                        ->toArray();

                    // cek libur
                    if (DB::table('liburs')->whereDate('tanggal', $tgl)->exists()) {
                        continue;
                    }

                    // cek izin
                    if (DB::table('izin_pegawais')
                        ->where('nik', $request->nik)
                        ->whereDate('tgl_mulai', '<=', $tgl)
                        ->whereDate('tgl_selesai', '>=', $tgl)
                        ->exists()) {
                        continue;
                    }

                    // ambil hari
                    $hari = \Carbon\Carbon::parse($tgl)
                        ->locale('id')
                        ->dayName;

                    // ambil jadwal pegawai
                    $jadwal = DB::table('pegawai_jadwal')
                        ->where('pegawai_id', $pegawaiId)
                        ->whereRaw('LOWER(hari) = ?', [strtolower($hari)])
                        ->first();

                    if (! $jadwal) {
                        continue;
                    }

                    // loop shift (HANYA YANG DIPILIH & DIMILIKI)
                    foreach (['pagi', 'siang', 'malam'] as $shift) {

                        // harus dipilih user
                        if (! in_array($shift, $selectedShifts)) {
                            continue;
                        }

                        // harus ada di jadwal pegawai
                        if ($jadwal->$shift != 1) {
                            continue;
                        }

                        // cek absen
                        $exists = DB::table('absen_pegawais')
                            ->where('nik', $request->nik)
                            ->where('tanggal', $tgl)
                            ->where('shift', ucfirst($shift))
                            ->exists();

                        if ($exists) {
                            continue;
                        }

                        // insert
                        DB::table('absen_pegawais')->insert([
                            'nik' => $request->nik,
                            'nama_pegawai' => $pegawai->nama_pegawai,
                            'tanggal' => $tgl,
                            'shift' => ucfirst($shift), // Pagi / Siang / Malam
                            'jam_masuk' => now()->format('H:i:s'),
                            'keterangan' => 'Hadir',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }

            }

            DB::commit();

            return back()->with('success', 'Absen berhasil disimpan');

        } catch (\Throwable $e) {
            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {

        $absens = AbsenPegawai::findOrFail($id);

        $absens->delete();

        return back()->with('success', 'Data berhasil di hapus');
    }
}
