<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Penitipan Hewan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 12px;
            padding: 25px;
            background: #ffffff;
        }

        h3 {
            color: #1e67a8;
            font-weight: bold;
        }

        p {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .note {
            font-style: italic;
            color: #555;
        }

        @media print {
            body {
                background: white;
            }

            .card {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 600px;">
            <h3 class="text-center mb-4">Struk Penitipan Hewan</h3>
            <hr>
            <p><strong>Nama Pemilik:</strong> {{ $owner->name }}</p>
            <p><strong>No. Telepon:</strong> {{ $owner->phone }}</p>
            <p><strong>Alamat:</strong> {{ $owner->address }}</p>

            @if($pet)
                <p><strong>Nama Hewan:</strong> {{ $pet->name }}</p>
                <p><strong>Spesies:</strong> {{ $pet->species }}</p>
                <p><strong>Ras:</strong> {{ $pet->breed }}</p>
                <p><strong>Usia:</strong> {{ $pet->age }} tahun</p>
            @endif

            @if($penitipan)
                <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($penitipan->start_date)->format('d M Y') }}</p>
                <p><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($penitipan->end_date)->format('d M Y') }}</p>
                <p><strong>Catatan:</strong> {{ $penitipan->notes ?? '-' }}</p>
            @endif

            <hr>
            <p class="note text-center">Terima kasih telah mempercayakan penitipan hewan Anda kepada kami.</p>
        </div>
    </div>
</body>
</html>
