<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCareDB - Klinik Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        h2 {
            margin-top: 30px;
            font-weight: bold;
            color: #333;
        }
        p.text-center {
            color: #666;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">PetCareDB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Dokter Hewan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Selamat Datang di Klinik Hewan PetCareDB</h2>
        <p class="text-center">Sistem informasi perawatan hewan terpercaya untuk semua pemilik hewan kesayangan.</p>

        <div class="row mt-5 g-4">
            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data Hewan</h5>
                        <p class="card-text">Lihat dan kelola data hewan peliharaan.</p>
                        <a href="#" class="btn btn-primary">Lihat Data Hewan</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data Pemilik</h5>
                        <p class="card-text">Lihat dan kelola data pemilik hewan.</p>
                        <a href="#" class="btn btn-primary">Lihat Data Pemilik</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Data Dokter Hewan</h5>
                        <p class="card-text">Lihat dan kelola data dokter hewan.</p>
                        <a href="#" class="btn btn-primary">Lihat Data Dokter</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Pemeriksaan</h5>
                        <p class="card-text">Lihat dan kelola data pemeriksaan hewan.</p>
                        <a href="#" class="btn btn-primary">Lihat Riwayat Pemeriksaan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
