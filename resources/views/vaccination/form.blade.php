<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Vaksinasi Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Formulir Vaksinasi Hewan</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('vaccination.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Hewan</label>
                <input type="text" name="pet_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Vaksin</label>
                <input type="text" name="vaccine_type" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tanggal Vaksinasi</label>
                <input type="date" name="vaccination_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Catatan (Opsional)</label>
                <textarea name="notes" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
