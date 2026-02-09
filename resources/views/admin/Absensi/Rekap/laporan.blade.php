<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Absensi Perpustakaan Ibrahimy</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            font-size: 20px;
        }

        p.tanggal-cetak {
            text-align: left;
            font-size: 12px;
        }

        p.rekap.nama-bulan {
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .page-break {
            page-break-before: always;
        }

        td.nama-cell {
            text-align: left;
            white-space: nowrap;
            width: 135px;
        }

        td.konsumsi {
            text-align: center;
        }

        table.ttd {
            font-size: 14px;
        }
    </style>
</head>

    {{-- Rekap Barokah Konsumsi --}}
    <body>
    <h2>Rekapitulasi Konsumsi Penjagaan <br>Perpustakaan Pusat dan Viar Perpustakaan Keliling<br> Perpustakaan Ibrahimy Tahun {{ $tahun }}</h2>
    <p class="nama-bulan">Bulan : {{ $namaBulan }}</p>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th rowspan="2" style="width: 3%;">No</th>
                <th rowspan="2">Nama</th>
                <th colspan="3">Kehadiran</th>
                <th rowspan="2">Persentase</th>
                <th rowspan="2">Jumlah</th>
                <th rowspan="2" colspan="2" style="width: 20%;">Tanda Tangan</th>
            </tr>
            <tr>
                <th>Siang</th>
                <th>Malam</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalBarokah = 0;
                $totalHari = count($listTanggal) * 2;
                $totalHadirSiang = 0;
                $totalHadirMalam = 0;
                $totalJumlahHadir = 0;
            @endphp

            @foreach ($khidmah as $index => $khidmah)
                @if ($khidmah->status != 0)
                    @php
                        $tanggal = \Carbon\Carbon::parse($tanggalAwal);
                        $periode = \Carbon\CarbonPeriod::create(
                            $tanggal->copy()->startOfMonth(),
                            $tanggal->copy()->endOfMonth()
                        );

                        $jumlahKamis = 0;
                        $jumlahJumat = 0;

                        $nik = $khidmah->nik;
                        $absenSiangByNik = $absenSiang[$nik] ?? collect();
                        $absenMalamByNik = $absenMalam[$nik] ?? collect();

                        $hadirSiang = $absenSiangByNik->where('keterangan', 'Hadir')->count();
                        $hadirMalam = $absenMalamByNik->where('keterangan', 'Hadir')->count();
                        $jumlahHadir = $hadirSiang + $hadirMalam;

                        $totalHadirSiang += $hadirSiang;
                        $totalHadirMalam += $hadirMalam;
                        $totalJumlahHadir += $jumlahHadir;

                        $izin = ($izinData[$nik] ?? collect())->filter(function ($item) {
                            return strtolower(trim($item->keterangan)) !== 'Libur';
                        });



                        $izinCollection = $izinData[$nik] ?? collect();

                        // Hitung libur
                        $L = $izinCollection->filter(function ($item) {
                            return strtolower(trim($item->keterangan)) === 'libur';
                        })->count();
                        // Hitung sakit
                        $S = $izinCollection->filter(function ($item) {
                            return strtolower(trim($item->keterangan)) === 'sakit';
                        })->count();
                        // Hitung tugas
                        $T = $izinCollection->filter(function ($item) {
                            return strtolower(trim($item->keterangan)) === 'tugas';
                        })->count();


                        // Hitung jumlah Kamis dan Jumat
                        foreach ($periode as $tgl) {
                            $hari = $tgl->format('l');
                            if ($hari === 'Thursday') {
                                $jumlahKamis++;
                            } elseif ($hari === 'Friday') {
                                $jumlahJumat++;
                            }
                        }

                        // Total hari libur dihitung dari Kamis & Jumat (asumsinya ini memang hari libur rutin)
                        $libur = $jumlahKamis + $jumlahJumat;
                        $L2 = $L+$S+$T  ;

                        // Total hari kerja efektif (dari $totalHari) dikurangi libur mingguan
                        $hariEfektif = $totalHari - ($libur + $L2);

                        // Hitung persentase hadir hanya terhadap hari efektif
                        $persentase = $hariEfektif > 0 ? round(($jumlahHadir / $hariEfektif) * 100, 2) : 0;

                        $barokahPokok = $barokah->barokah ?? 0;
                        $jumlahBarokah = $barokahPokok * $jumlahHadir;
                        $totalBarokah += $jumlahBarokah;
                    @endphp
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td style="width: 25%">{{ $khidmah->nama }}</td>
                        <td>{{ $hadirSiang }}</td>
                        <td>{{ $hadirMalam }}</td>
                        <td>{{ $jumlahHadir }}</td>
                        <td>{{ $persentase }}%</td>
                        <td>Rp. {{ number_format($jumlahBarokah, 0, ',', '.') }}</td>

                        @if ($loop->iteration % 2 == 1)
                            <td style="border: none; text-align: center; width: 10%;">
                                <span style="font-size: 12px;">{{ $loop->iteration }} ....................</span>
                            </td>
                            <td style="border: none; border-right: 1px solid black; width: 10%;"></td>
                        @else
                            <td style="border: none; width: 10%;"></td>
                            <td style="border: none; text-align: center; border-right: 1px solid black; width: 10%;">
                                <span style="font-size: 12px;">{{ $loop->iteration }} ....................</span>
                            </td>
                        @endif
                    </tr>
                @endif
            @endforeach
            <tr style="font-weight: bold; background-color: paleturquoise;">
                <td colspan="2" style="text-align: center;">Total Kehadiran</td>
                <td>{{ $totalHadirSiang }}</td>
                <td>{{ $totalHadirMalam }}</td>
                <td>{{ $totalJumlahHadir }}</td>
                <td>Total</td>
                <td class="konsumsi">Rp. {{ number_format($totalBarokah, 0, ',', '.') }}</td>
                <td colspan="2" style="border: none; border-right: 1px solid black; border-bottom: 1px solid black; background-color: white;"></td>
            </tr>
        </tbody>
    </table>

    <!-- URL -->
    <div style="position: fixed; bottom: 10px; left: 20px; font-size: 8pt;">
        <b>Download: {{ $tanggal }},</b>
        <b>URL:</b> {{ url()->current() }}
    </div>

    <!-- QR Code -->
    <div style="position: fixed; bottom: 50px; right: 20px;">
        <div style="width: 60px; height: 30px;">
            {!! DNS2D::getBarcodeHTML(request()->fullUrl(), 'QRCODE', 3, 3) !!}
        </div>
    </div>

    {{-- Rekap Siang --}}
    <div class="page-break">
        <h2>Rekapitulasi Daftar Hadir Khidmah <br>Perpustakaan Ibrahimy <br>Tahun {{ $tahun }}</h2>

        <p class="rekap">Shift Siang, bulan {{ $namaBulan }}</p>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2" style="width: 135px; text-align: center;">Nama</th>
                    <th colspan="{{ count($listTanggal) }}">Tanggal</th>
                    <th colspan="5">Total</th>
                </tr>
                <tr>
                    @foreach ($listTanggal as $tgl)
                        <th>{{ $tgl->format('d') }}</th>
                    @endforeach
                    <th>H</th>
                    <th>I</th>
                    <th>T</th>
                    <th>S</th>
                    <th>A</th>
                </tr>
            </thead>
            <tbody>
                @php $rowNumber = 1; @endphp
                @foreach ($khidmahNamaSiang as $khidmah)
                    @if ($khidmah->status != 0)
                        @php
                            $shiftMap = ['pagi' => 1, 'siang' => 2, 'malam' => 3];
                            $shiftId = $shiftMap['siang'];
                            $idShift = 2;

                            $punyaShiftIni = $semuaShift->contains(function ($item) use ($khidmah, $shiftId) {
                                return $item->khidmah_id == $khidmah->id && $item->shift_id == $shiftId;
                            });
                        @endphp

                        @if($punyaShiftIni)
                            @php
                                $nik = $khidmah->nik;
                                $absen = $absenSiang[$nik] ?? collect();
                                $izin = $izinData[$nik] ?? collect();

                                $totalH = 0;
                                $totalI = 0;
                                $totalT = 0;
                                $totalS = 0;
                                $totalL = 0;
                                $totalA = 0;
                            @endphp
                            <tr>
                                <td>{{ $rowNumber++ }}</td>
                                <td>{{ $khidmah->nama }}</td>
                                @foreach ($listTanggal as $tgl)
                                    @php
                                        $hari = $tgl->format('l');
                                        $tanggalStr = $tgl->toDateString();

                                        $isHoliday = collect($listHoliday)->contains(fn($item) => $item->tanggal_libur === $tanggalStr && $item->shift_id == $shiftId);
                                        $isJumatLibur = $hari === 'Friday';

                                        $shiftPadaTanggal = $absen->first(fn($item) => $item->tanggal === $tanggalStr);
                                        $hadir = $shiftPadaTanggal && $shiftPadaTanggal->keterangan === 'Hadir';

                                        $izinDiTanggal = $izin->first(fn($item) => $tgl->between($item->tanggal_mulai, $item->tanggal_selesai) && $item->shift_id == $shiftId);

                                        $status = '';
                                        $color = '';

                                        if ($isJumatLibur || !$punyaShiftIni) {
                                            $status = '';
                                            $color = '#FFFF00'; // kuning
                                        } elseif ($isHoliday) {
                                            $status = 'L';
                                            $color = '#FF0000'; // merah
                                        } elseif ($izinDiTanggal) {
                                            $keterangan = strtolower(trim($izinDiTanggal->keterangan));
                                            if ($keterangan === 'libur') {
                                                $status = '';
                                                $color = '#FFFF00'; // kuning
                                                // tidak dihitung ke total apapun
                                            } elseif ($keterangan === 'tugas pesantren') {
                                                $status = 'T';
                                                $color = '#34ebb7';
                                                $totalT++;
                                            } elseif ($keterangan === 'sakit') {
                                                $status = 'S';
                                                $color = '#70AD47';
                                                $totalS++;
                                            } elseif ($keterangan === 'izin') {
                                                $status = 'I';
                                                $color = '#5B9BD5';
                                                $totalI++;
                                            }
                                        } elseif ($hadir) {
                                            $status = 'H';
                                            $color = '#ffffff';
                                            $totalH++;
                                        } else {
                                            $status = 'A';
                                            $color = '#ED7D31';
                                            $totalA++;
                                        }
                                    @endphp

                                    <td style="text-align: center; color: black; background-color: {{ $color }};">
                                        {{ $status }}
                                    </td>
                                @endforeach
                                <td style="text-align: center;">{{ $totalH }}</td>
                                <td style="text-align: center;">{{ $totalI }}</td>
                                <td style="text-align: center;">{{ $totalT }}</td>
                                <td style="text-align: center;">{{ $totalS }}</td>
                                <td style="text-align: center;">{{ $totalA }}</td>
                            </tr>
                        @endif
                    @endif
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- Rekap Malam --}}
    <div class="page-break">
        <h2>Rekapitulasi Daftar Hadir Khidmah <br>Perpustakaan Ibrahimy <br>Tahun {{ $tahun }}</h2>

        <p class="rekap">Shift Malam, bulan {{ $namaBulan }}</p>

        <table>
            <thead>
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2" style="width: 135px; text-align: center;">Nama</th>
                    <th colspan="{{ count($listTanggal) }}">Tanggal</th>
                    <th colspan="5">Total</th>
                </tr>
                <tr>
                    @foreach ($listTanggal as $tgl)
                        <th>{{ $tgl->format('d') }}</th>
                    @endforeach
                    <th>H</th>
                    <th>I</th>
                    <th>T</th>
                    <th>S</th>
                    <th>A</th>
                </tr>
            </thead>
            <tbody>
                @php $rowNumber = 1; @endphp
                @foreach ($khidmahNamaMalam as $khidmah)
                    @if ($khidmah->status != 0)
                        @php
                            $shiftMap = ['pagi' => 1, 'siang' => 2, 'malam' => 3];
                            $shiftId = $shiftMap['malam'];
                            $idShift = 3;

                            $punyaShiftIni = $semuaShift->contains(function ($item) use ($khidmah, $shiftId) {
                                return $item->khidmah_id == $khidmah->id && $item->shift_id == $shiftId;
                            });
                        @endphp

                        @if($punyaShiftIni)
                            @php
                                $nik = $khidmah->nik;
                                $absen = $absenMalam[$nik] ?? collect();
                                $izin = $izinData[$nik] ?? collect();

                                $totalH = 0;
                                $totalI = 0;
                                $totalT = 0;
                                $totalS = 0;
                                $totalA = 0;
                            @endphp
                            <tr>
                                <td>{{ $rowNumber++ }}</td>
                                <td>{{ $khidmah->nama }}</td>
                                @foreach ($listTanggal as $tgl)
                                    @php
                                        $hari = $tgl->format('l');
                                        $tanggalStr = $tgl->toDateString();

                                        $isHoliday = collect($listHoliday)->contains(fn($item) => $item->tanggal_libur === $tanggalStr && $item->shift_id == $shiftId);
                                        $isJumatLibur = $hari === 'Thursday';

                                        $shiftPadaTanggal = $absen->first(fn($item) => $item->tanggal === $tanggalStr);
                                        $hadir = $shiftPadaTanggal && $shiftPadaTanggal->keterangan === 'Hadir';

                                        $izinDiTanggal = $izin->first(fn($item) => $tgl->between($item->tanggal_mulai, $item->tanggal_selesai) && $item->shift_id == $shiftId);

                                        $status = '';
                                        $color = '';

                                        if ($isJumatLibur || !$punyaShiftIni) {
                                            $status = '';
                                            $color = '#FFFF00'; // kuning
                                        } elseif ($isHoliday) {
                                            $status = 'L';
                                            $color = '#FF0000'; // merah
                                        } elseif ($hadir) {
                                            $status = 'H';
                                            $color = '#ffffff';
                                            $totalH++;
                                        } elseif ($izinDiTanggal) {
                                            $keterangan = strtolower(trim($izinDiTanggal->keterangan));
                                            if ($keterangan === 'tugas pesantren') {
                                                $status = 'T';
                                                $color = '#34ebb7';
                                                $totalT++;
                                            } elseif ($keterangan === 'sakit') {
                                                $status = 'S';
                                                $color = '#70AD47';
                                                $totalS++;
                                            } elseif ($keterangan === 'izin') {
                                                $status = 'I';
                                                $color = '#5B9BD5';
                                                $totalI++;
                                            }
                                        } else {
                                            $status = 'A';
                                            $color = '#ED7D31';
                                            $totalA++;
                                        }
                                    @endphp
                                    <td style="text-align: center; color: black; background-color: {{ $color }};">
                                        {{ $status }}
                                    </td>
                                @endforeach
                                <td style="text-align: center;">{{ $totalH }}</td>
                                <td style="text-align: center;">{{ $totalI }}</td>
                                <td style="text-align: center;">{{ $totalT }}</td>
                                <td style="text-align: center;">{{ $totalS }}</td>
                                <td style="text-align: center;">{{ $totalA }}</td>
                            </tr>
                        @endif
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

</html>
