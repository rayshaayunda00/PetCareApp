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
        .card-no-hover {
    border: none;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
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
    <li class="nav-item"><a class="nav-link" href="#artikel">Artikel</a></li> <!-- ✅ Tambahan ini -->
    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>

    @guest
        <li class="nav-item">
            <a class="nav-link btn btn-light text-dark btn-sm ms-2" href="{{ route('login') }}">Login</a>
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

<section class="hero text-center">
  <div class="container">
    <!-- Ganti ikon statis dengan GIF animasi -->
   <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Pet Icon" class="mb-4" style="max-width:120px;">

    <h1 class="display-5 fw-bold">Selamat Datang di Klinik Hewan PetCareDB</h1>
    <p class="lead">Kami merawat hewan kesayangan Anda dengan penuh kasih 🐾</p>
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
{{-- <section id="dokter" class="container mt-5">
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
</section> --}}
<!-- Dokter -->
<section id="dokter" class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Dokter Kami</h2>
    <div class="row justify-content-center">
        <div class="col-md-10 position-relative">
            <div class="card p-4 shadow-sm" style="border-radius: 20px;">
                <div class="row align-items-center">
                    <!-- Tombol kiri -->
                    <div class="col-auto">
                        <button class="btn btn-outline-secondary btn-lg" id="prevBtn">
                            &larr;
                        </button>
                    </div>

                    <!-- Card dokter isi -->
                    <div class="col" id="dokter-container">
                        <div class="row g-4 justify-content-center" id="inner-doctor-cards">
                            <!-- Diisi oleh JavaScript -->
                        </div>
                    </div>

                    <!-- Tombol kanan -->
                    <div class="col-auto">
                        <button class="btn btn-outline-primary btn-lg" id="nextBtn">
                            &rarr;
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Artikel Edukasi Hewan -->
<section id="artikel" class="container mt-5">
    <h2 class="text-center fw-bold mb-4">📚 Artikel Edukasi Hewan</h2>
    <div class="row g-4">
        @foreach ($articles as $article)
        <div class="col-md-4">

        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
      <a href="{{ route('articles.public.index') }}" class="btn btn-outline-primary rounded-pill">Lihat Semua Artikel</a>
    </div>
</section>


<!-- Kontak -->
<section id="kontak" class="container mt-5 mb-5">
    <h2 class="text-center fw-bold mb-4">Kontak Kami</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 text-center shadow-sm" style="border-radius: 20px;">
                <img src="https://cdn-icons-png.flaticon.com/512/535/535137.png" width="70" class="mx-auto mb-3">
                <h5 class="fw-semibold">Klinik Hewan PetCareDB</h5>
                <p class="mb-2"><i class="bi bi-geo-alt-fill me-2 text-primary"></i>Jl. Mawar No. 12, Bandung</p>
                <p class="mb-2"><i class="bi bi-telephone-fill me-2 text-success"></i>022-12345678</p>
                <p class="mb-0"><i class="bi bi-envelope-fill me-2 text-danger"></i>info@petcaredb.com</p>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="text-center">
    &copy; 2025 PetCareDB. All Rights Reserved.
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
                    <div class="card p-3 text-center">
                        <img src="${doctor.img}" width="250 #" class="mx-auto mt-3  shadow-sm">
                        <h5 class="mt-3 fw-semibold">${doctor.name}</h5>
                        <p>${doctor.specialty}</p>
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
</script>

</body>
</html>
