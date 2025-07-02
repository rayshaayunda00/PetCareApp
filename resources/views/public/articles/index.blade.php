<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikel Edukasi Hewan - PetCareDB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Font -->
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
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-weight: 600;
            font-size: 1.1rem;
        }
        .card-text {
            font-size: 0.9rem;
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
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
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">PetCareDB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Artikel List -->
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Artikel Edukasi Hewan</h2>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill">
            ← Kembali ke Beranda
        </a>
    </div>

    <div class="row g-4">
        @forelse ($articles as $article)
            <div class="col-md-4">
                <div class="card h-100">
                    @if($article->gambar_cover)
                        <img src="{{ asset($article->gambar_cover) }}" class="card-img-top" alt="{{ $article->judul }}">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="card-img-top" alt="cover">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $article->judul }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit(strip_tags($article->isi), 100) }}
                        </p>
                        <div class="mt-auto">
                            <a href="{{ route('articles.public.show', $article->slug) }}" class="btn btn-outline-primary rounded-pill mt-2">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada artikel tersedia.</p>
            </div>
        @endforelse
    </div>

    @if($articles->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    @endif
</div>

</div>

<!-- Footer -->
<footer class="text-center">
    &copy; 2025 PetCareDB. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
