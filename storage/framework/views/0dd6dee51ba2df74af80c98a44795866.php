<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Kehadiran Bulan <?php echo e($namaBulan); ?> <?php echo e($tahun); ?></title>
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
    
    <body>
        <h2>BAROKAH UMANA <br>PERPPUSTAKAAN IBRAHIMY <br>TAHUN <?php echo e($tahun); ?></h2>
        <p class="nama-bulan">Bulan : <?php echo e($namaBulan); ?></p>

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
                <?php
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
                ?>

                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
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
                    $totalL = 0;

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
                            if ($l['ruang_id'] === 'Semua Ruang') {
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
                        $izinShift = $izinPegawai[$p->nama_pegawai][$tanggal][$shift]['ket'] ?? null;
                
                        if ($hadir) {
                            continue; // hadir = tidak dihitung ISTA
                        }
                
                        if ($izinShift) {
                            if ($izinShift === 'I') $totalI++;
                            elseif ($izinShift === 'S') $totalS++;
                            elseif ($izinShift === 'T') $totalT++;
                            elseif ($izinShift === 'L') $totalL++;
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

                    $mp = ($periode - Carbon::parse($p->tmt)->year)+1;
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
                ?>
                <tr>
                    <td class="tengah"><?php echo e($index+1); ?></td>
                    <td class="kiri"><?php echo e($p->nama_pegawai); ?></td>
                    <td class="kiri"><?php echo e($p->jabatan->nama_jabatan); ?></td>
                    <td class="tengah"><?php echo e(Carbon::parse($p->tmt)->isoFormat('Y')); ?></td>
                    <td class="tengah"><?php echo e($mp); ?></td>
                    

                    <td><?php echo e(number_format($barokahJabatanFinal ?? 0, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($TMT2 ?? 0, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($totalKehadiran ?? 0, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($p->t_tunkel ?? 0, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($p->t_anak ?? 0, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($p->t_barokah_dosen ?? 0, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($kehormatan ?? 0, 0, ',', '.')); ?> </td>

                    <td><?php echo e(number_format($jumlahSeluruhnya ?? 0, 0, ',', '.')); ?></td>
                    <td class="keterangan"><?php echo e($jumlahHadir); ?></td>
                    <td class="keterangan"><?php echo e($totalI); ?></td>
                    <td class="keterangan"><?php echo e($totalT); ?></td>
                    <td class="keterangan"><?php echo e($totalS); ?></td>
                    <td class="keterangan"><?php echo e($totalA); ?></td>
                    <td class="keterangan"><?php echo e($persentase); ?>%

                    </td>
                </tr>
                <?php
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
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- BARIS TOTAL -->
                <tr style="background:#eef1f7; font-weight:bold;">
                    <td style="border:1px solid #000; text-align: center;" colspan="5">Jumlah</td>

                    <td><?php echo e(number_format($totalBarokahJabatan, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($t_pengabdian, 0, ',','.')); ?></td>
                    <td><?php echo e(number_format($totalSemuaKehadiran, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($pegawai->sum('t_tunkel'), 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($pegawai->sum('t_anak'), 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($pegawai->sum('t_barokah_dosen'), 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($t_kehormatan, 0, ',', '.')); ?></td>

                    <td><?php echo e(number_format($totalJumlahSemua, 0, ',', '.')); ?></td>
                    <td style="border:1px solid #000; text-align: center;" colspan="6">TOTAL <?php echo e(number_format($totalJumlahSemua, 0, ',', '.')); ?></td>
                </tr>
            </tbody>
        </table>

  
        <div style="position: fixed; bottom: 10px; left: 20px; font-size: 8pt;">
            <b>Download: <?php echo e(\Carbon\Carbon::parse($periode)->isoFormat('MMMM YYYY')); ?>,</b>
            <b>URL:</b> <?php echo e(url()->current()); ?>

        </div>

        <div style="position: fixed; bottom: 50px; right: 20px;">
            <div style="width: 60px; height: 30px;">
                <?php echo DNS2D::getBarcodeHTML(request()->fullUrl(), 'QRCODE', 3, 3); ?>

            </div>
        </div>

        
        <div class="page-break">
            <h2>REKAPITULASI DAFTAR HADIR UMANA <br>
                PERPUSTAKAAN IBRAHIMY <br>
                TAHUN <?php echo e($tahun); ?>

            </h2>
        </div>

        <table class="bulan">
            <tr>
                <td class="nama-bulan">Bulan <?php echo e($namaBulan); ?></td>
                <td class="nama-shift">Shift Pagi</td>
            </tr>
        </table>

        <?php
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
        ?>

        <table class="daftar">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2" style="width: 135px; text-align: center;">Nama</th>
                    <th colspan="<?php echo e(count($dates)); ?>">Tanggal</th>
                    <th colspan="6">Total</th>
                </tr>
                <tr>
                    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th class="tanggal"><?php echo e(\Carbon\Carbon::parse($tgl)->format('d')); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th>H</th>
                    <th>I</th>
                    <th>T</th>
                    <th>S</th>
                    <th>A</th>
                    <th>%</th>
                </tr>
            </thead>
       <tbody class="rekap">
        <?php $__currentLoopData = $pegawaiPagi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
            $absenPegawai = collect($absensi['Pagi'][$item->nama_pegawai] ?? [])
                ->pluck('tanggal')
                ->toArray();

            $totalH = $totalI = $totalT = $totalS = $totalA = 0;
            $hariAktif = 0;
        ?>

        <tr>
        <td class="tengah"><?php echo e($loop->iteration); ?></td>
        <td class="pegawai"><?php echo e($item->nama_pegawai); ?></td>

        <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $hari = \Carbon\Carbon::parse($tgl)->translatedFormat('l');
            $jadwalHari = $jadwalGroup[$item->id]->firstWhere('hari', $hari);

            $isActiveShift = $jadwalHari && $jadwalHari->pagi == 1;
            $isHadir = in_array($tgl, $absenPegawai);
            $izin = $izinPegawai[$item->nama_pegawai][$tgl]['pagi']['ket'] ?? null;

            // ===== CEK LIBUR GLOBAL =====
            $isLibur = false;
            foreach ($liburByDateShift[$tgl] ?? [] as $liburItem) {
                if (
                    $liburItem['ruang_id'] === 'Semua Ruang' ||
                    ($liburItem['ruang_id'] === $item->ruang_id && $liburItem['shift_name'] === 'PAGI')
                ) {
                    $isLibur = true;
                    break;
                }
            }

            $cellStyle = '';

            // ===== WARNA =====
            if ($isLibur || ! $isActiveShift) {
                $cellStyle = 'background:#ffff00;';
            }
            elseif ($izin) {
                $cellStyle = match($izin) {
                    'T' => 'background:#00FFFF;',
                    'S' => 'background:#9ACD32;',
                    'I' => 'background:#81b2da;',
                    'L' => 'background:#ffff00;',
                    default => ''
                };
            }
            elseif (! $isHadir) {
                $cellStyle = 'background:#FF8C00;';
            }

            // ===== HITUNG TOTAL =====
            if ($isActiveShift && ! $isLibur) {

                // jika L → tidak dihitung hari aktif
                if ($izin === 'L') {
                    // skip hari aktif
                } else {

                    $hariAktif++;

                    if ($isHadir) {
                        $totalH++;
                    }
                    elseif ($izin === 'I') {
                        $totalI++;
                    }
                    elseif ($izin === 'T') {
                        $totalT++;
                    }
                    elseif ($izin === 'S') {
                        $totalS++;
                    }
                    else {
                        $totalA++;
                    }
                }
            }
        ?>

        <td style="text-align:center; <?php echo e($cellStyle); ?>">
        <?php if($isLibur): ?>
            
        <?php elseif($isHadir): ?>
            H
        <?php elseif($izin): ?>
        <?php if($izin != "L"): ?>
            <?php echo e($izin); ?>

        <?php endif; ?>

        <?php elseif($isActiveShift): ?>
            A
        <?php endif; ?>
        </td>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php
            $persen = $hariAktif > 0 ? round(($totalH / $hariAktif) * 100) : 0;
        ?>

        <td class="totalH"><?php echo e($totalH); ?></td>
        <td class="totalI"><?php echo e($totalI); ?></td>
        <td class="totalT"><?php echo e($totalT); ?></td>
        <td class="totalS"><?php echo e($totalS); ?></td>
        <td class="totalA"><?php echo e($totalA); ?></td>
        <td class="total"><?php echo e($persen); ?>%</td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
        <br>

        <?php echo renderLiburTable($libur, $liburByDateShift, $bulan, $tahun, 'PAGI'); ?>



        
        <div class="page-break">
            <h2>REKAPITULASI DAFTAR HADIR UMANA <br>
                PERPUSTAKAAN IBRAHIMY <br>
                TAHUN <?php echo e($tahun); ?>

            </h2>
        </div>

        <table class="bulan">
            <tr>
                <td class="nama-bulan">Bulan <?php echo e($namaBulan); ?></td>
                <td class="nama-shift">Shift Siang</td>
            </tr>
        </table>

        <table class="daftar">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2" style="width: 135px; text-align: center;">Nama</th>
                    <th colspan="<?php echo e(count($dates)); ?>">Tanggal</th>
                    <th colspan="6">Total</th>
                </tr>
                <tr>
                    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th class="tanggal"><?php echo e(\Carbon\Carbon::parse($tgl)->format('d')); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th>H</th>
                    <th>I</th>
                    <th>T</th>
                    <th>S</th>
                    <th>A</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody class="rekap">
            <?php $__currentLoopData = $pegawaiSiang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $absenPegawai = collect($absensi['Siang'][$item->nama_pegawai] ?? [])
                        ->pluck('tanggal')
                        ->toArray();

                    $totalH = 0;
                    $totalI = 0;
                    $totalT = 0;
                    $totalL = 0;
                    $totalS = 0;
                    $totalA = 0;
                    $hariAktif = 0;
                    $totalTidakMasuk = 0;
                ?>
                <tr>
                    <td class="tengah"><?php echo e($loop->iteration); ?></td>
                    <td class="pegawai"><?php echo e($item->nama_pegawai); ?></td>
                    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            
                            $hari = \Carbon\Carbon::parse($tgl)->translatedFormat('l');
                            $jadwalHari = $jadwalGroup[$item->id]->firstWhere('hari', $hari) ?? null;

                            // shift SIANG aktif
                            $isActiveShift = $jadwalHari && ($jadwalHari->siang == 1);

                            // status hadir
                            $isHadir = in_array($tgl, $absenPegawai);

                            // izin siang
                            $shiftKey = 'siang';
                            $izinData = $izinPegawai[$item->nama_pegawai][$tgl] ?? null;
                            $izinSiang = $izinPegawai[$item->nama_pegawai][$tgl]['siang']['ket'] ?? null;

                            /*
                            |----------------------------------------------------------
                            | LIBUR
                            |----------------------------------------------------------
                            */
                            $isLibur = false;
                            foreach ($liburByDateShift[$tgl] ?? [] as $liburItem) {
                                if (
                                    $liburItem['ruang_id'] === 'Semua Ruang' ||
                                    (
                                        $liburItem['ruang_id'] === $item->ruang_id &&
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
                                else if ($izinSiang == 'L') $cellStyle = 'background: #ffff00;';
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
                                }
                                else if ($izinSiang) {
                                    if ($izinSiang == 'I') {
                                        $totalI++;
                                        $totalTidakMasuk += 0.5;
                                    }
                                    else if ($izinSiang == 'S') {
                                        $totalS++;
                                        $totalTidakMasuk += 0.5;
                                    }
                                    else if ($izinSiang == 'T') {
                                        $totalT++;
                                        // TIDAK dihitung tidak masuk
                                    }
                                    else if ($izinSiang == 'L') {
                                        $totalL++;
                                        // TIDAK dihitung tidak masuk
                                    }
                                }
                                else {
                                    // ALPA
                                    $totalA++;
                                    $totalTidakMasuk += 1;
                                }
                            }
                            if ($hariAktif > 0) {
                                $persen = 
                                    (($hariAktif - $totalTidakMasuk) / $hariAktif) * 100;
                            }
                        ?>

                        <td style="text-align:center; <?php echo e($cellStyle); ?>">
                            <?php if($isLibur): ?>
                                
                            <?php elseif($isHadir): ?>
                                H
                            <?php elseif($izinSiang): ?>
                            <?php if($izinSiang != 'L'): ?>
                                <?php echo e($izinSiang); ?>

                                <?php endif; ?>
                            <?php elseif($isActiveShift): ?>
                                A

                            <?php endif; ?>
                            </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php
                       
                    ?>
                    <td class="totalH"><?php echo e($totalH); ?></td>
                    <td class="totalI"><?php echo e($totalI); ?></td>
                    <td class="totalT"><?php echo e($totalT); ?></td>
                    <td class="totalS"><?php echo e($totalS); ?></td>
                    <td class="totalA"><?php echo e($totalA); ?></td>
                    <td class="total"><?php echo e(round($persen)); ?>%</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br>

        <?php echo renderLiburTable($libur, $liburByDateShift, $bulan, $tahun, 'SIANG'); ?>



        
        <div class="page-break">
            <h2>REKAPITULASI DAFTAR HADIR UMANA <br>
                PERPUSTAKAAN IBRAHIMY <br>
                TAHUN <?php echo e($tahun); ?>

            </h2>
        </div>

        <table class="bulan">
            <tr>
                <td class="nama-bulan">Bulan <?php echo e($namaBulan); ?></td>
                <td class="nama-shift">Shift Malam</td>
            </tr>
        </table>

        <?php
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
        ?>

        <table class="daftar">
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2" style="width: 135px; text-align: center;">Nama</th>
                    <th colspan="<?php echo e(count($dates)); ?>">Tanggal</th>
                    <th colspan="6">Total</th>
                </tr>
                <tr>
                    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th class="tanggal"><?php echo e(\Carbon\Carbon::parse($tgl)->format('d')); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th>H</th>
                    <th>I</th>
                    <th>T</th>
                    <th>S</th>
                    <th>A</th>
                    <th>%</th>
                </tr>
            </thead>
            <tbody class="rekap">
            <?php $__currentLoopData = $pegawaiMalam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $absenPegawai = collect($absensi['Malam'][$item->nama_pegawai] ?? [])
                        ->pluck('tanggal')
                        ->toArray();

                    $totalH = 0;
                    $totalI = 0;
                    $totalT = 0;
                    $totalS = 0;
                    $totalA = 0;
                    $totalL = 0;
                    $hariAktif = 0;
                ?>
                <tr>
                    <td class="tengah"><?php echo e($loop->iteration); ?></td>
                    <td class="pegawai"><?php echo e($item->nama_pegawai); ?></td>
                    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $hari = \Carbon\Carbon::parse($tgl)->translatedFormat('l');
                            $jadwalHari = $jadwalGroup[$item->id]->firstWhere('hari', $hari) ?? null;

                            // shift SIANG aktif
                            $isActiveShift = $jadwalHari && ($jadwalHari->malam == 1);

                            // status hadir
                            $isHadir = in_array($tgl, $absenPegawai);

                            // izin malam
                            $shiftKey = 'malam';
                            $izinData = $izinPegawai[$item->nama_pegawai][$tgl] ?? null;
                           $izinMalam = $izinPegawai[$item->nama_pegawai][$tgl]['malam']['ket'] ?? null;
                         
                            
                            /*
                            |----------------------------------------------------------
                            | LIBUR
                            |----------------------------------------------------------
                            */
                            $isLibur = false;
                            foreach ($liburByDateShift[$tgl] ?? [] as $liburItem) {
                                if (
                                    $liburItem['ruang_id'] === 'Semua Ruang' ||
                                    (
                                        $liburItem['ruang_id'] === $item->ruang_id &&
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
                                 else if ($izinMalam == 'L') $cellStyle = 'background: #ffff00;';
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
                                    else if ($izinMalam == 'L') $totalL++;
                                } else {
                                    $totalA++;
                                }
                            }
                        ?>

                        <td style="text-align:center; <?php echo e($cellStyle); ?>">
                            <?php if($isLibur): ?>
                                
                            <?php elseif($isHadir): ?>
                                H
                            <?php elseif($izinMalam): ?>
                                <?php
                                    $izinMalam = $izinPegawai[$item->nama_pegawai][$tgl]['malam']['ket'] ?? null;
                                ?>

                                <?php if($izinMalam && $izinMalam != 'L'): ?>
                                    <?php echo e($izinMalam); ?>

                                <?php endif; ?>
                             
                            <?php elseif($isActiveShift): ?>
                                A
                            <?php endif; ?>
                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $hariAktif = $hariAktif-$totalL;
                        $persen = $hariAktif > 0 ? round(($totalH / $hariAktif) * 100) : 0;
                    ?>
                    <td class="totalH"><?php echo e($totalH); ?></td>
                    <td class="totalI"><?php echo e($totalI); ?></td>
                    <td class="totalT"><?php echo e($totalT); ?></td>
                    <td class="totalS"><?php echo e($totalS); ?></td>
                    <td class="totalA"><?php echo e($totalA); ?></td>
                    <td class="total"><?php echo e($persen); ?>%</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br>

        <?php echo renderLiburTable($libur, $liburByDateShift, $bulan, $tahun, 'MALAM'); ?>

    </body>
</html>

<?php
function renderLiburTable($libur, $liburByDateShift, $bulan, $tahun, $shiftName)
{
    echo '
    <table class="keterangan" style="border: none; border-collapse: collapse;">
        <tr style="border: none;">
            <td style="vertical-align: top; padding-left: 40px; border: none;">
                <table class="libur" style="border-collapse: collapse; width: 100%;">
                    <tr class="header-row">
                        <th style="width: 80px; padding: 3px 5px; text-align: left; font-size: 14px;">Tanggal</th>
                        <th style="width: 150px; padding: 3px 5px; text-align: left; font-size: 14px;">Ruang</th>
                        <th style="padding: 3px 5px; text-align: left; font-size: 14px;">Acara</th>
                    </tr>';

    $ada = false;

    foreach ($libur as $item) {

        $tanggal = \Carbon\Carbon::parse($item->tanggal);

        // Filter bulan & tahun
        if ($tanggal->month != $bulan || $tanggal->year != $tahun) {
            continue;
        }

        $tglKey = $tanggal->format('Y-m-d');

        // Cek apakah tanggal ini ada shift libur
        if (!isset($liburByDateShift[$tglKey])) {
            continue;
        }

        foreach ($liburByDateShift[$tglKey] as $shift) {

            if (strtoupper($shift['shift_name']) === strtoupper($shiftName)) {

                $ada = true;

                echo '
                <tr>
                    <td style="padding: 3px 5px; font-size: 14px; text-align: left;">
                        '.$tanggal->isoFormat('DD MMM').'
                    </td>
                    <td style="padding: 3px 5px; font-size: 14px; text-align: left;">
                        '.($item->ruang->ruang_pustakawans ?? '-').'
                    </td>
                    <td style="padding: 3px 5px; font-size: 14px; text-align: left;">
                        '.$item->libur.'
                    </td>
                </tr>';

                break; // supaya tidak dobel jika ada lebih dari 1 shift sama
            }
        }
    }

    if (!$ada) {
        echo '
        <tr>
            <td colspan="3" style="text-align: center; padding: 5px;">
                Tidak ada libur bulan ini
            </td>
        </tr>';
    }

    echo '
                </table>
            </td>
        </tr>
    </table>';
}
?>
<?php /**PATH /home/yogy/Dokumen/presensi/resources/views/admin/Kehadiran/rekapan/laporan.blade.php ENDPATH**/ ?>