<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $article->title }} - PetCareDB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ Str::limit(strip_tags($article->content), 150) }}">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #3a86ff;
            --secondary: #8338ec;
            --accent: #ff006e;
            --light: #f8f9fa;
            --dark: #212529;
            --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fbfd;
            color: #2d3748;
            line-height: 1.7;
        }

        .navbar {
            background: var(--gradient);
            box-shadow: 0 4px 20px rgba(58, 134, 255, 0.15);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            letter-spacing: 0.5px;
            background: linear-gradient(to right, #fff, #f8f9fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .article-container {
            max-width: 1200px;
            margin: 3rem auto;
        }

        .article-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .article-header h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5rem;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }

        .article-header h1::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }

        .article-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: white;
        }

        .article-image-container {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            height: 0;
            padding-bottom: 70%;
            background: linear-gradient(45deg, #f5f7fa, #e4e8eb);
        }

        .article-cover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .article-cover:hover {
            transform: scale(1.03);
        }

        .no-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #718096;
            font-size: 1.1rem;
        }

        .article-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: #718096;
        }

        .meta-item i {
            margin-right: 0.5rem;
            color: var(--primary);
        }

        .slug-display {
            background: rgba(58, 134, 255, 0.1);
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            font-family: 'Courier New', monospace;
            color: var(--primary);
            font-size: 0.85rem;
        }

        .article-content {
            font-size: 1.1rem;
            color: #4a5568;
        }

        .article-content h2,
        .article-content h3,
        .article-content h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: var(--dark);
            font-family: 'Playfair Display', serif;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .back-button {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 50px;
            padding: 0.7rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(58, 134, 255, 0.1);
            display: inline-flex;
            align-items: center;
            margin-top: 2rem;
        }

        .back-button:hover {
            background: var(--gradient);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(58, 134, 255, 0.2);
        }

        footer {
            background: var(--gradient);
            color: white;
            padding: 3rem 0;
            margin-top: 5rem;
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 0;
            right: 0;
            height: 50px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23f9fbfd' fill-opacity='1' d='M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 768px) {
            .article-header h1 {
                font-size: 2rem;
            }

            .article-content {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- Premium Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">PetCareDB</a>
    </div>
</nav>

<!-- Article Content -->
<div class="container article-container">
    <div class="article-header">
        <h1><i class="fas fa-paw me-2"></i> Detail Artikel Edukasi Hewan</h1>
    </div>

    <div class="card article-card p-4 p-lg-5">
        <div class="row g-5 align-items-start">
            <!-- Article Content -->
            <div class="col-lg-7 order-lg-1 order-2">
                <h2 class="fw-bold mb-3">{{ $article->title }}</h2>

                <div class="article-meta">
                    <div class="meta-item">
                        <i class="fas fa-link"></i>
                        <span>Slug: <span class="slug-display">{{ $article->slug }}</span></span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Dipublikasikan: {{ $article->created_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>

                <hr class="my-4" style="border-top: 1px solid rgba(0,0,0,0.1);">

                <div class="article-content">
                    <h3 class="fw-semibold mb-3">Isi Artikel:</h3>
                    {!! $article->content !!}
                </div>
            </div>

            <!-- Article Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="article-image-container">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}"
                             alt="{{ $article->title }}"
                             class="article-cover">
                    @else
                        <div class="no-image">
                            <i class="fas fa-image fa-2x me-2"></i>
                            <span>Tidak ada gambar</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('articles.public.index') }}" class="back-button">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Artikel
        </a>
    </div>
</div>

<!-- Premium Footer -->
<footer class="text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="mb-4">PetCareDB</h3>
                <p class="mb-4">Sumber terpercaya untuk informasi dan edukasi perawatan hewan peliharaan</p>
                <div class="social-links mb-4">
                    <a href="#" class="text-white mx-2"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#" class="text-white mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white mx-2"><i class="fab fa-instagram fa-lg"></i></a>
                </div>
                <p class="mb-0">&copy; 2025 PetCareDB. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Add smooth scrolling to all links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
</body>
</html>
