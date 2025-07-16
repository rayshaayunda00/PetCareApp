<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikel Edukasi Hewan - PetCareRaysha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kumpulan artikel edukasi tentang perawatan hewan peliharaan">

    <!-- Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #1e67a8;
            --secondary-color: #4d9fda;
            --accent-color: #ff7e5f;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand i {
            font-size: 1.8rem;
        }

        .hero-section {
            background: linear-gradient(rgba(30, 103, 168, 0.85), rgba(77, 159, 218, 0.85)),
                        url('https://images.unsplash.com/photo-1450778869180-41d0601e046e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            border-radius: 0 0 30px 30px;
            margin-bottom: 40px;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            overflow: hidden;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 0.75rem;
            color: var(--primary-color);
        }

        .card-text {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 1.25rem;
            flex-grow: 1;
        }

        .btn-article {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            align-self: flex-start;
        }

        .btn-article:hover {
            background-color: var(--secondary-color);
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline-secondary {
            border-radius: 50px;
            padding: 8px 20px;
            font-weight: 500;
        }

        .page-title {
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-color), var(--secondary-color));
            border-radius: 2px;
        }

        .empty-state {
            padding: 60px 0;
            text-align: center;
        }

        .empty-state i {
            font-size: 5rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        footer {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 40px 0 20px;
            margin-top: 80px;
        }

        .footer-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .social-icons a:hover {
            transform: translateY(-5px);
            color: var(--accent-color);
        }

        .pagination .page-link {
            color: var(--primary-color);
            border-radius: 50px !important;
            margin: 0 5px;
            border: none;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            color: white;
        }

        .pagination .page-link:hover {
            background-color: #e9ecef;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0;
                border-radius: 0 0 20px 20px;
            }

            .card-img-top {
                height: 160px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-paw"></i>
            PetCareRaysha
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">Artikel Edukasi Hewan</h1>
        <p class="lead mb-4">Temukan informasi terbaik untuk merawat hewan peliharaan Anda</p>
    </div>
</section>

<!-- Artikel List -->
<div class="container mb-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="page-title fw-bold">📖 Artikel Terbaru</h2>
            <p class="text-muted">Temukan berbagai tips dan informasi seputar perawatan hewan</p>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
        </a>
    </div>

    <div class="row g-4">
        @forelse ($articles as $article)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" class="card-img-top" alt="cover">
                    @endif
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <small class="text-muted"><i class="far fa-calendar-alt me-2"></i>{{ $article->created_at->format('d M Y') }}</small>
                        </div>
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">
                            {{ Str::limit(strip_tags($article->content), 120) }}
                        </p>
                        <a href="{{ route('articles.public.show', $article->slug) }}" class="btn btn-article mt-auto">
                            Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="far fa-newspaper"></i>
                    <h3 class="fw-bold mb-3">Belum ada artikel tersedia</h3>
                    <p class="text-muted">Kami akan segera menambahkan konten edukasi tentang hewan peliharaan</p>
                </div>
            </div>
        @endforelse
    </div>

    @if($articles->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    @endif
</div>

<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <p class="mb-3">PetCareRaysha - Solusi lengkap perawatan hewan peliharaan Anda</p>
        <p class="mb-0">&copy; 2025 PetCareRaysha. All Rights Reserved.</p>
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
