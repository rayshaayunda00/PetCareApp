@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Daftar Artikel Edukasi</h2>

    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">+ Tambah Artikel</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Gambar</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->slug }}</td>
                    <td>
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar" width="100">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada artikel yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($articles->hasPages())
    <div class="mt-4 d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
    @endif
</div>
@endsection
