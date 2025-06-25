<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCareDB - Klinik Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(90deg, #4d9fda, #1e67a8);
        }
        .hero {
            background: linear-gradient(135deg, #4d9fda, #1e67a8);
            color: white;
            padding: 100px 0;
            border-radius: 0 0 30px 30px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.4);
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        footer {
            background: #1e67a8;
            color: white;
            padding: 20px 0;
            border-radius: 30px 30px 0 0;
            margin-top: 50px;
        }
        .btn-custom {
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
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
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-light text-primary btn-sm ms-2" href="{{ route('login') }}">Login Admin</a>
                    </li>
                @endguest
                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-light btn-sm ms-2" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1 class="display-5 fw-bold">Selamat Datang di Klinik Hewan PetCareDB</h1>
        <p class="lead">Klinik terpercaya untuk kesehatan hewan kesayangan Anda</p>
        <a href="#layanan" class="btn btn-light btn-lg btn-custom mt-3">Lihat Layanan Kami</a>
    </div>
</section>

<!-- Layanan -->
<section id="layanan" class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Layanan Kami</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">Periksa Kesehatan</h5>
                <p>Periksa rutin kesehatan hewan oleh dokter terpercaya.</p>
                <a href="{{ route('checkup.form') }}" class="btn btn-warning btn-custom mt-2">Form Periksa Kesehatan</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">Vaksinasi</h5>
                <p>Melindungi hewan dari penyakit dengan vaksinasi lengkap.</p>
                <a href="{{ route('vaccination.form') }}" class="btn btn-success btn-custom mt-2">Form Vaksinasi Hewan</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616404.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">Penitipan Hewan</h5>
                <p>Jasa penitipan hewan aman selama Anda bepergian.</p>
                <a href="{{ route('penitipan.form') }}" class="btn btn-primary btn-custom mt-2">Form Penitipan Hewan</a>
            </div>
        </div>
    </div>
</section>

<!-- Dokter -->
<section id="dokter" class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Dokter Kami</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-md-5">
            <div class="card p-3 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/2922/2922510.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">drh. Rina Andayani</h5>
                <p>Spesialis Kucing & Anjing</p>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card p-3 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/2922/2922506.png" width="80" class="mx-auto mt-3">
                <h5 class="mt-3 fw-semibold">drh. Ahmad Firmansyah</h5>
                <p>Spesialis Hewan Eksotik & Reptil</p>
            </div>
        </div>
    </div>
</section>

<!-- Kontak -->
<section id="kontak" class="container mt-5 mb-5">
    <h2 class="text-center fw-bold mb-4">Kontak Kami</h2>
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
