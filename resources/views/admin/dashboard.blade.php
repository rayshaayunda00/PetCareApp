@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #fffafc;
    }

    .dashboard-wrapper {
        background: linear-gradient(135deg, #fbe4f5, #e4f1fb, #e2fce9);
        padding: 40px 20px;
        border-radius: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        animation: fadeIn 0.7s ease-in-out;
        margin-bottom: 40px;
    }

    .dashboard-title {
        font-weight: 900;
        font-size: 2.2rem;
        color: #ff69b4;
    }

    .welcome-text {
        font-size: 1.1rem;
        color: #555;
    }

    .dashboard-card {
        background: #fff;
        border-radius: 25px;
        padding: 25px 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
        text-align: center;
        transition: 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .dashboard-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin: 0 auto 15px;
        background-color: #ffe4ec;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        box-shadow: inset 0 0 10px rgba(0,0,0,0.05);
        animation: float 3s ease-in-out infinite;
    }

    .dashboard-label {
        font-size: 1.2rem;
        font-weight: 700;
        color: #444;
    }

    .dashboard-desc {
        font-size: 0.95rem;
        color: #777;
        margin-bottom: 15px;
    }

    .btn-pill {
        border-radius: 50px;
        padding: 8px 20px;
        font-weight: 600;
        font-size: 0.9rem;
        white-space: nowrap;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 1.8rem;
        }
        .dashboard-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
        .btn-pill {
            padding: 6px 14px;
            font-size: 0.85rem;
        }
    }
</style>

<div class="container dashboard-wrapper">
    <div class="text-center mb-5">
        <h1 class="dashboard-title">🐾 Halo, {{ Auth::user()->name }}!</h1>
        <p class="welcome-text">😺 Role: <strong>{{ Auth::user()->role }}</strong> • Selamat datang di PetCareRaysha!</p>
    </div>

    <div class="row g-4 justify-content-center">

        <!-- Penitipan -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
            <div class="dashboard-card w-100">
                <div class="dashboard-icon" style="background-color: #ffdde8;">
                    🏠
                </div>
                <div class="dashboard-label">Penitipan</div>
                <div class="dashboard-desc">Pantau hewan-hewan lucu 🐶</div>
                <a href="{{ route('penitipan.index') }}" class="btn btn-outline-danger btn-pill mt-auto">Masuk</a>
            </div>
        </div>

        <!-- Vaksinasi -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
            <div class="dashboard-card w-100">
                <div class="dashboard-icon" style="background-color: #ffe7cd;">
                    💉
                </div>
                <div class="dashboard-label">Vaksinasi</div>
                <div class="dashboard-desc">Proteksi lengkap untuk hewanmu 🐕</div>
                <a href="{{ route('vaccination.index') }}" class="btn btn-warning btn-pill mt-auto">Masuk</a>
            </div>
        </div>

        <!-- Pemeriksaan -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
            <div class="dashboard-card w-100">
                <div class="dashboard-icon" style="background-color: #d1f8e0;">
                    ❤️
                </div>
                <div class="dashboard-label">Pemeriksaan</div>
                <div class="dashboard-desc">Catat hasil periksa & diagnosa 🩺</div>
                <a href="{{ route('checkup.index') }}" class="btn btn-success btn-pill mt-auto">Masuk</a>
            </div>
        </div>

        <!-- Dokter -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
            <div class="dashboard-card w-100">
                <div class="dashboard-icon" style="background-color: #d8d3f8;">
                    👩‍⚕️
                </div>
                <div class="dashboard-label">Dokter</div>
                <div class="dashboard-desc">Kelola profil dokter 🐾</div>
                <a href="{{ url('admin/dokter') }}" class="btn btn-secondary btn-pill mt-auto">Masuk</a>
            </div>
        </div>

        <!-- Artikel -->
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
            <div class="dashboard-card w-100">
                <div class="dashboard-icon" style="background-color: #ffe3f0;">
                    📚
                </div>
                <div class="dashboard-label">Artikel</div>
                <div class="dashboard-desc">Kelola artikel edukasi hewan 🐾</div>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-info btn-pill mt-auto text-white">Masuk</a>
            </div>
        </div>

    </div>
</div>
@endsection
