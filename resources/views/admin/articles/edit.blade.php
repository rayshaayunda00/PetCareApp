@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Edit Artikel: {{ $article->judul }}</h2>

    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" name="judul" class="form-control" value="{{ $article->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar_cover" class="form-label">Gambar Cover</label>
            <input type="file" name="gambar_cover" class="form-control">
            @if($article->gambar_cover)
                <img src="{{ asset($article->gambar_cover) }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Artikel</label>
            <textarea name="isi" class="form-control" rows="7" required>{{ $article->isi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
