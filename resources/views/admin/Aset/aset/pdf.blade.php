<html>

<head>
    <style>
        body {
            display: flex;
            align-items: center;
            height: 25vh;
            margin: 0;
            font-family: Arial, sans-serif;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            width: 80%;
            max-width: 1000px;
        }

        .container {
            border: 1px solid black;
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .qr-code {
            margin-right: 20px;
        }

        .span {
            width: 150px;
            height: 150px;
        }

        .text-content {
            text-align: left;
        }

        .text-content h1 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .text-content p {
            margin: 5px 0;
            font-size: 18px;
        }

        .text-content .code {
            font-size: 24px;
            font-weight: bold;
        }

        .text-content .url {
            font-size: 16px;
        }

        .box {
            border: 1px solid #000;
            padding: 20px;
            height: 150px;
        }
    </style>
</head>

<body>
    @foreach ($aset->units as $item)
    <div class="container">
        <div class="qr-code">
            <span class="fw-semibold text-gray-800">{!! DNS2D::getBarcodeHTML("www.lib.ibrahimy.ac.id/aset-detail=$item->id",'QRCODE') !!}</span>
        </div>
        <div class="text-content">
            <h1>
                Inv. Perpustakaan Ibrahimy
            </h1>
            <p>
                {{ $aset->nama }}
            </p>
            <p class="code">{{ $aset->kategori->kode.'/'. Carbon\Carbon::parse($item->tanggal)->isoFormat('DD.MM.YY').'/'.$item->sumber->kode.'/'.str_pad($aset->id + 1, 4, '0', STR_PAD_LEFT).'-'.$item->kode_unit }}</p>
            <p class="url">
                www.lib.ibrahimy.ac.id
            </p>
        </div>
    </div>
    @endforeach
</body>
<script src="assets/js/app.js" defer></script>
</html>
