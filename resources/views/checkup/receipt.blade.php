<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pemeriksaan Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #1e67a8;
            --secondary-color: #4d9fda;
            --text-muted: #6c757d;
            --light-color: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: #212529;
        }

        .receipt-box {
            max-width: 700px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 16px;
            background: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .receipt-header h2 {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .receipt-header p {
            color: var(--text-muted);
            font-size: 14px;
            margin: 0;
        }

        .table th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
            background-color: #f9f9f9;
        }

        .text-end {
            text-align: right;
        }

        @media print {
            body {
                background-color: white !important;
            }

            .receipt-box {
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="receipt-box">
        <div class="receipt-header">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="PetCareDB" width="60" class="mb-2">
            <h2>PetCareDB</h2>
            <p>Klinik Kesehatan Hewan</p>
            <hr>
            <h5 class="mt-3">Struk Pemeriksaan Hewan</h5>
        </div>

        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">Nama Pemilik</th>
                <td>{{ $checkup->pet_name }}</td>
            </tr>
            <tr>
                <th>Spesies</th>
                <td>{{ $checkup->species }}</td>
            </tr>
            <tr>
                <th>Umur Hewan</th>
                <td>{{ $checkup->vet_name }} tahun</td>
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
 
