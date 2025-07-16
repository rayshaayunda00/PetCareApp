<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Penitipan Hewan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #1e67a8;
            --secondary-color: #4d9fda;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            background: var(--light-color);
            font-family: 'Poppins', sans-serif;
        }

        .receipt-card {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .receipt-header h3 {
            color: var(--primary-color);
            font-weight: 700;
        }

        .receipt-section {
            margin-bottom: 25px;
        }

        .receipt-section h6 {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .receipt-line {
            display: flex;
            margin-bottom: 10px;
        }

        .receipt-line strong {
            width: 140px;
            display: inline-block;
        }

        .note {
            font-style: italic;
            text-align: center;
            color: #555;
            margin-top: 30px;
        }

        @media print {
            body {
                background: white;
            }

            .receipt-card {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="receipt-card">
        <div class="receipt-header">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="PetCareDB Logo" width="60" class="mb-3">
            <h3>Struk Penitipan Hewan</h3>
            <p class="text-muted">Layanan Penitipan Hewan PetCareDB</p>
        </div>

        <div class="receipt-section">
            <h6>Informasi Pemilik</h6>
            <div class="receipt-line"><strong>Nama:</strong> {{ $owner->name }}</div>
            <div class="receipt-line"><strong>Telepon:</strong> {{ $owner->phone }}</div>
            <div class="receipt-line"><strong>Alamat:</strong> {{ $owner->address }}</div>
        </div>

        @if($pet)
        <div class="receipt-section">
            <h6>Detail Hewan</h6>
            <div class="receipt-line"><strong>Nama Hewan:</strong> {{ $pet->name }}</div>
            <div class="receipt-line"><strong>Spesies:</strong> {{ $pet->species }}</div>
            <div class="receipt-line"><strong>Ras:</strong> {{ $pet->breed }}</div>
            <div class="receipt-line"><strong>Usia:</strong> {{ $pet->age }} tahun</div>
        </div>
        @endif

        @if($penitipan)
        <div class="receipt-section">
            <h6>Periode Penitipan</h6>
            <div class="receipt-line"><strong>Mulai:</strong> {{ \Carbon\Carbon::parse($penitipan->start_date)->format('d M Y') }}</div>
            <div class="receipt-line"><strong>Selesai:</strong> {{ \Carbon\Carbon::parse($penitipan->end_date)->format('d M Y') }}</div>
            <div class="receipt-line"><strong>Catatan:</strong> {{ $penitipan->notes ?? '-' }}</div>
        </div>
        @endif

        <div class="note">
            <i class="fas fa-paw me-2"></i>Terima kasih telah mempercayakan penitipan hewan Anda kepada kami.
        </div>
    </div>
</body>
</html>
