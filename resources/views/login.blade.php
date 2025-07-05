<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - PetCareApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Fredoka+One&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue1: #0B4F6C;
            --blue2: #01BAEF;
            --blue3: #5BC0EB;
            --blue4: #B9E6FF;
            --accent: #FFD166;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--blue1), var(--blue2));
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .navbar {
            background: linear-gradient(90deg, var(--blue1), var(--blue2));
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border-radius: 0 0 30px 30px;
        }

        .navbar-brand {
            font-family: 'Fredoka One', cursive;
            font-size: 2rem;
            background: linear-gradient(to right, var(--blue4), white);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 0 rgba(0,0,0,0.2);
            transform: rotate(-5deg);
        }

        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 100px 20px;
            position: relative;
        }

        .login-box {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
            position: relative;
            z-index: 2;
            border: 3px solid white;
            transform-style: preserve-3d;
            transition: all 0.5s;
        }

        .login-box:hover {
            transform: translateY(-10px) rotate(2deg);
            box-shadow: 0 30px 60px rgba(0,0,0,0.3);
        }

        .login-box::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 15px;
            bottom: 0;
            left: 0;
            background: linear-gradient(90deg, var(--blue2), var(--blue3));
            border-radius: 0 0 30px 30px;
            transition: all 0.3s;
            z-index: -1;
        }

        .login-box:hover::before {
            height: 20px;
        }

        .login-title {
            font-family: 'Fredoka One', cursive;
            font-weight: 600;
            color: var(--blue1);
            margin-bottom: 20px;
            font-size: 2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .pet-icon {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 20px;
            animation: bounce 2s infinite alternate;
            filter: drop-shadow(0 10px 10px rgba(0,0,0,0.2));
        }

        @keyframes bounce {
            from { transform: translateY(0) rotate(-5deg); }
            to { transform: translateY(-20px) rotate(5deg); }
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group i {
            position: absolute;
            left: 20px;
            top: 15px;
            color: var(--blue2);
            font-size: 1.2rem;
            z-index: 2;
        }

        .form-control {
            padding-left: 50px;
            height: 50px;
            border-radius: 50px;
            border: 2px solid var(--blue4);
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--blue2);
            box-shadow: 0 0 0 0.3rem rgba(91,192,235,.3);
            transform: scale(1.02);
        }

        .btn-login {
            background: linear-gradient(45deg, var(--blue2), var(--blue3));
            border: none;
            color: white;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 15px;
            border-radius: 50px;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .btn-login:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
            color: white;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--blue3), var(--blue2));
            opacity: 0;
            transition: all 0.3s;
            z-index: -1;
        }

        .btn-login:hover::before {
            opacity: 1;
        }

        footer {
            background: linear-gradient(90deg, var(--blue1), var(--blue2));
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 0;
            width: 100%;
            height: 40px;
            background: url("data:image/svg+xml,%3Csvg viewBox='0 0 1200 120' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' fill='%23ffffff' opacity='.25'/%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' fill='%23ffffff' opacity='.5'/%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='%23ffffff'/%3E%3C/svg%3E");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            animation: float 10s infinite ease-in-out;
            z-index: 1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.1); }
        }

        .error-msg {
            background: rgba(220,53,69,0.9);
            color: white;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        @media (max-width: 768px) {
            .login-box {
                padding: 30px 20px;
                max-width: 90%;
            }

            .pet-icon {
                width: 80px;
                height: 80px;
            }

            .login-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

<!-- Floating Bubbles -->
<div class="bubble" style="width: 100px; height: 100px; top: 20%; left: 10%; animation-delay: 0s;"></div>
<div class="bubble" style="width: 150px; height: 150px; top: 60%; right: 10%; animation-delay: 2s;"></div>
<div class="bubble" style="width: 80px; height: 80px; top: 40%; right: 20%; animation-delay: 4s;"></div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">PetCareApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/#layanan') }}">Layanan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/#dokter') }}">Dokter</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articles.public.index') }}">Artikel</a></li>
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
            <div class="error-msg">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <i class="bi bi-envelope-fill"></i>
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="form-group">
                <i class="bi bi-lock-fill"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i> Login
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
