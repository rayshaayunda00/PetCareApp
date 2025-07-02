<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pemeriksaan Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
        }
        .receipt-box {
            max-width: 700px;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #e91e63;
            margin-bottom: 30px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .text-end {
            text-align: right;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="receipt-box">
        <h2>Struk Pemeriksaan Hewan</h2>

        <table class="table table-bordered">
            <tr>
                <th>Nama Pemilik</th>
                <td>{{ $checkup->pet_name }}</td>
            </tr>
            <tr>
                <th>Spesies</th>
                <td>{{ $checkup->species }}</td>
            </tr>
            <tr>
                <th>Umur Hewan</th>
                <td>{{ $checkup->vet_name }}</td>
            </tr>
            <tr>
                <th>Nama Dokter</th>
                <td>{{ $checkup->doctor_name ?? 'Tidak tersedia' }}</td>
            </tr>
            <tr>
                <th>Tanggal Periksa</th>
                <td>{{ \Carbon\Carbon::parse($checkup->date)->translatedFormat('d M Y') }}</td>
            </tr>
            <tr>
                <th>Keluhan / Gejala</th>
                <td>{{ $checkup->treatment }}</td>
            </tr>
        </table>

        <p class="text-end mt-4"><small>Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d M Y, H:i') }}</small></p>
    </div>
</body>
</html>
