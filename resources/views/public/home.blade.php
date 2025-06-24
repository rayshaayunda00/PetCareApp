<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCareDB - Klinik Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
        }
        .hero {
            background: linear-gradient(135deg, #6dd5fa, #2980b9);
            color: white;
            padding: 100px 0;
            border-radius: 0 0 50px 50px;
            text-shadow: 1px 1px 2px #333;
        }
        .card {
            border: none;
            border-radius: 20px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .btn-custom {
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: bold;
        }
        footer {
            background: #2980b9;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
            border-radius: 50px 50px 0 0;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">PetCareDB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#dokter">Dokter Hewan</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                <li class="nav-item"><a class="nav-link btn btn-light text-primary btn-sm ms-2" href="/login">Login Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di PetCareDB</h1>
        <p class="lead">Klinik terpercaya untuk kesehatan hewan kesayangan Anda</p>
        <a href="#layanan" class="btn btn-light btn-lg btn-custom mt-3">Lihat Layanan Kami</a>
    </div>
</section>

<!-- Layanan -->
<section id="layanan" class="container mt-5">
    <h2 class="text-center mb-4 fw-bold">Layanan Kami</h2>
    <div class="row g-4">
        <!-- Periksa Kesehatan -->
        <div class="col-md-4">
            <div class="card text-center p-3">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">Periksa Kesehatan</h5>
                <p>Periksa rutin kesehatan hewan Anda oleh dokter berpengalaman.</p>
                <a href="{{ route('checkup.form') }}" class="btn btn-warning btn-custom mt-2">Form Periksa Kesehatan</a>
            </div>
        </div>
        <!-- Vaksinasi -->
        <div class="col-md-4">
            <div class="card text-center p-3">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">Vaksinasi</h5>
                <p>Melindungi hewan dari penyakit dengan vaksinasi lengkap.</p>
                <a href="{{ route('vaccination.form') }}" class="btn btn-success btn-custom mt-2">Form Vaksinasi Hewan</a>
            </div>
        </div>
        <!-- Penitipan -->
        <div class="col-md-4">
            <div class="card text-center p-3">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616404.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">Penitipan Hewan</h5>
                <p>Jasa penitipan hewan selama Anda bepergian, aman & terpercaya.</p>
                <a href="{{ route('penitipan.form') }}" class="btn btn-primary btn-custom mt-2">Form Penitipan Hewan</a>
            </div>
        </div>
    </div>
</section>

<!-- Dokter -->
<section id="dokter" class="container mt-5">
    <h2 class="text-center mb-4 fw-bold">Dokter Kami</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-md-5">
            <div class="card text-center p-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2922/2922510.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">drh. Rina Andayani</h5>
                <p>Spesialis Kesehatan Kucing & Anjing</p>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card text-center p-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2922/2922506.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">drh. Ahmad Firmansyah</h5>
                <p>Spesialis Hewan Eksotik & Reptil</p>
            </div>
        </div>
    </div>
</section>

<!-- Kontak -->
<section id="kontak" class="container mt-5 mb-5">
    <h2 class="text-center mb-4 fw-bold">Kontak Kami</h2>
    <div class="text-center">
        <p>Jl. Mawar No. 12, Bandung</p>
        <p>Telp: 022-12345678</p>
        <p>Email: info@petcaredb.com</p>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    &copy; 2025 PetCareDB. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
