<?php

namespace App\Http\Controllers\Kehadiran;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kehadiran\Libur;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Kehadiran\Pegawai;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KehadiranLaporanController extends Controller
{
    public function laporanPDF(Request $request)
    {
        $bulan = $request->input('bulan', Carbon::now()->month);
        $tahun = $request->input('tahun', Carbon::now()->year);

        $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth()->format('Y-m-d');
        $endDate   = Carbon::create($tahun, $bulan, 1)->endOfMonth()->format('Y-m-d');

        $libur = Libur::get();

        $periode = Carbon::create($tahun, $bulan, 1)->format('Y-m');

        $liburRaw = DB::table('liburs')
            ->leftJoin('libur_shift', 'libur_shift.libur_id', '=', 'liburs.id')
            ->leftJoin('jadwals', 'jadwals.id', '=', 'libur_shift.jadwal_id')
            ->select(
                'liburs.tanggal',
                'liburs.ruang',
                'libur_shift.jadwal_id',
                'jadwals.jadwal as shift'
            )
            ->get();


        $liburByDateShift = [];

        foreach ($liburRaw as $l) {
            if (!$l->shift) continue;

            $liburByDateShift[$l->tanggal][] = [
                'ruang'      => $l->ruang,
                'jadwal_id'  => $l->jadwal_id,
                'shift_name'=> strtoupper($l->shift), // PAGI | SIANG | MALAM
            ];
        }

        // Periode tanggal
        $period = new \DatePeriod(
            new \DateTime($startDate),
            new \DateInterval('P1D'),
            (new \DateTime($endDate))->modify('+1 day')
        );

        // Simpan sebagai string (hindari error)
        $dates = [];
        foreach ($period as $dt) {
            $dates[] = $dt->format('Y-m-d');
        }

        // Data pegawai
        $pegawai = Pegawai::leftJoin('barokah_pustakawans', function ($join) use ($periode) {
                $join->on('barokah_pustakawans.pegawai_id', '=', 'pegawais.id')
                    ->where('barokah_pustakawans.periode', $periode);
            })
            ->join('jabatans', 'jabatans.nama_jabatan', '=', 'pegawais.nama_jabatan')
            ->select(
                'pegawais.*',
                'jabatans.ranking',

                DB::raw('COALESCE(barokah_pustakawans.t_kehadiran, 0) as t_kehadiran'),
                DB::raw('COALESCE(barokah_pustakawans.t_jabatan, 0) as t_jabatan'),
                DB::raw('COALESCE(barokah_pustakawans.t_pengabdian, 0) as t_pengabdian'),
                DB::raw('COALESCE(barokah_pustakawans.t_tunkel, 0) as t_tunkel'),
                DB::raw('COALESCE(barokah_pustakawans.t_kehormatan, 0) as t_kehormatan'),
                DB::raw('COALESCE(barokah_pustakawans.t_anak, 0) as t_anak'),
                DB::raw('COALESCE(barokah_pustakawans.t_barokah_dosen, 0) as t_barokah_dosen')
            )
            ->orderBy('jabatans.eselon', 'asc')
            ->orderBy('pegawais.nama_pegawai', 'asc')
            ->get();



        // Ambil jadwal
        $absensi = DB::table('absen_pegawais')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get()
            ->map(function ($x) {
                // Normalisasi shift
                $shiftRaw = strtolower($x->shift);

                return (object)[
                    'pegawai_id' => $x->pegawai_id ?? null,
                    'nik' => $x->nik ?? null,
                    'nama_pegawai' => $x->nama_pegawai,
                    'tanggal' => Carbon::parse($x->tanggal)->format('Y-m-d'),
                    'shift' => $x->shift, // <-- langsung pakai dari database
                ];
            })
            ->groupBy('shift')
            ->map(function ($shiftGroup) {
                return $shiftGroup->groupBy('nama_pegawai');
            });

        // Ambil data izin
        $izinRaw = DB::table('izin_pegawais')
            ->join('izin_pegawai_jadwal', 'izin_pegawai_jadwal.izin_pegawai_id', '=', 'izin_pegawais.id')
            ->join('jadwals', 'jadwals.id', '=', 'izin_pegawai_jadwal.jadwal_id')
            ->whereBetween('izin_pegawai_jadwal.tanggal', [$startDate, $endDate])
            ->select(
                'izin_pegawais.nama_pegawai', // 🔴 ganti
                'izin_pegawai_jadwal.tanggal',
                'izin_pegawais.keterangan',
                'jadwals.jadwal as shift'
            )
            ->get();


        $izin = [];

        foreach ($izinRaw as $row) {
            $pegawaiId = $row->nama_pegawai;
            $tgl = Carbon::parse($row->tanggal)->format('Y-m-d'); // 🔴 NORMALISASI
            $shift = strtoupper($row->shift);

            if (!isset($izin[$pegawaiId][$tgl])) {
                $izin[$pegawaiId][$tgl] = [
                    'ket' => match (strtolower($row->keterangan)) {
                        'tugas pesantren' => 'T',
                        'sakit'           => 'S',
                        'izin'            => 'I',
                        default           => 'I',
                    },
                    'pagi'  => 0,
                    'siang' => 0,
                    'malam' => 0,
                ];
            }

            if ($shift === 'PAGI')  $izin[$pegawaiId][$tgl]['pagi']  = 1;
            if ($shift === 'SIANG') $izin[$pegawaiId][$tgl]['siang'] = 1;
            if ($shift === 'MALAM') $izin[$pegawaiId][$tgl]['malam'] = 1;
        }


        $jadwal = DB::table('pegawai_jadwal')->get();

        $pegawaiPagi = $pegawai->filter(fn($p) =>
            $jadwal->contains(fn($j) => $j->pegawai_id == $p->id && $j->pagi == 1)
        );

        $pegawaiSiang = $pegawai->filter(fn($p) =>
            $jadwal->contains(fn($j) => $j->pegawai_id == $p->id && $j->siang == 1)
        );

        $pegawaiMalam = $pegawai->filter(fn($p) =>
            $jadwal->contains(fn($j) => $j->pegawai_id == $p->id && $j->malam == 1)
        );

        $shiftPagi = [];
        $shiftSiang = [];
        $shiftMalam = [];

        foreach ($pegawai as $p) {

            $jadwalPegawai = $jadwal->where('pegawai_id', $p->id);

            $shiftPagi[$p->nama_pegawai] = [];
            $shiftSiang[$p->nama_pegawai] = [];
            $shiftMalam[$p->nama_pegawai] = [];

            foreach ($dates as $tgl) {
                $hari = strtolower(Carbon::parse($tgl)->format('l')); // monday, tuesday, ...

                // cari jadwal sesuai hari
                $match = $jadwalPegawai->firstWhere('hari', $hari);

                if ($match) {
                    if ($match->pagi == 1)  $shiftPagi[$p->nama_pegawai][] = $tgl;
                    if ($match->siang == 1) $shiftSiang[$p->nama_pegawai][] = $tgl;
                    if ($match->malam == 1) $shiftMalam[$p->nama_pegawai][] = $tgl;
                }
            }
        }

        $jadwalGroup = $jadwal->groupBy('pegawai_id');

        $namaBulan = Carbon::createFromDate($tahun, $bulan, 1)->translatedFormat('F');

        $pdf = Pdf::loadView('admin.Kehadiran.rekapan.laporan', [
            'absensi' => $absensi,
            'izinPegawai' => $izin,
            'jadwalGroup' => $jadwalGroup,
            'pegawaiPagi' => $pegawaiPagi,
            'pegawaiSiang' => $pegawaiSiang,
            'pegawaiMalam' => $pegawaiMalam,
            'shiftPagi' => $shiftPagi,
            'shiftSiang' => $shiftSiang,
            'shiftMalam' => $shiftMalam,
            'bulan' => $bulan,
            'libur' => $libur,
            'tahun' => $tahun,
            'namaBulan' => $namaBulan,
            'pegawai' => $pegawai,
            'dates' => $dates,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'liburByDateShift' => $liburByDateShift,
            'periode' => $periode,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream("rekapan-kehadiran-{$namaBulan}-{$tahun}.pdf");
    }

}
