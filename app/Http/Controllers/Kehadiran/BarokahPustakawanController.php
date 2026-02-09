<?php

namespace App\Http\Controllers\Kehadiran;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kehadiran\Anak;
use App\Models\Kehadiran\Tunkel;
use App\Models\Kehadiran\Pegawai;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kehadiran\Kehormatan;
use App\Models\Kehadiran\TunjanganJabatan;
use App\Models\Kehadiran\BarokahPustakawan;
use App\Models\Kehadiran\RankDosen;
use App\Models\Kehadiran\TunjanganKehadiran;
use App\Models\Kehadiran\TunjanganPengabdian;

use function Symfony\Component\Clock\now;

class BarokahPustakawanController extends Controller
{
    public function index(Request $request)
    {

        $bulan = now()->format('m');  
        $tahun = now()->format('Y');  

        $periode = sprintf('%04d-%02d', $tahun, $bulan);

        /* =========================
        1. AMBIL DATA PEGAWAI
        ========================= */
       $pegawai = DB::table('pegawais')
            ->leftJoin('barokah_pustakawans', function ($join) use ($periode) {
                $join->on('pegawais.id', '=', 'barokah_pustakawans.pegawai_id')
                    ->where('barokah_pustakawans.periode', $periode);
            })

            ->leftJoin('barokah_rank_dosen as brd', function ($join) {
                $join->on('brd.pendidikan_terakhir', '=', 'pegawais.pend_terakhir')
                    ->whereRaw("
                        brd.tahun = (
                            SELECT MAX(tahun)
                            FROM barokah_rank_dosen
                            WHERE pendidikan_terakhir = pegawais.pend_terakhir
                            AND tahun <= (YEAR(CURDATE()) - YEAR(pegawais.tmt_mengajar) + 1)
                        )
                    ");
            })

            ->select(
                'pegawais.id',
                'pegawais.nama_pegawai',
                'pegawais.tmt_mengajar',
                'pegawais.pend_terakhir',

                DB::raw('(YEAR(CURDATE()) - YEAR(pegawais.tmt_mengajar) + 1) as tahun_mengajar'),

                DB::raw('COALESCE(barokah_pustakawans.t_kehadiran, 0) as t_kehadiran'),
                DB::raw('COALESCE(barokah_pustakawans.t_jabatan, 0) as t_jabatan'),
                DB::raw('COALESCE(barokah_pustakawans.t_pengabdian, 0) as t_pengabdian'),
                DB::raw('COALESCE(barokah_pustakawans.t_tunkel, 0) as t_tunkel'),
                DB::raw('COALESCE(barokah_pustakawans.t_kehormatan, 0) as t_kehormatan'),
                DB::raw('COALESCE(barokah_pustakawans.t_barokah_dosen, 0) as t_barokah_dosen'),
                DB::raw('COALESCE(brd.t_rank_dosen, 0) as t_rank_dosen'),
                DB::raw('COALESCE(barokah_pustakawans.t_anak, 0) as t_anak')
            )
            ->orderBy('pegawais.nama_pegawai')
            ->get();


        /* =========================
        3. DATA MASTER
        ========================= */
        $bulan = now()->format('Y-m');

        $barokahDomisili = TunjanganKehadiran::get();
        $barokahJabatan  = TunjanganJabatan::get();
        $barokahAnak     = Anak::get();
        $tunkel          = Tunkel::get();
        $berkah          = BarokahPustakawan::get();
        $pengabdian      = TunjanganPengabdian::get();
        $kehormatan      = Kehormatan::get();
        $kehadiran       = TunjanganKehadiran::get();

        /* =========================
        4. RETURN VIEW
        ========================= */
        return view('admin.Kehadiran.barokah_pustakawan.barokah', compact(
            'pegawai',
            'barokahDomisili',
            'barokahJabatan',
            'barokahAnak',
            'berkah',
            'tunkel',
            'kehormatan',
            'pengabdian',
            'kehadiran',
            'bulan',
            'periode',
        ));
    }

    public function generate(Request $request)
    {
        // ===============================
        // PERIODE & APBM
        // ===============================
        $periode = $request->bulan
            ? Carbon::parse($request->bulan)->format('Y-m')
            : now()->format('Y-m');

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
        // DATA PEGAWAI
        // ===============================
        $pegawai = DB::table('pegawais')

            // === KEHADIRAN ===
            ->leftJoin('tunjangan_kehadirans as tk', function ($join) use ($apbm) {
                $join->on('tk.tempatTinggal', '=', 'pegawais.domisili')
                    ->where('tk.APBM', $apbm);
            })

            // === JABATAN ===
            ->leftJoin('tunjangan_jabatans as tj', function ($join) use ($apbm) {
                $join->on('tj.nama_jabatan', '=', 'pegawais.nama_jabatan')
                    ->where('tj.APBM', $apbm);
            })

            

            // === BAROKAH RANK DOSEN ===
            ->leftJoin('barokah_rank_dosen as brd', function ($join) use ($apbm) {
                $join->on('brd.pendidikan_terakhir', '=', 'pegawais.pend_terakhir')
                    ->where('brd.APBM', $apbm)
                    ->whereRaw("
                        brd.tahun = (
                            SELECT MAX(tahun)
                            FROM barokah_rank_dosen
                            WHERE pendidikan_terakhir = pegawais.pend_terakhir
                            AND APBM = {$apbm}
                            AND tahun <= (YEAR(CURDATE()) - YEAR(pegawais.tmt_mengajar) + 1)
                        )
                    ");
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

        return view(
            'admin.Kehadiran.barokah_pustakawan.barokah_generate',
            compact('pegawai', 'periode', 'apbm')
        );
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'sks_dosen'  => 'nullable|numeric|min:0',
        ]);

        $pegawai = Pegawai::findOrFail($request->pegawai_id);

        // default: barokah dosen = 0
        $tBarokahDosen = 0;

        // HANYA hitung rank dosen jika punya TMT mengajar
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
                $sks = (int) ($request->sks_dosen ?? 0);
                $tBarokahDosen = $sks * (int) $rankDosen->t_rank_dosen;
            }
            // ❗ kalau rank tidak ketemu → tetap 0 (tidak error)
        }

        // periode dari filter atau otomatis
        $periode = $request->periode ?? now()->format('Y-m');

        BarokahPustakawan::create([
            'pegawai_id'        => $pegawai->id,
            't_jabatan'         => $request->t_jabatan ?? 0,
            't_pengabdian'      => $request->t_pengabdian ?? 0,
            't_kehadiran'       => $request->t_kehadiran ?? 0,
            't_tunkel'          => $request->t_tunkel ?? 0,
            't_anak'            => $request->t_anak ?? 0,
            't_kehormatan'      => $request->t_kehormatan ?? 0,
            't_barokah_dosen'   => $tBarokahDosen, // 🔥 aman
            'periode'           => $periode,
        ]);

        return back()->with('success', 'Data berhasil di-generate');
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
