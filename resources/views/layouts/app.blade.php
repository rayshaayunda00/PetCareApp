<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PetCareDB Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            width: 240px;
            background-color: #1e67a8;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            color: #fff;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 12px 20px;
            display: block;
            border-left: 4px solid transparent;
            transition: background 0.3s, border-left-color 0.3s;
        }

        .sidebar .nav-link:hover {
            background-color: #155d92;
            border-left-color: #fff;
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .main-content {
            margin-left: 240px;
            padding: 30px;
        }

        .logout-form {
            padding: 10px 20px;
        }

        .logout-btn {
            width: 100%;
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 6px;
            transition: background-color 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }

        footer {
            margin-top: 80px;
            text-align: center;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <i class="bi bi-hospital-fill me-2"></i>PetCareDB
        </div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <a href="{{ route('penitipan.index') }}" class="nav-link">
            <i class="bi bi-box-seam me-2"></i> Penitipan
        </a>
        <a href="{{ route('vaccination.index') }}" class="nav-link">
            <i class="bi bi-capsule-pill me-2"></i> Vaksinasi
        </a>
        <a href="{{ route('checkup.index') }}" class="nav-link">
            <i class="bi bi-heart-pulse me-2"></i> Periksa Kesehatan
        </a>
        <a href="{{ route('doctors.index') }}" class="nav-link">
    <i class="bi bi-person-badge me-2"></i> Dokter
</a>


        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')

        <footer>
            &copy; {{ date('Y') }} PetCareDB. All rights reserved.
        </footer>
    </div>

</body>
</html>
