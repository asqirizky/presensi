<?php

namespace App\Http\Controllers\Kehadiran;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kehadiran\Pegawai;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kehadiran\BarokahPustakawan;


class BarokahPustakawanController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();

        $bulan = $request->bulan ?? $now->month;
        $tahun = $request->tahun ?? $now->year;

        $periode = sprintf('%04d-%02d', $tahun, $bulan);

        $barokah = BarokahPustakawan::with('pegawai')
            ->where('periode', $periode)
            ->get();
        
        return view('admin.Kehadiran.barokah_pustakawan.barokah', compact(
            'barokah',
            'periode',
            'bulan',
            'tahun',
        ));
    }

    public function generate(Request $request)
    {
        // ===============================
        // PERIODE & APBM
        // ===============================
        $now = Carbon::now();

        $bulan = $request->bulan ?? $now->month;
        $tahun = $request->tahun ?? $now->year;

        $periode = Carbon::create($tahun, $bulan, 1)->format('Y-m');
        $apbm = $request->apbm ?? date('Y');

        // ===============================
        // NILAI GLOBAL (BERDASARKAN APBM)
        // ===============================
        $pengabdian = DB::table('tunjangan_pengabdians')
            ->where('APBM', $apbm)
            ->value('tunjangan_pengabdian') ?? 0;

        $tunkel = DB::table('tunkels')
            ->where('APBM', $apbm)
            ->value('tunkel') ?? 0;

        $kehormatan = DB::table('kehormatans')
            ->where('APBM', $apbm)
            ->value('tunjangan_kehormatan') ?? 0;

        $anak = DB::table('anaks')
            ->where('APBM', $apbm)
            ->value('tunjangan_anak') ?? 0;

        // ===============================
        // QUERY PEGAWAI
        // ===============================
        $pegawai = DB::table('pegawais')

            ->leftJoin('tunjangan_kehadirans as tk', function ($join) use ($apbm) {
                $join->on('tk.tempatTinggal', '=', 'pegawais.domisili')
                    ->where('tk.APBM', $apbm);
            })

            ->leftJoin('tunjangan_jabatans as tj', function ($join) use ($apbm) {
                $join->on('tj.nama_jabatan', '=', 'pegawais.nama_jabatan')
                    ->where('tj.APBM', $apbm);
            })

            ->leftJoin('barokah_rank_dosen as brd', function ($join) use ($apbm) {
                $join->on('brd.pendidikan_terakhir', '=', 'pegawais.pend_terakhir')
                    ->where('brd.APBM', $apbm)
                    ->whereRaw("
                        brd.tahun = (
                            SELECT MAX(tahun)
                            FROM barokah_rank_dosen
                            WHERE pendidikan_terakhir = pegawais.pend_terakhir
                            AND APBM = ?
                            AND tahun <= (YEAR(CURDATE()) - YEAR(pegawais.tmt_mengajar) + 1)
                        )
                    ", [$apbm]);
            })

            ->selectRaw("
                pegawais.id,
                pegawais.nama_pegawai,
                pegawais.domisili,
                pegawais.nama_jabatan,
                pegawais.tmt_mengajar,
                pegawais.pend_terakhir,

                (YEAR(CURDATE()) - YEAR(pegawais.tmt_mengajar) + 1) as tahun_mengajar,

                MAX(COALESCE(tk.tunjangan, 0)) as kehadiran,
                MAX(COALESCE(tj.tunjangan_jabatan, 0)) as jabatan,

                {$pengabdian} as pengabdian,
                {$tunkel} as tunkel,
                {$kehormatan} as kehormatan,
                {$anak} as anak,

                MAX(COALESCE(brd.t_rank_dosen, 0)) as t_rank_dosen
            ")

            ->groupBy(
                'pegawais.id',
                'pegawais.nama_pegawai',
                'pegawais.domisili',
                'pegawais.nama_jabatan',
                'pegawais.tmt_mengajar',
                'pegawais.pend_terakhir'
            )

            ->orderBy('pegawais.nama_pegawai')
            ->get();

        $barokah = BarokahPustakawan::where('periode', $periode)
            ->get()
            ->keyBy('pegawai_id');


        return view('admin.Kehadiran.barokah_pustakawan.barokah_generate', compact(
            'pegawai',
            'periode',
            'apbm',
            'barokah',
        ));
    }


    
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $pegawaiData   = $request->pegawai ?? [];
            $sksData       = $request->sks_dosen ?? [];
            $periode       = $request->periode ?? now()->format('Y-m');

            foreach ($pegawaiData as $pegawaiId => $data) {

    $pegawai = Pegawai::find($pegawaiId);
    if (!$pegawai) continue;

    $tBarokahDosen = 0;

    if ($pegawai->tmt_mengajar) {

        $tmt = Carbon::parse($pegawai->tmt_mengajar)->startOfYear();
        $sekarang = Carbon::now()->startOfYear();
        $tahunMengajar = $tmt->diffInYears($sekarang) + 1;

        $rankDosen = DB::table('barokah_rank_dosen')
            ->where('pendidikan_terakhir', $pegawai->pend_terakhir)
            ->where('tahun', '<=', $tahunMengajar)
            ->orderByDesc('tahun')
            ->first();

        if ($rankDosen) {
            $sks = (int) ($sksData[$pegawaiId] ?? 0);
            $tBarokahDosen = $sks * (int) $rankDosen->t_rank_dosen;
        }
    }

    BarokahPustakawan::updateOrCreate(
        [
            'pegawai_id' => $pegawaiId,
            'periode'    => $periode,
        ],
        [
            't_jabatan'       => (int) ($data['t_jabatan'] ?? 0),
            't_pengabdian'    => (int) ($data['t_pengabdian'] ?? 0),
            't_kehadiran'     => (int) ($data['t_kehadiran'] ?? 0),
            't_tunkel'        => (int) ($data['t_tunkel'] ?? 0),
            't_anak'          => (int) ($data['t_anak'] ?? 0),
            't_kehormatan'    => (int) ($data['t_kehormatan'] ?? 0),
            't_barokah_dosen' => $tBarokahDosen,
        ]
    );
}


            DB::commit();

            return back()->with('success', 'Data barokah pustakawan berhasil disimpan.');

        } catch (\Exception $e) {

            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }


    protected function tunjanganPengabdian(int $selisihTahun)
    {
        if ($selisihTahun < 3) {
            return null;
        }

        $periode = (int) floor($selisihTahun / 3);
        $nilaiPerPeriode = 10000;

        return $periode * $nilaiPerPeriode;
    }

    protected function tunjanganKehormatan(int $selisihTahun)
    {
        if ($selisihTahun < 10) {
            return null;
        }

        $dasar = 100000;
        $sisa = $selisihTahun - 10;
        $tambahanInterval = 50000;

        $interval = (int) floor($sisa / 5);

        return $dasar + ($interval * $tambahanInterval);
    }
}
