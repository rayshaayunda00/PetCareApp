<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->judul }} - PetCareDB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            line-height: 1.8;
        }
        .navbar {
            background: linear-gradient(90deg, #4d9fda, #1e67a8);
        }
        .content-wrapper {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .article-cover {
            max-height: 400px;
            object-fit: cover;
            border-radius: 15px;
        }
        footer {
            background: #1e67a8;
            color: white;
            padding: 20px 0;
            border-radius: 30px 30px 0 0;
            margin-top: 50px;
        }
        .btn-back {
            border-radius: 30px;
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

<!-- Artikel Detail -->
<div class="container my-5">
    <div class="content-wrapper">
        <a href="{{ route('articles.public.index') }}" class="btn btn-outline-secondary mb-3 btn-back">&larr; Kembali ke Artikel</a>

        <h1 class="fw-bold">{{ $article->judul }}</h1>
        <p class="text-muted small">Dipublikasikan pada {{ $article->created_at->format('d M Y') }}</p>

        @if($article->gambar_cover)
            <img src="{{ asset($article->gambar_cover) }}" alt="{{ $article->judul }}" class="img-fluid mb-4 article-cover">
        @endif

        <div class="article-content">
            {!! $article->isi !!}
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center">
    &copy; 2025 PetCareDB. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
