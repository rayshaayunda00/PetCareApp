@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Edit Artikel</h2>

    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div class="mb-3">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <!-- Isi -->
        <div class="mb-3">
            <label for="content" class="form-label">Isi Artikel</label>
            <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <!-- Gambar -->
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Cover (Opsional)</label><br>
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="cover" width="150" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control" id="image">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Artikel</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
