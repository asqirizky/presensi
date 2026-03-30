<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Buletin;
use App\Models\Kehadiran\AbsenPegawai;
use App\Models\Kehadiran\Pegawai;
use App\Models\Master\Pustakawan;
use App\Models\Resource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? now()->month;
        $tahun = now()->year;

        $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth()->format('Y-m-d');
        $endDate   = Carbon::create($tahun, $bulan, 1)->endOfMonth()->format('Y-m-d');

        // =========================
        // ARRAY TANGGAL
        // =========================
        $period = new \DatePeriod(
            new \DateTime($startDate),
            new \DateInterval('P1D'),
            (new \DateTime($endDate))->modify('+1 day')
        );

        $dates = [];
        foreach ($period as $dt) {
            $dates[] = $dt->format('Y-m-d');
        }

        // =========================
        // LIBUR
        // =========================
        $liburRaw = DB::table('liburs')
            ->leftJoin('libur_shift', 'libur_shift.libur_id', '=', 'liburs.id')
            ->leftJoin('jadwals', 'jadwals.id', '=', 'libur_shift.jadwal_id')
            ->select(
                'liburs.tanggal',
                'liburs.ruang_id',
                'jadwals.jadwal as shift'
            )
            ->get();

        $liburByDateShift = [];

        foreach ($liburRaw as $l) {
            if (!$l->shift) continue;

            $liburByDateShift[$l->tanggal][] = [
                'ruang_id' => $l->ruang_id,
                'shift_name' => strtoupper($l->shift),
            ];
        }

        // =========================
        // IZIN
        // =========================
        $izinRaw = DB::table('izin_pegawais')
            ->join('izin_pegawai_jadwal', 'izin_pegawai_jadwal.izin_pegawai_id', '=', 'izin_pegawais.id')
            ->join('jadwals', 'jadwals.id', '=', 'izin_pegawai_jadwal.jadwal_id')
            ->whereBetween('izin_pegawai_jadwal.tanggal', [$startDate, $endDate])
            ->select(
                'izin_pegawais.nama_pegawai',
                'izin_pegawai_jadwal.tanggal',
                'izin_pegawais.keterangan',
                'jadwals.jadwal as shift'
            )
            ->get();

        $izinPegawai = [];

        foreach ($izinRaw as $row) {
            $nama = $row->nama_pegawai;
            $tgl  = $row->tanggal;
            $shift = strtolower($row->shift);

            if (!isset($izinPegawai[$nama][$tgl])) {
                $izinPegawai[$nama][$tgl] = [
                    'ket' => match (strtolower($row->keterangan)) {
                        'tugas pesantren' => 'T',
                        'sakit' => 'S',
                        'izin' => 'I',
                        'libur' => 'L',
                        default => 'I',
                    },
                    'pagi' => 0,
                    'siang' => 0,
                    'malam' => 0,
                ];
            }

            $izinPegawai[$nama][$tgl][$shift] = 1;
        }

        // =========================
        // PEGAWAI AKTIF
        // =========================
        $pustakawans = Pustakawan::with(['jabatan','jadwal'])
            ->join('jabatans', 'pustakawans.jabatan_id', '=', 'jabatans.id')
            ->where('pustakawans.status', 1) // ✅ hanya aktif
            ->orderBy('jabatans.eselon', 'asc')
            ->orderBy('pustakawans.nama_pustakawan', 'asc')     
            ->select('pustakawans.*')                
            ->get();

        foreach ($pustakawans as $p) {

            $totalShiftEfektif = 0;
            $totalI = 0;
            $totalS = 0;
            $totalT = 0;
            $totalL = 0;
            $totalA = 0;

            $jadwalPegawai = $p->jadwal;

            foreach ($dates as $tanggal) {

                $hari = Carbon::parse($tanggal)->translatedFormat('l');
                $jadwalHari = $jadwalPegawai->firstWhere('hari', $hari);

                if (!$jadwalHari) continue;

                foreach (['pagi','siang','malam'] as $shift) {

                    if ($jadwalHari->$shift != 1) continue;

                    // =====================
                    // CEK LIBUR
                    // =====================
                    $isLibur = false;
                    foreach ($liburByDateShift[$tanggal] ?? [] as $l) {
                        if ($l['ruang_id'] === 'Semua Ruang') {
                            $isLibur = true;
                            break;
                        }
                    }

                    if ($isLibur) continue;

                    $totalShiftEfektif++;

                    // =====================
                    // CEK HADIR
                    // =====================
                    $hadir = DB::table('absen_pegawais')
                        ->where('nik', $p->nik)
                        ->whereDate('tanggal', $tanggal)
                        ->where('shift', $shift)
                        ->exists();

                    if ($hadir) continue;

                    // =====================
                    // CEK IZIN
                    // =====================
                    $izin = $izinPegawai[$p->nama_pegawai][$tanggal] ?? null;

                    $izinShift = ($izin && ($izin[$shift] ?? 0) == 1)
                        ? $izin['ket']
                        : null;

                    if ($izinShift) {
                        if ($izinShift === 'I') $totalI++;
                        elseif ($izinShift === 'S') $totalS++;
                        elseif ($izinShift === 'T') $totalT++;
                        elseif ($izinShift === 'L') $totalL++;
                    } else {
                        $totalA++;
                    }
                }
            }

            $TI = $totalI / 2;
            $TS = $totalS / 2;

            $p->persentase = $totalShiftEfektif > 0
                ? round((($totalShiftEfektif - $TI - $TS - $totalA) / $totalShiftEfektif) * 100)
                : 0;
        }

        return view('admin.home', compact('pustakawans'));
    }


}
