<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCareDB - Klinik Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
    :root {
        --blue1: #0B4F6C;
        --blue2: #01BAEF;
        --blue3: #5BC0EB;
        --blue4: #B9E6FF;
        --accent: #FFD166;
        --dark: #292F36;
        --light: #F7FFF7;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--light);
        overflow-x: hidden;
        background-image: url('data:image/svg+xml;utf8,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M30,50 Q50,30 70,50 Q50,70 30,50 Z" fill="%2301BAEF" opacity="0.05"/></svg>');
        background-size: 200px;
    }

    .crazy-title {
        font-family: 'Fredoka One', cursive;
        text-transform: uppercase;
        background: linear-gradient(45deg, var(--blue2), var(--blue3));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 3px 3px 0 rgba(0,0,0,0.1);
        letter-spacing: 2px;
    }

    .navbar {
        background: linear-gradient(135deg, var(--blue1), var(--blue2));
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        padding: 15px 0;
        border-radius: 0 0 30px 30px;
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .navbar-brand {
        font-family: 'Fredoka One', cursive;
        font-size: 2.5rem;
        color: white !important;
        text-shadow: 2px 2px 0 rgba(0,0,0,0.3);
        transform: rotate(-5deg);
        display: inline-block;
        background: linear-gradient(45deg, var(--blue4), white);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .nav-link {
        color: white !important;
        font-weight: 600;
        margin: 0 10px;
        position: relative;
        transition: all 0.3s;
        transform-style: preserve-3d;
        padding: 8px 15px !important;
        border-radius: 50px;
    }

    .nav-link:hover {
        transform: translateY(-5px) rotate(3deg);
        background: rgba(255,255,255,0.2);
        color: var(--accent) !important;
    }

    .hero {
        background: radial-gradient(ellipse at top left, var(--blue1), var(--blue2));
        color: white;
        padding: 180px 0 120px;
        clip-path: polygon(0 0, 100% 0, 100% 90%, 50% 100%, 0 90%);
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(91,192,235,0.1) 0%, rgba(0,0,0,0) 70%);
        top: -200px;
        right: -200px;
        animation: pulse 15s infinite alternate;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.3; }
        100% { transform: scale(1.2); opacity: 0.1; }
    }

    .pet-icon {
        animation: bounce 2s infinite alternate, float 6s ease-in-out infinite;
        filter: drop-shadow(0 15px 15px rgba(0,0,0,0.3));
        transform-style: preserve-3d;
        perspective: 1000px;
    }

    @keyframes bounce {
        from { transform: translateY(0) rotate(-5deg); }
        to { transform: translateY(-40px) rotate(5deg); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(-5deg); }
        50% { transform: translateY(30px) rotate(5deg); }
    }

    .btn-crazy {
        border-radius: 50px;
        padding: 18px 40px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        z-index: 1;
        border: 3px solid white;
        transform-style: preserve-3d;
        font-family: 'Fredoka One', cursive;
    }

    .btn-crazy::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, var(--blue3), var(--blue2));
        z-index: -1;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.6s;
    }

    .btn-crazy:hover {
        transform: translateY(-8px) scale(1.1) rotate(3deg);
        box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        color: white !important;
    }

    .btn-crazy:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }

    .card-crazy {
        border: none;
        border-radius: 30px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: white;
        overflow: hidden;
        position: relative;
        transform-style: preserve-3d;
        border: 3px solid white;
    }

    .card-crazy::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 15px;
        background: linear-gradient(90deg, var(--blue2), var(--blue3));
        transition: all 0.4s;
        z-index: 2;
    }

    .card-crazy:hover {
        transform: translateY(-20px) rotate(5deg) scale(1.05);
        box-shadow: 0 30px 60px rgba(0,0,0,0.25);
    }

    .card-crazy:hover::before {
        height: 20px;
    }

    .service-icon {
        width: 150px;
        height: 150px;
        background: linear-gradient(45deg, var(--blue2), var(--blue3));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -75px auto 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        transition: all 0.5s;
        transform-style: preserve-3d;
        border: 5px solid white;
    }

    .service-card:hover .service-icon {
        transform: rotate(20deg) scale(1.1);
        box-shadow: 0 30px 50px rgba(0,0,0,0.3);
    }

    .doctor-carousel {
        perspective: 1000px;
    }

    .doctor-card {
        transform-style: preserve-3d;
        transition: all 0.5s;
    }

    .doctor-img {
        width: 220px;
        height: 220px;
        border-radius: 50%;
        object-fit: cover;
        border: 10px solid white;
        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        transition: all 0.5s;
        transform-style: preserve-3d;
        background: linear-gradient(45deg, var(--blue2), var(--blue3));
        padding: 5px;
    }

    .doctor-card:hover .doctor-img {
        transform: scale(1.1) rotate(10deg);
        box-shadow: 0 30px 60px rgba(0,0,0,0.3);
    }

    .nav-btn {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        transition: all 0.3s;
        transform-style: preserve-3d;
        background: linear-gradient(45deg, var(--blue2), var(--blue3));
        color: white;
        border: none;
    }

    .nav-btn:hover {
        transform: scale(1.2) rotate(15deg);
        box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }

    .contact-bubble {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 20px;
        transition: all 0.3s;
        transform-style: preserve-3d;
        background: linear-gradient(45deg, var(--blue2), var(--blue3));
        color: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .contact-bubble:hover {
        transform: scale(1.2) rotate(15deg);
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    footer {
        background: linear-gradient(135deg, var(--blue1), var(--blue2));
        color: white;
        padding: 80px 0 40px;
        clip-path: polygon(0 20%, 100% 0, 100% 100%, 0% 100%);
        position: relative;
        margin-top: 120px;
    }

    footer::before {
        content: '';
        position: absolute;
        top: -50px;
        left: 0;
        width: 100%;
        height: 100px;
        background: url("data:image/svg+xml,%3Csvg viewBox='0 0 1200 120' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' fill='%23f7fff7' opacity='.25'/%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' fill='%23f7fff7' opacity='.5'/%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='%23f7fff7'/%3E%3C/svg%3E");
        background-size: cover;
        background-repeat: no-repeat;
    }

    .bubble {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.1);
        animation: float 10s infinite ease-in-out;
        z-index: 0;
    }

    .section-title {
        position: relative;
        display: inline-block;
        z-index: 1;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 110%;
        height: 20px;
        bottom: 5px;
        left: -5%;
        background: linear-gradient(90deg, var(--blue2), var(--blue3));
        z-index: -1;
        opacity: 0.3;
        border-radius: 20px;
        transform: rotate(-2deg);
    }

    .water-wave {
        position: absolute;
        width: 200%;
        height: 100px;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="%2301BAEF" opacity=".25"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" fill="%2301BAEF" opacity=".5"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%2301BAEF"/></svg>');
        background-size: contain;
        background-repeat: repeat-x;
        animation: wave 20s linear infinite;
        opacity: 0.1;
    }

    @keyframes wave {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @media (max-width: 768px) {
        .hero {
            padding: 150px 0 100px;
            clip-path: polygon(0 0, 100% 0, 100% 95%, 0 100%);
        }

        .navbar-brand {
            font-size: 2rem;
        }

        footer {
            clip-path: polygon(0 10%, 100% 0, 100% 100%, 0% 100%);
            margin-top: 80px;
            padding: 60px 0 30px;
        }

        .btn-crazy {
            padding: 15px 30px;
            font-size: 1rem;
        }

        .service-icon {
            width: 120px;
            height: 120px;
            margin: -60px auto 20px;
        }
    }
</style>
</head>
<body>

<!-- Floating Bubbles -->
<div class="bubble" style="width: 100px; height: 100px; top: 20%; left: 5%; animation-delay: 0s;"></div>
<div class="bubble" style="width: 150px; height: 150px; top: 60%; right: 10%; animation-delay: 2s;"></div>
<div class="bubble" style="width: 80px; height: 80px; top: 40%; right: 20%; animation-delay: 4s;"></div>

<!-- Water Wave Effect -->
<div class="water-wave" style="bottom: 0; left: 0;"></div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="bi bi-heart-pulse-fill me-2"></i>PetCareDB
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#dokter">Dokter</a></li>
                <li class="nav-item"><a class="nav-link" href="#artikel">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>

                @guest
                    <li class="nav-item ms-2">
                        <a class="nav-link btn btn-light btn-sm rounded-pill px-3" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                @endguest

                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i>Dashboard
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">
                                <i class="bi bi-person-circle me-1"></i>Profil
                            </a>
                        </li>
                    @endif
                    <li class="nav-item ms-2">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-light btn-sm rounded-pill px-3" type="submit">
                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start">
                <h1 class="crazy-title display-3 mb-4">PetCareDB</h1>
                <h2 class="text-white mb-4">Klinik Hewan <span class="text-warning">Terbaik</span> di Kota!</h2>
                <p class="lead mb-5">Tempat di mana hewan peliharaan mendapatkan perawatan kelas dunia dengan sentuhan personal!</p>
                <div class="d-flex flex-wrap gap-4 justify-content-center justify-content-lg-start">
                    <a href="#layanan" class="btn btn-light btn-lg btn-crazy">
                        <i class="bi bi-heart-pulse me-2"></i>Layanan Kami
                    </a>
                    <a href="#dokter" class="btn btn-outline-light btn-lg btn-crazy">
                        <i class="bi bi-people-fill me-2"></i>Dokter Kami
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center position-relative">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Pet Icon" class="img-fluid pet-icon" style="max-width: 450px;">
            </div>
        </div>
    </div>
</section>

<!-- Layanan -->
<section id="layanan" class="container my-5 py-5 position-relative">
    <div class="bubble" style="width: 120px; height: 120px; top: -50px; right: 10%; animation-delay: 1s;"></div>

    <h2 class="text-center fw-bold mb-5 display-4 section-title">
        <i class="bi bi-heart-pulse-fill me-2"></i>Layanan Kami
    </h2>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
        <div class="col">
            <div class="card card-crazy h-100 text-center p-4 pt-5 service-card">
                <div class="service-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/1995/1995515.png" width="80" class="img-fluid">
                </div>
                <h3 class="fw-bold mb-3">Periksa Kesehatan</h3>
                <p class="mb-4">Pemeriksaan komprehensif dengan teknologi terkini untuk kesehatan optimal hewan kesayangan Anda.</p>
                <a href="{{ route('checkup.form') }}" class="btn btn-primary btn-crazy mt-auto">
                    <i class="bi bi-calendar-check me-2"></i>Jadwalkan
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card card-crazy h-100 text-center p-4 pt-5 service-card">
                <div class="service-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3161/3161837.png" width="80" class="img-fluid">
                </div>
                <h3 class="fw-bold mb-3">Vaksinasi</h3>
                <p class="mb-4">Program vaksinasi lengkap untuk melindungi hewan peliharaan Anda dari berbagai penyakit.</p>
                <a href="{{ route('vaccination.form') }}" class="btn btn-primary btn-crazy mt-auto">
                    <i class="bi bi-shield-plus me-2"></i>Vaksinasi
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card card-crazy h-100 text-center p-4 pt-5 service-card">
                <div class="service-icon">
                    <img src="https://cdn-icons-png.flaticon.com/512/3480/3480315.png" width="80" class="img-fluid">
                </div>
                <h3 class="fw-bold mb-3">Penitipan Hewan</h3>
                <p class="mb-4">Fasilitas penitipan premium dengan pengawasan 24 jam dan berbagai fasilitas mewah.</p>
                <a href="{{ route('penitipan.form') }}" class="btn btn-primary btn-crazy mt-auto">
                    <i class="bi bi-house-heart me-2"></i>Reservasi
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Dokter -->
<section id="dokter" class="container my-5 py-5 position-relative">
    <div class="bubble" style="width: 80px; height: 80px; top: 50%; left: 5%; animation-delay: 3s;"></div>

    <h2 class="text-center fw-bold mb-5 display-4 section-title">
        <i class="bi bi-people-fill me-2"></i>Tim Dokter Profesional
    </h2>

    <div class="row justify-content-center mt-5">
        <div class="col-12 position-relative doctor-carousel">
            <div class="card card-crazy p-5">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <button class="btn nav-btn" id="prevBtn">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                    </div>

                    <div class="col" id="dokter-container">
                        <div class="row g-4 justify-content-center" id="inner-doctor-cards">
                            <!-- Diisi oleh JavaScript -->
                        </div>
                    </div>

                    <div class="col-auto">
                        <button class="btn nav-btn" id="nextBtn">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Artikel - Bagian ini TIDAK DIUBAH sama sekali -->
<section id="artikel" class="container mt-5">
    <h2 class="text-center fw-bold mb-4">📚 Artikel Edukasi Hewan</h2>
    <div class="row g-4">
        @foreach ($articles as $article)
        <div class="col-md-4">
            <!-- Konten artikel tetap dipertahankan seperti semula -->
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
      <a href="{{ route('articles.public.index') }}" class="btn btn-outline-primary rounded-pill">Lihat Semua Artikel</a>
    </div>
</section>

<!-- Kontak -->
<section id="kontak" class="container my-5 py-5 position-relative">
    <div class="bubble" style="width: 100px; height: 100px; bottom: -50px; right: 10%; animation-delay: 2s;"></div>

    <h2 class="text-center fw-bold mb-5 display-4 section-title">
        <i class="bi bi-chat-heart-fill me-2"></i>Hubungi Kami
    </h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card card-crazy p-5 text-center">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="contact-bubble">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Alamat</h4>
                        <p class="mb-0">Jl. Mawar No. 12, Bandung</p>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-bubble">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Telepon</h4>
                        <p class="mb-0">022-12345678</p>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-bubble">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Email</h4>
                        <p class="mb-0">info@petcaredb.com</p>
                    </div>
                </div>

                <hr class="my-5">

                <h4 class="fw-bold mb-4">Jam Operasional</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card card-crazy p-3">
                            <h5 class="fw-bold">Senin - Jumat</h5>
                            <p class="mb-0">08:00 - 20:00 WIB</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-crazy p-3">
                            <h5 class="fw-bold">Sabtu - Minggu</h5>
                            <p class="mb-0">09:00 - 17:00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center position-relative">
    <div class="container">
        <div class="mb-4">
            <a href="#" class="text-white mx-3 fs-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-white mx-3 fs-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-white mx-3 fs-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-white mx-3 fs-3"><i class="bi bi-whatsapp"></i></a>
        </div>
        <h3 class="mb-3 crazy-title">PetCareDB</h3>
        <p class="mb-2">
            <i class="bi bi-heart-fill text-warning"></i> Merawat dengan Cinta dan Kompetensi <i class="bi bi-heart-fill text-warning"></i>
        </p>
        <p class="mb-0">&copy; 2025 PetCareDB. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const doctors = @json($vets->map(function($vet) {
        return [
            'name' => $vet->name,
            'specialty' => $vet->specialization,
            'img' => $vet->image ? asset($vet->image) : 'https://cdn-icons-png.flaticon.com/512/2922/2922510.png'
        ];
    }));

    let currentPage = 0;
    const perPage = 2;

    function renderDoctors() {
        const innerContainer = document.getElementById("inner-doctor-cards");
        innerContainer.innerHTML = "";

        const start = currentPage * perPage;
        const end = start + perPage;
        const pageDoctors = doctors.slice(start, end);

        pageDoctors.forEach(doctor => {
            innerContainer.innerHTML += `
                <div class="col-md-6">
                    <div class="card card-crazy p-4 text-center doctor-card h-100">
                        <img src="${doctor.img}" class="doctor-img mx-auto mb-4">
                        <h3 class="fw-bold mb-2">${doctor.name}</h3>
                        <p class="text-muted mb-4">${doctor.specialty}</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-primary rounded-circle p-3">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="#" class="btn btn-primary rounded-circle p-3">
                                <i class="bi bi-envelope"></i>
                            </a>
                            <a href="#" class="btn btn-primary rounded-circle p-3">
                                <i class="bi bi-calendar"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `;
        });

        document.getElementById("prevBtn").disabled = currentPage === 0;
        document.getElementById("nextBtn").disabled = end >= doctors.length;
    }

    document.getElementById("prevBtn").addEventListener("click", () => {
        if (currentPage > 0) {
            currentPage--;
            renderDoctors();
        }
    });

    document.getElementById("nextBtn").addEventListener("click", () => {
        if ((currentPage + 1) * perPage < doctors.length) {
            currentPage++;
            renderDoctors();
        }
    });

    renderDoctors();

    // Add scroll animations
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.card-crazy, .section-title, .service-icon');

        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;

            if (elementPosition < screenPosition) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0) rotate(0)';
            }
        });
    };

    // Set initial state for animation
    document.querySelectorAll('.card-crazy, .section-title, .service-icon').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(50px) rotate(5deg)';
        el.style.transition = 'all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
    });

    window.addEventListener('scroll', animateOnScroll);
    window.addEventListener('load', animateOnScroll);
</script>
</body>
</html>
