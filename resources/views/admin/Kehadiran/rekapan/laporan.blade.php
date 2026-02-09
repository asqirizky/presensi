<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kehadiran Bulan {{ $namaBulan }} {{ $tahun }}</title>
    <style>
        h2 {
            text-align: center;
            font-size: 16px;
        }

        p.rekap.nama-bulan {
            font-size: 10px;
            font-weight: bold;
        }

        table.rekap {
            border-collapse: collapse;
            width: 100%;
            font-size: 10px;
            padding: 0px;
            border: 1px solid-black;
        }

        table.daftar {
            border-collapse: collapse;
            width: 100%;
            font-size: 10px;
            padding: 0px;
            border: 1px solid-black;
            white-space: nowrap;
        }

        table, th, td {
            border: 1px solid black;
        }

        table, th {
            background: #c7ecfa;
        }

        table.rekap, tr.pertama {
            background: #ffffff;
        }

        th.ket {
            width: 3%;
        }

        th {
            padding: 4px;
            text-align: center;
            font-size: 10px;
        }

        td {
            padding: 4px;
            text-align: right;
            font-size: 10px;
        }

        td.tengah {
            text-align: center;
        }

        td.keterangan {
            text-align: center;
            white-space: nowrap;
        }

        td.kiri {
            text-align: left;
            padding: 4px 6px;
            white-space: nowrap;
        }

        td.ttd {
            border: none;
            text-align: center;
            width: 10%;
        }

        td.ket {
            text-align: center;
        }

        td.pegawai {
            text-align: left;
        }

        td.totalA {
            text-align: center;
            background: #FF8C00;
        }

        td.totalS {
            text-align: center;
            background: #9ACD32;
        }

        td.totalT {
            text-align: center;
            background: #00FFFF;
        }

        td.totalI {
            text-align: center;
            background: #81b2da;
        }

        td.totalH {
            text-align: center;
            background: #e7e7e7;
        }

        th.tanggal {
            text-align: center;
            width: 15px;
            white-space: nowrap;
        }

        table.bulan {
            width: 100%;
            margin-bottom: 10px;
            border-collapse: collapse;
            border: none;
            background: #ffffff;
        }

        td.nama-bulan {
            text-align: left;
            border: none;
            font-size: 14px;
        }

        td.nama-shift {
            text-align: right;
            border: none;
            font-size: 14px;
        }

        tbody.rekap {
            background: #ffffff;
        }

        span.ttd {
            font-size: 12px;
        }

        .page-break {
            page-break-before: always;
        }

        table.keterangan {
            border: none;
            background: #ffffff;
            width: 100%;
            border-collapse: collapse;
        }

         /* Garis putus-putus antar kolom (bukan bawah baris) */
        table.libur td:first-child,
        table.libur th:first-child {
            border-right: 1px dashed #000;
        }

        table.libur td:nth-child(2),
        table.libur th:nth-child(2) {
            border-right: 1px dashed #000;
        }

        /* Hilangkan border lainnya */
        table.libur, table.libur th, table.libur td {
            border: none !important;
            background: #fff !important;
        }

        /* Garis header bawah tetap solid */
        table.libur tr.header-row th {
            border-bottom: 1px solid #000 !important;
        }
    </style>
