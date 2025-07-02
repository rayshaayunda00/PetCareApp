@extends('layouts.app')

@section('content')
<style>
    .dashboard-wrapper {
        background: linear-gradient(120deg, #e3f2fd, #fce4ec, #e0f7f4);
        padding: 40px 20px;
        border-radius: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        animation: fadeIn 1s ease-in-out;
    }

    .dashboard-title {
        font-weight: 800;
        font-size: 2.2rem;
        color: #0d6efd;
    }

    .welcome-text {
        font-size: 1.15rem;
        color: #444;
    }

    .dashboard-card {
        background: white;
        border: none;
        border-radius: 25px;
        padding: 30px 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
    }

    .dashboard-icon {
        font-size: 3.2rem;
        border-radius: 50%;
        padding: 20px;
        margin-bottom: 15px;
        display: inline-block;
        transition: transform 0.3s;
    }

    .dashboard-card:hover .dashboard-icon {
        transform: rotate(10deg) scale(1.1);
    }

    .dashboard-label {
        font-size: 1.3rem;
        font-weight: 700;
        color: #333;
    }

    .dashboard-desc {
        font-size: 0.95rem;
        color: #777;
        margin-bottom: 15px;
    }

    .btn-pill {
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container dashboard-wrapper">
    <div class="text-center mb-5">
        <h1 class="dashboard-title">🎉 Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="welcome-text">🩺 Role: <strong>{{ Auth::user()->role }}</strong> • Siap mengelola klinik hewanmu hari ini?</p>
    </div>

    <div class="row g-4 justify-content-center">

        <!-- Penitipan -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card">
                <div class="dashboard-icon bg-primary text-white">
                    <i class="bi bi-house-heart-fill"></i>
                </div>
                <div class="dashboard-label">Penitipan</div>
                <div class="dashboard-desc">Pantau hewan yang sedang dititipkan.</div>
                <a href="{{ route('penitipan.index') }}" class="btn btn-primary btn-pill">Masuk</a>
            </div>
        </div>

        <!-- Vaksinasi -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card">
                <div class="dashboard-icon bg-pink text-white" style="background-color:#ff91a4;">
                    <i class="bi bi-capsule-pill"></i>
                </div>
                <div class="dashboard-label">Vaksinasi</div>
                <div class="dashboard-desc">Jadwal dan histori vaksinasi.</div>
                <a href="{{ route('vaccination.index') }}" class="btn btn-danger btn-pill">Masuk</a>
            </div>
        </div>

        <!-- Periksa Kesehatan -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card">
                <div class="dashboard-icon text-white" style="background-color:#20c997;">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <div class="dashboard-label">Pemeriksaan</div>
                <div class="dashboard-desc">Catatan dan diagnosa kesehatan.</div>
                <a href="{{ route('checkup.index') }}" class="btn btn-success btn-pill">Masuk</a>
            </div>
        </div>

        <!-- Dokter -->
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-card">
                <div class="dashboard-icon text-white" style="background-color:#6f42c1;">
                    <i class="bi bi-person-badge-fill"></i>
                </div>
                <div class="dashboard-label">Dokter</div>
                <div class="dashboard-desc">Kelola profil dokter klinik.</div>
                <a href="{{ url('admin/dokter') }}" class="btn btn-secondary btn-pill">Masuk</a>
            </div>
        </div>

    </div>
</div>
@endsection
