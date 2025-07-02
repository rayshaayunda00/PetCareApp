<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Periksa Kesehatan Hewan</title>
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
    <!-- Navbar Modern & Responsif -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background: linear-gradient(90deg, #4d9fda, #1e67a8);">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">
      <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
      PetCareDB
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ url('/') }}" class="nav-link btn btn-light text-dark rounded-pill px-3 fw-semibold">
            ← Kembali ke Beranda
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container mt-5">
    <div class="card mx-auto" style="max-width:600px;">
        <h2 class="text-center">Form Periksa Kesehatan Hewan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('checkup.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="pet_name" class="form-label">Nama Pemilik</label>
                <input type="text" name="pet_name" id="pet_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="species" class="form-label">Spesies</label>
                <input type="text" name="species" id="species" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="vet_name" class="form-label">Umur Hewan</label>
                <input type="text" name="vet_name" id="vet_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal Periksa</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="treatment" class="form-label">Keluhan / Gejala</label>
                <textarea name="treatment" id="treatment" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Data Periksa</button>
        </form>
    </div>
</div>

@if(session('checkup'))
<!-- Modal Popup Struk -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptModalLabel">Struk Pemeriksaan Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" id="receipt-content">
                <p><strong>Nama Pemilik:</strong> {{ session('checkup')->pet_name }}</p>
                <p><strong>Spesies:</strong> {{ session('checkup')->species }}</p>
                <p><strong>Umur Hewan:</strong> {{ session('checkup')->vet_name }}</p>
                <p><strong>Nama Dokter:</strong> {{ session('doctor_name') ?? 'Tidak tersedia' }}</p>
                <p><strong>Tanggal Periksa:</strong> {{ \Carbon\Carbon::parse(session('checkup')->date)->format('d M Y') }}</p>
                <p><strong>Keluhan / Gejala:</strong> {{ session('checkup')->treatment }}</p>
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
        var printContents = document.getElementById('receipt-content').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        window.location.href = "{{ route('checkup.form') }}";
    }

    window.onload = function () {
        var modal = new bootstrap.Modal(document.getElementById('receiptModal'));
        modal.show();
    };
</script>
@endif

</body>
</html>
