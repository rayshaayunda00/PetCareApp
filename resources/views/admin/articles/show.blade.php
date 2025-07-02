@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-center mb-5">📰 Detail Artikel Edukasi Hewan</h2>

    <div class="card shadow p-4 mb-4">
        <div class="row g-4">
            <!-- Gambar cover -->
            <div class="col-md-5">
                @if($article->image)
                    <div class="w-100" style="aspect-ratio: 4/3; overflow: hidden; border-radius: 12px;">
                        <img src="{{ asset('storage/' . $article->image) }}"
                             alt="Cover Artikel"
                             class="img-fluid w-100 h-100"
                             style="object-fit: cover;">
                    </div>
                @else
                    <div class="bg-light text-center w-100 py-5 rounded border">
                        <span class="text-muted">Tidak ada gambar cover</span>
                    </div>
                @endif
            </div>

            <!-- Informasi artikel -->
            <div class="col-md-7">
                <h4 class="fw-bold">{{ $article->title }}</h4>
                <p class="text-muted mb-1">Slug: <code>{{ $article->slug }}</code></p>
                <p class="text-muted small">Dibuat pada: {{ $article->created_at->format('d M Y, H:i') }}</p>

                <hr>

                <h5 class="fw-semibold">Isi Artikel:</h5>
                <div class="text-dark" style="line-height: 1.8">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
            ← Kembali ke Daftar Artikel
        </a>
    </div>
</div>
@endsection