</head>
    {{--  rekap barokah umana  --}}
    <body>
        <h2>BAROKAH UMANA <br>PERPPUSTAKAAN IBRAHIMY <br>TAHUN {{ $tahun }}</h2>
        <p class="nama-bulan">Bulan : {{ $namaBulan }}</p>

         <table class="rekap">
            <thead>
                <!-- BARIS HEADER PERTAMA -->
                <tr class="pertama">
                    <th rowspan="2">NO</th>
                    <th rowspan="2">NAMA</th>
                    <th rowspan="2">JABATAN</th>
                    <th rowspan="2">TMT</th>
                    <th rowspan="2">MP</th>

                    <!-- Kolom BAROKAH -->
                    <th colspan="7" style="border:1px solid #000;">BAROKAH</th>

                    <th rowspan="2" style="border:1px solid #000;">JUMLAH</th>
                    <th rowspan="2" class="ket">H</th>
                    <th rowspan="2" class="ket">I</th>
                    <th rowspan="2" class="ket">T</th>
                    <th rowspan="2" class="ket">S</th>
                    <th rowspan="2" class="ket">A</th>
                    <th rowspan="2" class="ket">%</th>

                </tr>

                <!-- BARIS HEADER KEDUA (SUB KATEGORI BAROKAH) -->
                <tr class="kedua">
                    <th>Jabatan</th>
                    <th>Pengabdian</th>
                    <th>Kehadiran</th>
                    <th>Tunkel</th>
                    <th>Anak</th>
                    <th>TBK</th>
                    <th>Kehormatan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Carbon\Carbon;
                    use App\Models\Kehadiran\PegawaiJadwal;
                    use App\Models\Kehadiran\AbsenPegawai;

                    $bulan = request('bulan', now()->month);
                    $tahunSekarang = now()->year;
                    $totalSemuaKehadiran = 0;
                    $t_pengabdian = 0;
                    $t_kehormatan = 0;
                    $jumlahShift = 0;

                    $jumlahHadirPagi = 0;
                    $jumlahHadirSiang = 0;
                    $jumlahHadirMalam = 0;

                    $totalBarokahJabatan = 0;
                    $barokahJabatanFinal = 0;

                    $periode = Carbon::create($tahun)->format('Y');

                    $totalHari = count($dates);
                @endphp

                @foreach ($pegawai as $index => $p)
                @php
                    $jumlahHadir = AbsenPegawai::where('nik', $p->nik)
                        ->whereDate('tanggal', '>=', $startDate)
                        ->whereDate('tanggal', '<=', $endDate)
                        ->count();

                    $jadwalPegawai = $jadwalGroup[$p->id] ?? collect();

                    $jadwal = DB::table('pegawai_jadwal')
                        ->where('pegawai_id', $p->id)
                        ->first();

                    $shiftAktif = [
                        'pagi'  => $jadwal ? (int) $jadwal->pagi  : 0,
                        'siang' => $jadwal ? (int) $jadwal->siang : 0,
                        'malam' => $jadwal ? (int) $jadwal->malam : 0,
                    ];

                    $jumlahShiftAktifPerHari =
                        ($shiftAktif['pagi']  ? 1 : 0) +
                        ($shiftAktif['siang'] ? 1 : 0) +
                        ($shiftAktif['malam'] ? 1 : 0);

                    $totalShiftEfektif = $totalHari * $jumlahShiftAktifPerHari;

                    $tidakPunyaShift = [
                        'pagi' => $shiftAktif['pagi'] ? 0 : $totalHari,
                        'siang' => $shiftAktif['siang'] ? 0 : $totalHari,
                        'malam' => $shiftAktif['malam'] ? 0 : $totalHari,
                    ];

                    $liburShift = [
                        'pagi'  => $shiftAktif['pagi']  === 0 ? $totalHari : 0,
                        'siang' => $shiftAktif['siang'] === 0 ? $totalHari : 0,
                        'malam' => $shiftAktif['malam'] === 0 ? $totalHari : 0,
                    ];


                    /* =========================
                       1. TOTAL HARI PERIODE
                    ========================= */
                    $totalHari = Carbon::parse($startDate)
                        ->diffInDays(Carbon::parse($endDate)) + 1;


                    /* =========================
                       2. JUMLAH HADIR (SCAN)
                    ========================= */
                    $jumlahHadir = AbsenPegawai::where('nik', $p->nik)
                        ->whereDate('tanggal', '>=', $startDate)
                        ->whereDate('tanggal', '<=', $endDate)
                        ->count();


                    /* =========================
                       3. HITUNG LIBUR PER SHIFT
                       (BERDASARKAN JADWAL HARIAN)
                    ========================= */
                    $liburShift = [
                        'pagi'  => 0,
                        'siang' => 0,
                        'malam' => 0,
                    ];

                    $totalShiftEfektif = 0;

                    // =========================
                    // HITUNG I S T A
                    // =========================
                    $totalI = 0;
                    $totalS = 0;
                    $totalT = 0;
                    $totalA = 0;

                    foreach ($dates as $tanggal) {

                    $hari = Carbon::parse($tanggal)->translatedFormat('l');
                    $jadwalHari = $jadwalPegawai->firstWhere('hari', $hari);

                    if (!$jadwalHari) continue;

                    foreach (['pagi', 'siang', 'malam'] as $shift) {

                        // tidak ada jadwal shift
                        if ($jadwalHari->$shift != 1) continue;

                        // cek libur
                        $isLibur = false;
                        foreach ($liburByDateShift[$tanggal] ?? [] as $l) {
                            if ($l['ruang'] === 'Semua Ruang') {
                                $isLibur = true;
                                break;
                            }
                        }
                        if ($isLibur) continue;

                        // =====================
                        // CEK HADIR PER SHIFT
                        // =====================
                        $hadir = AbsenPegawai::where('nik', $p->nik)
                            ->whereDate('tanggal', $tanggal)
                            ->where('shift', $shift) //
                            ->exists();

                        // =====================
                        // CEK IZIN PER SHIFT
                        // =====================
                        $izin = $izinPegawai[$p->nama_pegawai][$tanggal] ?? null;
                        $izinShift = ($izin && ($izin[$shift] ?? 0) == 1)
                            ? $izin['ket']
                            : null;

                        if ($hadir) {
                            continue; // hadir = tidak dihitung ISTA
                        }

                        if ($izinShift) {
                            if ($izinShift === 'I') $totalI++;
                            elseif ($izinShift === 'S') $totalS++;
                            elseif ($izinShift === 'T') $totalT++;
                        } else {
                            $totalA++; // alfa murni
                        }
                    }



                        // PAGI
                        if ($jadwalHari->pagi == 1) {
                            $totalShiftEfektif++;
                        } else {
                            $liburShift['pagi']++;
                        }

                        // SIANG
                        if ($jadwalHari->siang == 1) {
                            $totalShiftEfektif++;
                        } else {
                            $liburShift['siang']++;
                        }

                        // MALAM
                        if ($jadwalHari->malam == 1) {
                            $totalShiftEfektif++;
                        } else {
                            $liburShift['malam']++;
                        }
                    }

                    $jumlahHariPeriode = \Carbon\Carbon::parse($startDate)
                        ->diffInDays(\Carbon\Carbon::parse($endDate)) + 1;


                    $TI = $totalI/2;
                    $TS = $totalS/2;

                        $jumlahHadirEfektif = min($jumlahHadir, $totalShiftEfektif);

                    $persentase = $totalShiftEfektif > 0
                        ? round((($totalShiftEfektif-$TI-$TS-$totalA) / $totalShiftEfektif) * 100)
                        : 0;

                    // =========================
                    // BAROKAH JABATAN DINAMIS
                    // =========================
                    if ($persentase < 50) {
                        $barokahJabatanFinal = round($p->t_jabatan * ($persentase / 100));
                    } else {
                        $barokahJabatanFinal = $p->t_jabatan;
                    }

                    $totalBarokahJabatan += $barokahJabatanFinal;


                    $punyaPagi  = $jadwalPegawai->contains(fn($j) => $j->pagi == 1);
                    $punyaSiang = $jadwalPegawai->contains(fn($j) => $j->siang == 1);
                    $punyaMalam = $jadwalPegawai->contains(fn($j) => $j->malam == 1);

                    $jumlahShift =
                        ($punyaPagi ? 1 : 0) +
                        ($punyaSiang ? 1 : 0) +
                        ($punyaMalam ? 1 : 0);

                    $shiftPerHari =
                        ($punyaPagi ? 1 : 0) +
                        ($punyaSiang ? 1 : 0) +
                        ($punyaMalam ? 1 : 0);


                    $totalKehadiran = $p->t_kehadiran * $jumlahHadir;

                    $totalKehadiran = $p->t_kehadiran * $jumlahHadir;
                    $totalSemuaKehadiran += $totalKehadiran;

                    $tahun_masuk = Carbon::parse($p->tmt)->year;
                    $masa_kerja = $tahunSekarang - $tahun_masuk;

                    if ($bulan >= 6) {
                        $masa_kerja += 1;
                    }

                    $mp = ($periode - Carbon::parse($p->tmt)->year) + 1;
                    $TMT = floor($mp / 3);
                    $TMT2 = $TMT * $p->t_pengabdian;
                    $kehormatan = floor($mp / 5)*$p->t_kehormatan;

                    $jumlahSeluruhnya =
                        $barokahJabatanFinal
                        + $TMT2
                        + $totalKehadiran
                        + $p->t_tunkel
                        + $p->t_anak
                        + $p->t_barokah_dosen
                        + $kehormatan;

                @endphp
                <tr>
                    <td class="tengah">{{ $index+1 }}</td>
                    <td class="kiri">{{ $p->nama_pegawai }}</td>
                    <td class="kiri">{{ $p->nama_jabatan }}</td>
                    <td class="tengah">{{ Carbon::parse($p->tmt)->isoFormat('Y') }}</td>
                    <td class="tengah">{{ $mp }}</td>


                    <td>{{ number_format($barokahJabatanFinal ?? 0, 0, ',', '.') }}</td>
                    <td>{{ number_format($TMT2 ?? 0, 0, ',', '.') }}</td>
                    <td>{{ number_format($totalKehadiran ?? 0, 0, ',', '.') }}</td>
                    <td>{{ number_format($p->t_tunkel ?? 0, 0, ',', '.') }}</td>
                    <td>{{ number_format($p->t_anak ?? 0, 0, ',', '.') }}</td>
                    <td>{{ number_format($p->t_barokah_dosen ?? 0, 0, ',', '.') }}</td>
                    <td>{{ number_format($kehormatan ?? 0, 0, ',', '.') }} </td>

                    <td>{{ number_format($jumlahSeluruhnya ?? 0, 0, ',', '.') }}</td>
                    <td class="keterangan">{{ $jumlahHadir }}</td>
                    <td class="keterangan">{{ $totalI }}</td>
                    <td class="keterangan">{{ $totalT }}</td>
                    <td class="keterangan">{{ $totalS }}</td>
                    <td class="keterangan">{{ $totalA }}</td>
                    <td class="keterangan">{{ $persentase }}%

                    </td>
                </tr>
                @php
                    $t_pengabdian = $t_pengabdian + $TMT2;
                    $t_kehormatan += $kehormatan;

                    $totalJumlahSemua =
                    $totalBarokahJabatan
                    + $t_pengabdian
                    + $totalSemuaKehadiran
                    + $pegawai->sum('t_tunkel')
                    + $pegawai->sum('t_anak')
                    + $pegawai->sum('t_barokah_dosen')
                    + $t_kehormatan;
                @endphp
                @endforeach
                <!-- BARIS TOTAL -->
                <tr style="background:#eef1f7; font-weight:bold;">
                    <td style="border:1px solid #000; text-align: center;" colspan="5">Jumlah</td>

                    <td>{{ number_format($totalBarokahJabatan, 0, ',', '.') }}</td>
                    <td>{{ number_format($t_pengabdian, 0, ',','.') }}</td>
                    <td>{{ number_format($totalSemuaKehadiran, 0, ',', '.') }}</td>
                    <td>{{ number_format($pegawai->sum('t_tunkel'), 0, ',', '.') }}</td>
                    <td>{{ number_format($pegawai->sum('t_a nak'), 0, ',', '.') }}</td>
                    <td>{{ number_format($pegawai->sum('t_barokah_dosen'), 0, ',', '.') }}</td>
                    <td>{{ number_format($t_kehormatan, 0, ',', '.') }}</td>

                    <td>{{ number_format($totalJumlahSemua, 0, ',', '.') }}</td>
                    <td style="border:1px solid #000; text-align: center;" colspan="6">TOTAL {{ number_format($totalJumlahSemua, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>


        <div style="position: fixed; bottom: 10px; left: 20px; font-size: 8pt;">
            <b>Download: {{ \Carbon\Carbon::parse($periode)->isoFormat('MMMM YYYY') }},</b>
            <b>URL:</b> {{ url()->current() }}
        </div>

        <div style="position: fixed; bottom: 50px; right: 20px;">
            <div style="width: 60px; height: 30px;">
                {!! DNS2D::getBarcodeHTML(request()->fullUrl(), 'QRCODE', 3, 3) !!}
            </div>
        </div>

        {{--  absen pagi  --}}
        <div class="page-break">
            <h2>REKAPITULASI DAFTAR HADIR UMANA <br>
                PERPUSTAKAAN IBRAHIMY <br>
                TAHUN {{ $tahun }}
            </h2>
        </div>

        <table class="bulan">
            <tr>
                <td class="nama-bulan">Bulan {{ $namaBulan }}</td>
                <td class="nama-shift">Shift Pagi</td>
            </tr>
        </table>

        @php
            $bulan = request('bulan');
            $tahun = request('tahun');

            // Set tanggal awal & akhir bulan berdasarkan pilihan user
            $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth()->toDateString();
            $endDate   = Carbon::create($tahun, $bulan, 1)->endOfMonth()->toDateString();

            $period = new DatePeriod(
                new DateTime($startDate),
                new DateInterval('P1D'),
                (new DateTime($endDate))->modify('+1 day')
            );

            $dates = [];
            foreach ($period as $d) {
                $dates[] = $d->format('Y-m-d');
            }
        @endphp

        <table class="daftar">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2" style="width: 135px; text-align: center;">Nama</th>
                    <th colspan="{{ count($dates) }}">Tanggal</th>
                    <th colspan="6">Total</th>
                </tr>
                <tr>
                    @foreach ($dates as $tgl)
                        <th class="tanggal">{{ \Carbon\Carbon::parse($tgl)->format('d') }}</th>
                    @endforeach
                    <th>H</th>
                    <th>I</th>
                    <th>T</th>
                    <th>S</th>
                    <th>A</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody class="rekap">
            @foreach ($pegawaiPagi as $index => $item)
            @php
                // Ambil daftar tanggal hadir untuk pegawai ini
                $absenPegawai = collect($absensi['Pagi'][$item->nama_pegawai] ?? [])
                    ->map(fn($x) => $x->tanggal) // <--- FIX UTAMA
                    ->toArray();
            @endphp
            <tr>
                <td class="tengah">{{ $loop->iteration }}</td>
                <td class="pegawai">{{ $item->nama_pegawai }}</td>
                @foreach ($dates as $tgl)
                    @php
                        // Ambil hari (Senin, Selasa, dll)
                        $hari = \Carbon\Carbon::parse($tgl)->translatedFormat('l');

                        // Ambil jadwal pegawai hari itu
                        $jadwalHari = $jadwalGroup[$item->id]->firstWhere('hari', $hari);

                        // Default
                        $style = '';

                        // Jika tidak ada jadwal → dianggap libur → kuning
                        if (!$jadwalHari) {
                            $style = 'background: yellow;';
                        }
                        // Jika shift pagi = 0 → kuning
                        elseif ($jadwalHari->pagi == 0) {
                            $style = 'background: yellow;';
                        }
                    @endphp

                    <td style="text-align:center; {{ $style }}"
                        @if($style == '' && !in_array($tgl, $absenPegawai) && $jadwalHari && $jadwalHari->malam == 1)
                            style="background: #FF8C00; text-align:center;"
                        @endif
                    >
                        @if(in_array($tgl, $absenPegawai))
                            H
                        @else
                            @if($jadwalHari && $jadwalHari->pagi == 1)
                                A
                            @endif
                        @endif
                    </td>
                @endforeach
                @php
                    $totalH = count($absenPegawai);
                    $totalA = count($dates) - $totalH;
                @endphp
                <td class="totalH">{{ $totalH }}</td>
                <td class="totalI">0</td>
                <td class="totalT">0</td>
                <td class="totalS">0</td>
                <td class="totalA">{{ $totalA }}</td>
                <td class="total">{{ round(($totalH / count($dates)) * 100) }}%</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <br>

        {{ !! renderLiburTable($libur, $bulan, $tahun) }}


        {{--  absen siang  --}}
        <div class="page-break">
            <h2>REKAPITULASI DAFTAR HADIR UMANA <br>
                PERPUSTAKAAN IBRAHIMY <br>
                TAHUN {{ $tahun }}
            </h2>
        </div>

        <table class="bulan">
            <tr>
                <td class="nama-bulan">Bulan {{ $namaBulan }}</td>
                <td class="nama-shift">Shift Siang</td>
            </tr>
        </table>

        <table class="daftar">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2" style="width: 135px; text-align: center;">Nama</th>
                    <th colspan="{{ count($dates) }}">Tanggal</th>
                    <th colspan="6">Total</th>
                </tr>
                <tr>
                    @foreach ($dates as $tgl)
                        <th class="tanggal">{{ \Carbon\Carbon::parse($tgl)->format('d') }}</th>
                    @endforeach
                    <th>H</th>
                    <th>I</th>
                    <th>T</th>
                    <th>S</th>
                    <th>A</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody class="rekap">
            @foreach ($pegawaiSiang as $item)
                @php
                    $absenPegawai = collect($absensi['Siang'][$item->nama_pegawai] ?? [])
                        ->pluck('tanggal')
                        ->toArray();

                    $totalH = 0;
                    $totalI = 0;
                    $totalT = 0;
                    $totalS = 0;
                    $totalA = 0;
                    $hariAktif = 0;
                @endphp
                <tr>
                    <td class="tengah">{{ $loop->iteration }}</td>
                    <td class="pegawai">{{ $item->nama_pegawai }}</td>
                    @foreach ($dates as $tgl)
                        @php
                            $hari = \Carbon\Carbon::parse($tgl)->translatedFormat('l');
                            $jadwalHari = $jadwalGroup[$item->id]->firstWhere('hari', $hari) ?? null;

                            // shift SIANG aktif
                            $isActiveShift = $jadwalHari && ($jadwalHari->siang == 1);

                            // status hadir
                            $isHadir = in_array($tgl, $absenPegawai);

                            // izin siang
                            $shiftKey = 'siang';
                            $izinData = $izinPegawai[$item->nama_pegawai][$tgl] ?? null;
                            $izinSiang = ($izinData !== null && isset($izinData[$shiftKey]) && $izinData[$shiftKey] == 1) ? $izinData['ket'] : null;

                            /*
                            |----------------------------------------------------------
                            | LIBUR
                            |----------------------------------------------------------
                            */
                            $isLibur = false;
                            foreach ($liburByDateShift[$tgl] ?? [] as $liburItem) {
                                if (
                                    $liburItem['ruang'] === 'Semua Ruang' ||
                                    (
                                        $liburItem['ruang'] === $item->ruang &&
                                        $liburItem['shift_name'] === 'SIANG'
                                    )
                                ) {
                                    $isLibur = true;
                                    break;
                                }
                            }

                            // inisialisasi warna cell
                            $cellStyle = '';

                            /*
                            |----------------------------------------------------------
                            | WARNA CELL
                            |----------------------------------------------------------
                            */
                            if ($isLibur) {
                                // LIBUR → KUNING
                                $cellStyle = 'background: #ffff00;';
                            }
                            else if (! $jadwalHari || $jadwalHari->siang == 0) {
                                // tidak punya shift
                                $cellStyle = 'background: #ffff00;';
                            }
                            else if ($izinSiang) {
                                // izin
                                if ($izinSiang == 'T')      $cellStyle = 'background: #00FFFF;';
                                else if ($izinSiang == 'S') $cellStyle = 'background: #9ACD32;';
                                else if ($izinSiang == 'I') $cellStyle = 'background: #81b2da;';
                                else                        $cellStyle = 'background: lightblue;';
                            }
                            else if (! $isHadir && $isActiveShift) {
                                // alpa
                                $cellStyle = 'background: #FF8C00;';
                            }

                            /*
                            |----------------------------------------------------------
                            | HITUNG TOTAL (TIDAK SAAT LIBUR)
                            |----------------------------------------------------------
                            */
                            if ($isActiveShift && ! $isLibur) {
                                $hariAktif++;
                                if ($isHadir) {
                                    $totalH++;
                                } else if ($izinSiang) {
                                    if ($izinSiang == 'I')      $totalI++;
                                    else if ($izinSiang == 'T') $totalT++;
                                    else if ($izinSiang == 'S') $totalS++;
                                } else {
                                    $totalA++;
                                }
                            }
                        @endphp

                        <td style="text-align:center; {{ $cellStyle }}">
                            @if ($isLibur)
                                {{-- LIBUR → sengaja kosong --}}
                            @elseif ($isHadir)
                                H
                            @elseif ($izinSiang)
                                {{ $izinSiang }}
                            @elseif ($isActiveShift)
                                A
                            @endif
                        </td>
                    @endforeach
                    @php
                        $persen = $hariAktif > 0 ? round(($totalH / $hariAktif) * 100) : 0;
                    @endphp
                    <td class="totalH">{{ $totalH }}</td>
                    <td class="totalI">{{ $totalI }}</td>
                    <td class="totalT">{{ $totalT }}</td>
                    <td class="totalS">{{ $totalS }}</td>
                    <td class="totalA">{{ $totalA }}</td>
                    <td class="total">{{ $persen }}%</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>

        {{ !! renderLiburTable($libur, $bulan, $tahun) }}


        {{--  absen malam  --}}
        <div class="page-break">
            <h2>REKAPITULASI DAFTAR HADIR UMANA <br>
                PERPUSTAKAAN IBRAHIMY <br>
                TAHUN {{ $tahun }}
            </h2>
        </div>

        <table class="bulan">
            <tr>
                <td class="nama-bulan">Bulan {{ $namaBulan }}</td>
                <td class="nama-shift">Shift Malam</td>
            </tr>
        </table>

        @php
            $bulan = request('bulan');
            $tahun = request('tahun');

            // Set tanggal awal & akhir bulan berdasarkan pilihan user
            $startDate = Carbon::create($tahun, $bulan, 1)->startOfMonth()->toDateString();
            $endDate   = Carbon::create($tahun, $bulan, 1)->endOfMonth()->toDateString();

            $period = new DatePeriod(
                new DateTime($startDate),
                new DateInterval('P1D'),
                (new DateTime($endDate))->modify('+1 day')
            );

            $dates = [];
            foreach ($period as $d) {
                $dates[] = $d->format('Y-m-d');
            }
        @endphp

        <table class="daftar">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2" style="width: 135px; text-align: center;">Nama</th>
                    <th colspan="{{ count($dates) }}">Tanggal</th>
                    <th colspan="6">Total</th>
                </tr>
                <tr>
                    @foreach ($dates as $tgl)
                        <th class="tanggal">{{ \Carbon\Carbon::parse($tgl)->format('d') }}</th>
                    @endforeach
                    <th>H</th>
                    <th>I</th>
                    <th>T</th>
                    <th>S</th>
                    <th>A</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody class="rekap">
            @foreach ($pegawaiMalam as $item)
                @php
                    $absenPegawai = collect($absensi['Malam'][$item->nama_pegawai] ?? [])
                        ->pluck('tanggal')
                        ->toArray();

                    $totalH = 0;
                    $totalI = 0;
                    $totalT = 0;
                    $totalS = 0;
                    $totalA = 0;
                    $hariAktif = 0;
                @endphp
                <tr>
                    <td class="tengah">{{ $loop->iteration }}</td>
                    <td class="pegawai">{{ $item->nama_pegawai }}</td>
                    @foreach ($dates as $tgl)
                        @php
                            $hari = \Carbon\Carbon::parse($tgl)->translatedFormat('l');
                            $jadwalHari = $jadwalGroup[$item->id]->firstWhere('hari', $hari) ?? null;

                            // shift SIANG aktif
                            $isActiveShift = $jadwalHari && ($jadwalHari->malam == 1);

                            // status hadir
                            $isHadir = in_array($tgl, $absenPegawai);

                            // izin siang
                            $shiftKey = 'malam';
                            $izinData = $izinPegawai[$item->nama_pegawai][$tgl] ?? null;
                            $izinMalam = ($izinData !== null && isset($izinData[$shiftKey]) && $izinData[$shiftKey] == 1) ? $izinData['ket'] : null;

                            /*
                            |----------------------------------------------------------
                            | LIBUR
                            |----------------------------------------------------------
                            */
                            $isLibur = false;
                            foreach ($liburByDateShift[$tgl] ?? [] as $liburItem) {
                                if (
                                    $liburItem['ruang'] === 'Semua Ruang' ||
                                    (
                                        $liburItem['ruang'] === $item->ruang &&
                                        $liburItem['shift_name'] === 'MALAM'
                                    )
                                ) {
                                    $isLibur = true;
                                    break;
                                }
                            }

                            // inisialisasi warna cell
                            $cellStyle = '';

                            /*
                            |----------------------------------------------------------
                            | WARNA CELL
                            |----------------------------------------------------------
                            */
                            if ($isLibur) {
                                // LIBUR → KUNING
                                $cellStyle = 'background: #ffff00;';
                            }
                            else if (! $jadwalHari || $jadwalHari->malam == 0) {
                                // tidak punya shift
                                $cellStyle = 'background: #ffff00;';
                            }
                            else if ($izinMalam) {
                                // izin
                                if ($izinMalam == 'T')      $cellStyle = 'background: #00FFFF;';
                                else if ($izinMalam == 'S') $cellStyle = 'background: #9ACD32;';
                                else if ($izinMalam == 'I') $cellStyle = 'background: #81b2da;';
                                else                        $cellStyle = 'background: lightblue;';
                            }
                            else if (! $isHadir && $isActiveShift) {
                                // alpa
                                $cellStyle = 'background: #FF8C00;';
                            }

                            /*
                            |----------------------------------------------------------
                            | HITUNG TOTAL (TIDAK SAAT LIBUR)
                            |----------------------------------------------------------
                            */
                            if ($isActiveShift && ! $isLibur) {
                                $hariAktif++;

                                if ($isHadir) {
                                    $totalH++;
                                } else if ($izinMalam) {
                                    if ($izinMalam == 'I')      $totalI++;
                                    else if ($izinMalam == 'T') $totalT++;
                                    else if ($izinMalam == 'S') $totalS++;
                                } else {
                                    $totalA++;
                                }
                            }
                        @endphp

                        <td style="text-align:center; {{ $cellStyle }}">
                            @if ($isLibur)
                                {{-- LIBUR → sengaja kosong --}}
                            @elseif ($isHadir)
                                H
                            @elseif ($izinMalam)
                                {{ $izinMalam }}
                            @elseif ($isActiveShift)
                                A
                            @endif
                        </td>
                    @endforeach
                    @php
                        $persen = $hariAktif > 0 ? round(($totalH / $hariAktif) * 100) : 0;
                    @endphp
                    <td class="totalH">{{ $totalH }}</td>
                    <td class="totalI">{{ $totalI }}</td>
                    <td class="totalT">{{ $totalT }}</td>
                    <td class="totalS">{{ $totalS }}</td>
                    <td class="totalA">{{ $totalA }}</td>
                    <td class="total">{{ $persen }}%</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>

        {{ !! renderLiburTable($libur, $bulan, $tahun) }}
    </body>
</html>

@php
    function renderLiburTable($libur, $bulan, $tahun) {

        $libur = $libur->filter(function ($item) use ($bulan, $tahun) {
            $tgl = \Carbon\Carbon::parse($item->tanggal);
            return $tgl->month == $bulan && $tgl->year == $tahun;
        });

        $libur = $libur->sortBy('tanggal');

        echo '
        <table class="keterangan" style="border: none; border-collapse: collapse;">
            <tr style="border: none;">
                <td style="vertical-align: top; padding-left: 40px; border: none;">
                    <table class="libur" style="border-collapse: collapse; width: 100%;">
                        <tr class="header-row">
                            <th style="width: 80px; padding: 3px 5px; text-align: left; font-size: 14px;">tanggal</th>
                            <th style="width: 150px; padding: 3px 5px; text-align: left; font-size: 14px;">ruang</th>
                            <th style="padding: 3px 5px; text-align: left; font-size: 14px;">acara</th>
                        </tr>';

                        if ($libur->isEmpty()) {
                            echo '
                            <tr>
                                <td colspan="3" style="padding: 5px; font-size: 14px; text-align: center;">
                                    Tidak ada libur bulan ini
                                </td>
                            </tr>';
                        }

                        foreach ($libur as $item) {
                            echo '
                            <tr>
                                <td style="padding: 3px 5px; font-size: 14px; text-align: left;">'.\Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMM').'</td>
                                <td style="padding: 3px 5px; font-size: 14px; text-align: left;">'.$item->ruang.'</td>
                                <td style="padding: 3px 5px; font-size: 14px; text-align: left;">'.$item->acara.'</td>
                            </tr>';
                        }
        echo '</table>
                </td>
            </tr>
        </table>';
    }
@endphp
