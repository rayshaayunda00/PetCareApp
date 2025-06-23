<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCareDB - Klinik Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: linear-gradient(135deg, #4d9fda, #1e67a8);
            color: white;
            padding: 80px 0;
            border-radius: 0 0 30px 30px;
        }
        .card:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }
        .card {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border: none;
            border-radius: 15px;
        }
        footer {
            background: #1e67a8;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
            border-radius: 30px 30px 0 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">PetCareDB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#dokter">Dokter Hewan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-center">
        <div class="container">
            <h1>Selamat Datang di Klinik Hewan PetCareDB</h1>
            <p>Klinik terpercaya untuk kesehatan hewan kesayangan Anda</p>
            <a href="#layanan" class="btn btn-light btn-lg mt-3">Lihat Layanan Kami</a>
        </div>
    </section>

    <!-- Layanan -->
    <div id="layanan" class="container mt-5">
        <h2 class="text-center mb-4">Layanan Kami</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="80" class="mx-auto mt-3">
                    <h5 class="mt-3">Periksa Kesehatan</h5>
                    <p>Periksa rutin kesehatan hewan peliharaan Anda bersama dokter berpengalaman.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" width="80" class="mx-auto mt-3">
                    <h5 class="mt-3">Vaksinasi</h5>
                    <p>Lindungi hewan dari penyakit dengan vaksinasi lengkap & aman.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/616/616404.png" width="80" class="mx-auto mt-3">
                    <h5 class="mt-3">Penitipan Hewan</h5>
                    <p>Jasa penitipan hewan selama Anda bepergian, dengan pengawasan dokter.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Dokter -->
    <div id="dokter" class="container mt-5">
        <h2 class="text-center mb-4">Dokter Kami</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-5">
                <div class="card p-3 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2922/2922510.png" width="80" class="mx-auto mt-3">
                    <h5 class="mt-3">drh. Rina Andayani</h5>
                    <p>Spesialis Kesehatan Kucing & Anjing</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card p-3 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/2922/2922506.png" width="80" class="mx-auto mt-3">
                    <h5 class="mt-3">drh. Ahmad Firmansyah</h5>
                    <p>Spesialis Hewan Eksotik & Reptil</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Kontak -->
    <div id="kontak" class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Kontak Kami</h2>
        <div class="text-center">
            <p>Jl. Mawar No. 12, Bandung</p>
            <p>Telp: 022-12345678</p>
            <p>Email: info@petcaredb.com</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        &copy; 2025 PetCareDB. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
