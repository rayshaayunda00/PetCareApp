<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Vaksinasi Hewan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #1e67a8;
            --secondary-color: #4d9fda;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-align: center;
            padding: 25px;
            border-bottom: none;
        }

        .card-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-primary:hover {
            box-shadow: 0 5px 15px rgba(30, 103, 168, 0.3);
        }

        .modal-content {
            border-radius: 16px;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Logo" width="30">
            PetCareRaysha
        </a>
        
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link back-btn btn-light text-dark">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Form -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-syringe me-2"></i>Formulir Vaksinasi Hewan</h2>
                    <p>Lengkapi data vaksinasi hewan peliharaan Anda</p>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('vaccination.submit') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="pet_name" class="form-label">Nama Hewan</label>
                            <input type="text" name="pet_name" id="pet_name" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="vaccine_type" class="form-label">Jenis Vaksin / Keluhan</label>
                            <input type="text" name="vaccine_type" id="vaccine_type" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="vaccination_date" class="form-label">Tanggal Vaksinasi</label>
                            <input type="date" name="vaccination_date" id="vaccination_date" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="form-label">Catatan Tambahan</label>
                            <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
                        </div>

                        @if(isset($randomVet))
                            <div class="mb-4">
                                <label class="form-label">Dokter Penanggung Jawab</label>
                                <input type="text" class="form-control" value="{{ $randomVet->name }}" readonly>
                                <input type="hidden" name="doctor_name" value="{{ $randomVet->name }}">
                            </div>
                        @endif

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i> Simpan Data Vaksinasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center text-muted mt-4">
                <p><i class="fas fa-shield-alt me-2"></i>Data Anda aman bersama kami</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@if(session('vaccination'))
<div class="modal fade" id="receiptModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-receipt me-2"></i>Struk Vaksinasi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="receipt-content">
                <p><strong>Nama Hewan:</strong> {{ session('vaccination')->pet_name }}</p>
                <p><strong>Dokter:</strong> {{ session('vaccination')->doctor_name ?? 'Tidak tersedia' }}</p>
                <p><strong>Jenis Vaksin:</strong> {{ session('vaccination')->vaccine_type }}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse(session('vaccination')->vaccination_date)->format('d M Y') }}</p>
                @if(session('vaccination')->notes)
                    <p><strong>Catatan:</strong> {{ session('vaccination')->notes }}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button onclick="printReceipt()" class="btn btn-success">
                    <i class="fas fa-print me-2"></i>Unduh Struk
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
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
        window.location.href = "{{ route('vaccination.form') }}";
    }

    window.onload = function () {
        var modal = new bootstrap.Modal(document.getElementById('receiptModal'));
        modal.show();
    };
</script>
@endif

</body>
</html>

