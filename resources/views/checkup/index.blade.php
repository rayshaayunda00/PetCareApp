<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Periksa Kesehatan Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Periksa Kesehatan Hewan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Hewan</th>
                <th>Spesies</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>Tanggal Periksa</th>
                <th>Diagnosis</th>
                <th>Tindakan / Perawatan</th>
            </tr>
        </thead>
       <tbody>
    @foreach($checkups as $checkup)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $checkup->pet_name }}</td>
            <td>{{ $checkup->species }}</td>
            <td>{{ $checkup->vet_name }}</td>
            <td>{{ $checkup->specialization }}</td>
            <td>{{ $checkup->date }}</td>
            <td>{{ $checkup->diagnosis }}</td>
            <td>{{ $checkup->treatment }}</td>
        </tr>
    @endforeach
</tbody>
</div>
</body>
</html>
