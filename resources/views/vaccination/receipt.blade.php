<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Struk Vaksinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print()">
    <div class="container mt-5">
        <div class="border p-4 rounded shadow-sm">
            <h3 class="text-center mb-4">Struk Vaksinasi Hewan</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Hewan</th>
                    <td>{{ $vaccination->pet_name }}</td>
                </tr>
                <tr>
                    <th>Jenis Vaksin</th>
                    <td>{{ $vaccination->vaccine_type }}</td>
                </tr>
                <tr>
                    <th>Tanggal Vaksinasi</th>
                    <td>{{ \Carbon\Carbon::parse($vaccination->vaccination_date)->translatedFormat('d M Y') }}</td>
                </tr>
                @if($vaccination->notes)
                <tr>
                    <th>Catatan</th>
                    <td>{{ $vaccination->notes }}</td>
                </tr>
                @endif
                <tr>
                    <th>Nama Dokter</th>
                    <td>{{ $vaccination->doctor_name ?? 'Tidak tersedia' }}</td>
                </tr>
            </table>
            <p class="text-end mt-4">Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d M Y, H:i') }}</p>
        </div>
    </div>
</body>
</html>
