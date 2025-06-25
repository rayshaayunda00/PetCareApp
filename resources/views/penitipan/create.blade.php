<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Penitipan Hewan</title>
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
            text-align: center;
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
        <h2>Formulir Penitipan Hewan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('penitipan.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Pemilik</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">No. Telepon</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="address" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="pet_name" class="form-label">Nama Hewan</label>
                <input type="text" name="pet_name" id="pet_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="species" class="form-label">Spesies</label>
                <input type="text" name="species" id="species" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="breed" class="form-label">Ras</label>
                <input type="text" name="breed" id="breed" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Usia</label>
                <input type="number" name="age" id="age" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Kirim Data Penitipan</button>
        </form>
    </div>
</div>

</body>
</html>
