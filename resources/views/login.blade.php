<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - PetCareApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #1e67a8, #57a3d9);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: linear-gradient(90deg, #4d9fda, #1e67a8);
        }

        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }

        .login-box {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            position: relative;
            text-align: center;
        }

        .login-title {
            font-weight: 600;
            color: #1e67a8;
            margin-bottom: 10px;
        }

        .login-box img.pet-icon {
            width: 70px;
            margin-bottom: 15px;
        }

        .form-group {
            position: relative;
            text-align: left;
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 10px;
            color: #999;
        }

        .form-control {
            padding-left: 36px;
        }

        .form-control:focus {
            border-color: #1e67a8;
            box-shadow: 0 0 0 0.2rem rgba(30,103,168,.25);
        }

        .btn-primary {
            background-color: #1e67a8;
            border: none;
        }

        .btn-primary:hover {
            background-color: #155d92;
        }

        footer {
            background: #1e67a8;
            color: white;
            padding: 16px 0;
            text-align: center;
            font-size: 14px;
        }

        .error-msg {
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">PetCareApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/#layanan') }}">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/#dokter') }}">Dokter Hewan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/#kontak') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Login Content -->
<div class="login-container">
    <div class="login-box">
        <!-- Icon PetCareApp dari internet -->
        <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="PetCareApp Icon" class="pet-icon">
        <h4 class="login-title">Login Admin / User</h4>

        @if($errors->any())
            <div class="alert alert-danger text-center error-msg">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <i class="bi bi-envelope-fill"></i>
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="form-group mb-4">
                <i class="bi bi-lock-fill"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer>
    &copy; {{ date('Y') }} PetCareApp. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
