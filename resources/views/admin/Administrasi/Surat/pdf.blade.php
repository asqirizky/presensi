<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PDF</title>
    <style>
        .container {
            text-align: center;
        }
        .pdf-viewer {
            width: 80%;
            height: 500px;
            border: 1px solid #ccc;
        }
        .qrcode {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Dokumen PDF: {{ $isi }}</h2>

    <!-- Tampilkan PDF menggunakan iframe -->
    <iframe class="pdf-viewer" src="{{ $pdfUrl }}"></iframe>

    <!-- Tampilkan QR Code -->
    <div class="qrcode">
        <h3>Scan QR Code untuk mengakses dokumen</h3>
        {!! $qrCode !!}
    </div>
</div>

</body>
</html>
