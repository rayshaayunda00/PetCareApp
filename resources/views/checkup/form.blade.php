<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Periksa Kesehatan Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 20px;
            background: #fff;
        }
        h2 {
            color: #1e67a8;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #1e67a8;
            border: none;
        }
        .btn-primary:hover {
            background-color: #155d92;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width:600px;">
        <h2 class="text-center">Form Periksa Kesehatan Hewan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('checkup.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="pet_name" class="form-label">Nama Hewan</label>
                <input type="text" name="pet_name" id="pet_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="species" class="form-label">Spesies</label>
                <input type="text" name="species" id="species" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="vet_name" class="form-label">Nama Dokter Hewan</label>
                <input type="text" name="vet_name" id="vet_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="specialization" class="form-label">Spesialisasi Dokter</label>
                <input type="text" name="specialization" id="specialization" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal Periksa</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="diagnosis" class="form-label">Diagnosis</label>
                <textarea name="diagnosis" id="diagnosis" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="treatment" class="form-label">Tindakan / Perawatan</label>
                <textarea name="treatment" id="treatment" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Data Periksa</button>
        </form>
    </div>
</div>

</body>
</html>
