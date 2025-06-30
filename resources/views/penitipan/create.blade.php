<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Penitipan Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

            <div class="mb-3">
                <label for="start_date" class="form-label">Tanggal Mulai Penitipan</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Tanggal Selesai Penitipan</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Catatan Tambahan</label>
                <textarea name="notes" id="notes" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Kirim Data Penitipan</button>
        </form>
    </div>
</div>

@if(session('penitipan'))
<!-- Modal Popup -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptModalLabel">Struk Penitipan Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" id="receipt-content">
                <p><strong>Nama Pemilik:</strong> {{ session('penitipan')->name }}</p>
                <p><strong>No Telepon:</strong> {{ session('penitipan')->phone }}</p>
                <p><strong>Alamat:</strong> {{ session('penitipan')->address }}</p>
                <hr>
                <p><strong>Nama Hewan:</strong> {{ session('penitipan')->pet_name }}</p>
                <p><strong>Spesies:</strong> {{ session('penitipan')->species }}</p>
                <p><strong>Ras:</strong> {{ session('penitipan')->breed }}</p>
                <p><strong>Usia:</strong> {{ session('penitipan')->age }} tahun</p>
                <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse(session('penitipan')->start_date)->format('d M Y') }}</p>
                <p><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse(session('penitipan')->end_date)->format('d M Y') }}</p>
                @if(session('penitipan')->notes)
                    <p><strong>Catatan:</strong> {{ session('penitipan')->notes }}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button onclick="printReceipt()" class="btn btn-success">Unduh Struk</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function printReceipt() {
        var content = document.getElementById('receipt-content').innerHTML;
        var original = document.body.innerHTML;
        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = original;
        location.reload();
    }

    window.onload = function () {
        var modal = new bootstrap.Modal(document.getElementById('receiptModal'));
        modal.show();
    };
</script>
@endif

</body>
</html>
