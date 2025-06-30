@extends('layouts.app')

@section('content')
<style>
    .dashboard-wrapper {
        background: linear-gradient(to right, #e3f2fd, #fce4ec);
        padding: 40px 20px;
        border-radius: 20px;
    }

    .dashboard-title {
        font-weight: 700;
        font-size: 2rem;
        color: #1e67a8;
    }

    .welcome-text {
        font-size: 1.1rem;
        color: #555;
    }

    .dashboard-card {
        background-color: white;
        border: none;
        border-radius: 20px;
        padding: 30px 20px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
        text-align: center;
        transition: 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.1);
    }

    .dashboard-icon {
        font-size: 3.5rem;
        background-color: #f0f8ff;
        color: #1e67a8;
        border-radius: 50%;
        padding: 20px;
        margin-bottom: 15px;
        display: inline-block;
    }

    .dashboard-label {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .dashboard-desc {
        font-size: 0.95rem;
        color: #777;
        margin-bottom: 12px;
    }

    .btn-pink {
        background-color: #ffb6c1;
        color: white;
        border: none;
    }

    .btn-pink:hover {
        background-color: #f590a0;
        color: white;
    }

    .btn-sky {
        background-color: #89caff;
        color: white;
        border: none;
    }

    .btn-sky:hover {
        background-color: #5ab0f7;
        color: white;
    }

    .btn-mint {
        background-color: #95f1c2;
        color: #06623b;
        border: none;
    }

    .btn-mint:hover {
        background-color: #7ce4af;
        color: #06623b;
    }
</style>

<div class="container dashboard-wrapper">
    <div class="text-center mb-5">
        <h1 class="dashboard-title">🎉 Selamat Datang di Dashboard Admin PetCareDB!</h1>
        <p class="welcome-text">Halo, <strong>{{ Auth::user()->name }}</strong> 🐾 (Role: {{ Auth::user()->role }})</p>
    </div>

    <div class="row g-4 justify-content-center">

        <!-- Penitipan -->
        <div class="col-md-4 col-sm-6">
            <div class="dashboard-card">
                <div class="dashboard-icon" style="background-color: #d0ebff; color: #0d6efd;">
                    <i class="bi bi-house-heart-fill"></i>
                </div>
                <div class="dashboard-label">Penitipan Hewan</div>
                <div class="dashboard-desc">Pantau data penitipan aktif.</div>
                <a href="{{ route('penitipan.index') }}" class="btn btn-sky rounded-pill px-4">Lihat</a>
            </div>
        </div>

        <!-- Vaksinasi -->
        <div class="col-md-4 col-sm-6">
            <div class="dashboard-card">
                <div class="dashboard-icon" style="background-color: #ffe0f0; color: #e83e8c;">
                    <i class="bi bi-capsule-pill"></i>
                </div>
                <div class="dashboard-label">Vaksinasi</div>
                <div class="dashboard-desc">Jaga kesehatan hewan dari penyakit.</div>
                <a href="{{ route('vaccination.index') }}" class="btn btn-pink rounded-pill px-4">Lihat</a>
            </div>
        </div>

        <!-- Periksa Kesehatan -->
        <div class="col-md-4 col-sm-6">
            <div class="dashboard-card">
                <div class="dashboard-icon" style="background-color: #e0f7f4; color: #0ca678;">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <div class="dashboard-label">Periksa Kesehatan</div>
                <div class="dashboard-desc">Lihat hasil & riwayat pemeriksaan.</div>
                <a href="{{ route('checkup.index') }}" class="btn btn-mint rounded-pill px-4">Lihat</a>
            </div>
        </div>

    </div>
</div>
@endsection
