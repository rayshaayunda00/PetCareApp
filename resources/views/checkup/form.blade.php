<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Periksa Kesehatan Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #1e67a8;
            --secondary-color: #4d9fda;
            --accent-color: #ff7e5f;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand img {
            height: 30px;
            width: auto;
        }

        .card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 25px;
            text-align: center;
            border-bottom: none;
        }

        .card-header h2 {
            font-weight: 600;
            margin: 0;
        }

        .card-header p {
            opacity: 0.9;
            margin: 10px 0 0;
        }

        .card-body {
            padding: 30px;
            background: white;
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(30, 103, 168, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 103, 168, 0.3);
        }

        .section-title {
            position: relative;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }

        .input-group-text {
            background-color: #f1f7fd;
            border-color: #e0e0e0;
            color: var(--primary-color);
        }

        .modal-content {
            border-radius: 16px;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .receipt-item {
            border-bottom: 1px dashed #dee2e6;
            padding: 0.75rem 0;
        }

        .receipt-item:last-child {
            border-bottom: none;
        }

        @media (max-width: 768px) {
            .card {
                margin: 20px 15px;
            }

            .card-body {
                padding: 20px;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="PetCareDB Logo">
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

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-clipboard-check me-2"></i>Formulir Pemeriksaan Kesehatan Hewan</h2>
                    <p>Isi data hewan peliharaan Anda untuk pemeriksaan kesehatan</p>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('checkup.submit') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-4">
                            <h5 class="section-title">Informasi Pemilik</h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="pet_name" class="form-label">Nama Pemilik/Hewan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" name="pet_name" id="pet_name" class="form-control" placeholder="Nama pemilik/hewan" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="section-title">Informasi Hewan</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="species" class="form-label">Spesies Hewan</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-dog"></i></span>
                                        <input type="text" name="species" id="species" class="form-control" placeholder="Kucing, Anjing, dll" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="vet_name" class="form-label">Umur Hewan (tahun)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                        <input type="number" name="vet_name" id="vet_name" class="form-control" min="0" max="30" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="section-title">Detail Pemeriksaan</h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="date" class="form-label">Tanggal Periksa</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        <input type="date" name="date" id="date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="treatment" class="form-label">Keluhan / Gejala</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-notes-medical"></i></span>
                                        <textarea name="treatment" id="treatment" class="form-control" rows="3" placeholder="Deskripsi keluhan atau gejala yang dialami hewan" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(isset($randomVet))
                            <div class="mb-4">
                                <h5 class="section-title">Dokter</h5>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                                    <input type="text" name="doctor_name" id="doctor_name" class="form-control" value="{{ $randomVet->name }}" readonly>
                                </div>
                            </div>
                        @endif

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Data Pemeriksaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center text-muted mb-4">
                <p><i class="fas fa-shield-alt me-2"></i>Data Anda akan kami jaga kerahasiaannya</p>
            </div>
        </div>
    </div>
</div>

@if(session('checkup'))
<!-- Receipt Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-receipt me-2"></i>Struk Pemeriksaan Hewan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="receipt-content">
                <div class="text-center mb-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="PetCareDB Logo" width="60" class="mb-3">
                    <h4 class="text-primary">PetCareRaysha</h4>
                    <p class="text-muted">Klinik Kesehatan Hewan</p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase text-primary mb-3">Informasi Pemeriksaan</h6>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><strong>No. Pemeriksaan:</strong></div>
                        <div>PC-{{ session('checkup')->id }}</div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><strong>Tanggal:</strong></div>
                        <div>{{ \Carbon\Carbon::parse(session('checkup')->date)->format('d M Y') }}</div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase text-primary mb-3">Informasi Pemilik</h6>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><strong>Nama:</strong></div>
                        <div>{{ session('checkup')->pet_name }}</div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase text-primary mb-3">Detail Hewan</h6>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><strong>Spesies:</strong></div>
                        <div>{{ session('checkup')->species }}</div>
                    </div>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><strong>Umur:</strong></div>
                        <div>{{ session('checkup')->vet_name }} tahun</div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-uppercase text-primary mb-3">Dokter</h6>
                    <div class="d-flex mb-2">
                        <div style="width: 120px;"><strong>Nama Dokter:</strong></div>
                        <div>{{ session('checkup')->doctor_name ?? 'Tidak tersedia' }}</div>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="fw-bold text-uppercase text-primary mb-3">Keluhan/Gejala</h6>
                    <div class="bg-light p-3 rounded">
                        {{ session('checkup')->treatment }}
                    </div>
                </div>

                <div class="alert alert-info mt-4">
                    <i class="fas fa-info-circle me-2"></i>Harap datang tepat waktu sesuai jadwal pemeriksaan.
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="printReceipt()" class="btn btn-success">
                    <i class="fas fa-print me-2"></i>Cetak Struk
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
        var printContent = `
            <div style="max-width:500px;margin:0 auto;padding:20px;font-family:Arial,sans-serif;">
                <div style="text-align:center;margin-bottom:20px;">
                    <h2 style="color:#1e67a8;margin-bottom:5px;">PetCareDB</h2>
                    <p style="color:#666;margin-top:0;">Klinik Kesehatan Hewan</p>
                </div>
                <h3 style="text-align:center;border-bottom:2px solid #1e67a8;padding-bottom:10px;">
                    Bukti Pemeriksaan Hewan
                </h3>
                ${content}
                <div style="margin-top:30px;text-align:center;font-size:12px;color:#999;">
                    Terima kasih telah menggunakan layanan kami
                </div>
            </div>
        `;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = original;
        window.location.href = "{{ route('checkup.form') }}";
    }

    document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('receiptModal'));
        modal.show();

        // Set default date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date').value = today;
    });
</script>
@endif

<!-- Form validation script -->
<script>
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

</body>
</html>
