<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }} - PetCareDB</title>
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
        }
        .article-cover {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        footer {
            background: #1e67a8;
            color: white;
            padding: 20px 0;
            border-radius: 30px 30px 0 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">PetCareDB</a>
    </div>
</nav>

<!-- Detail Artikel -->
<div class="container my-5">
    <h2 class="fw-bold mb-4 text-center">📖 Detail Artikel Edukasi Hewan</h2>

    <div class="card p-4">
        <div class="row g-4 align-items-start">
            <!-- Informasi artikel -->
            <div class="col-md-7">
                <h3 class="fw-bold">{{ $article->title }}</h3>
                <p class="text-muted mb-1">Slug: <code>{{ $article->slug }}</code></p>
                <p class="text-muted small">Dipublikasikan: {{ $article->created_at->format('d M Y, H:i') }}</p>

                <div class="mt-4">
                    <h5 class="fw-semibold">Isi Artikel:</h5>
                    <div class="text-dark" style="line-height: 1.8">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>

            <!-- Gambar artikel -->
            <div class="col-md-5">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel" class="article-cover">
                @else
                    <div class="text-muted text-center">Tidak ada gambar</div>
                @endif
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('articles.public.index') }}" class="btn btn-outline-secondary rounded-pill">← Kembali ke Daftar Artikel</a>
    </div>
</div>

<!-- Footer -->
<footer class="text-center">
    &copy; 2025 PetCareDB. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
