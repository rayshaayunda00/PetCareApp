@extends('layouts.app')

@section('content')
<style>
    .form-article {
        background: linear-gradient(135deg, #d4f1f9, #f9e9ff);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.8s ease-in-out;
    }

    .form-article h2 {
        color: #3f51b5;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .form-article label {
        font-weight: 600;
    }

    .form-article .btn-primary {
        background-color: #3f51b5;
        border: none;
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .form-article .btn-primary:hover {
        background-color: #283593;
    }

    .cute-emoji {
        font-size: 1.5rem;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container py-4">
    <div class="form-article">
        <h2 class="text-center">
            📝 Tambah Artikel Baru <span class="cute-emoji">✨🐾</span>
        </h2>

        {{-- Error Alert --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>🐶 {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Judul Artikel</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Isi Artikel</label>
                <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar Cover (Opsional)</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary rounded-pill">
                    ← Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    🚀 Simpan Artikel Sekarang!
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
