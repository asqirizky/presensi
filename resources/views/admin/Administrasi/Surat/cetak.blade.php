<html>
    @php
        $bulanRomawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV',
            5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
            9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
        ];
        $tanggal = \Carbon\Carbon::parse($surat->created_at);
    @endphp
<head>
    <title>{{ $surat->namasurat }}_{{ '0828/'.str_pad($surat->id, 2, '0', STR_PAD_LEFT).'/' . \Illuminate\Support\Str::before($surat->kategori, '-') . '/' . Carbon\Carbon::parse($surat->created_at)->isoFormat('DD.MM.YY').'/071.095/'.$bulanRomawi[(int)$tanggal->format('m')].'/'.Carbon\Carbon::parse($surat->created_at)->isoFormat('Y') }}</title>
    <style>
        @page {
            margin: 0px;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            /* line-height: 1.6; */
        }
        .isi {
            max-width: 480px;
            margin: 0 auto;
        }
        .isisurat {
            max-width: 530px;
            margin: 0 auto;
            text-align: justify;
        }
        .centang {
            max-width: 550px;
            margin: 0 auto;
            text-align: justify;
        }
        .kop {
            max-width: 794px;
            margin: 10 auto;
            text-align: center;
        }

        .ttd {
            max-width: 794px;
            text-align: center;
        }


        .footer {
            margin-left: 25px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: left;
        }

        .footer img {
            width: 100%;
            height: auto;
        }

        .hal {
            max-width: 700px;
            margin: 0 auto;
        }

        .judul {
            font-weight: bold;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        td {
            /* padding: 2px 0; */
            vertical-align: top;
        }
        .label {
            width: 70px;
        }
        .jarak {
            width: 450px;
        }
        .kepala {
            font-weight: bold;
        }
        .colon {
            width: 10px;
        }
        .container {
            margin: 0 auto;
        }
        .checkbox {
            width: 20px;
        }
        em {
            font-style: italic;
        }
        .signature img {
            height: auto;
        }
        img {
            max-width: 749px;
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="kop">
        <img src="ibrahimy/header.png" alt="Kop Surat">
    </div>
    <div class="hal">
        <table>
            <tr>
                <td class="label">Nomor</td>
                <td class="colon">:</td>
                <td>{{ '0828/'.str_pad($surat->id, 2, '0', STR_PAD_LEFT).'/' . \Illuminate\Support\Str::before($surat->kategori, '-') . '/' . Carbon\Carbon::parse($surat->created_at)->isoFormat('DD.MM.YY').'/071.095/'.$bulanRomawi[(int)$tanggal->format('m')].'/'.Carbon\Carbon::parse($surat->created_at)->isoFormat('Y') }}</td>
                <td style="text-align: right;">{{ Carbon\Carbon::parse($surat->created_at)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td class="label">Lamp</td>
                <td class="colon">:</td>
                <td>{{ $surat->lampiran }}</td>
                <td></td>
            </tr>
            <tr>
                <td class="label">Hal</td>
                <td class="colon">:</td>
                <td style="font-weight: bold;">{{ $surat->namasurat }}</td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="isisurat">{!! $surat->isi !!}</div>
    <div class="ttd">
        <table>
            <tr>
                <td class="jarak"></td>
                <td>Sukorejo, {{ Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td class="jarak"></td>
                <td>Kepala Perpustakaan,</td>
            </tr>
            <tr>
                <td class="jarak"></td>
                <td>
                    <table style="width: 100%; text-align: left;">
                        <tr>
                            @if($surat->verifikasi == "Terverifikasi")
                            <td>{!! DNS2D::getBarcodeHTML("www.lib.ibrahimy.ac.id/verifikasisurat=$surat->id", 'QRCODE', 2, 2) !!}</td>                            <td style="text-align: left; vertical-align: middle;">
                                <img src="ibrahimy/ttdelektronik.png" alt="TTD" style="width: 60%; height: auto; margin-left: 10px;">
                            </td>
                            @else
                            <p></p>
                            <p></p>
                            <p></p>
                            <p></p>
                            @endif
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="jarak"></td>
                <td class="kepala">Muhammad Ali Ridla, M.Kom.</td>
            </tr>
        </table>
    </div>
    <p></p>
    <p></p>
    <div class="ket">
    </div>
    <div class="footer">
        <img src="ibrahimy/ttdelektronik1.png" alt="Footer Surat" style="width: 50%; height: auto; margin-left: 20px;">
        <img src="ibrahimy/footer.png" alt="Footer Surat">
    </div>
</body>
</html>
