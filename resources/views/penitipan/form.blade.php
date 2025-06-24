<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Penitipan Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Penitipan Hewan</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('penitipan.submit') }}">
            @csrf
            <div class="mb-3">
                <label>Nama Pemilik</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No. Telepon</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label>Nama Hewan</label>
                <input type="text" name="pet_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Spesies</label>
                <input type="text" name="species" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Ras</label>
                <input type="text" name="breed" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Usia</label>
                <input type="number" name="age" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</body>
</html>
