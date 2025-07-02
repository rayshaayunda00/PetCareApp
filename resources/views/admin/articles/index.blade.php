@extends('layouts.app')

@section('content')
<style>
    .card-articles {
        background: linear-gradient(120deg, #e3f2fd, #fce4ec);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        animation: fadeIn 0.6s ease;
    }

    .table thead {
        background-color: #bbdefb;
    }

    .btn-gacor {
        border-radius: 30px;
        padding: 6px 16px;
        font-weight: 600;
    }

    .btn-gacor-info {
        background-color: #81d4fa;
        color: #000;
    }

    .btn-gacor-warning {
        background-color: #fff59d;
        color: #000;
    }

    .btn-gacor-danger {
        background-color: #ef9a9a;
        color: #000;
    }

    .btn-gacor-info:hover {
        background-color: #4fc3f7;
    }

    .btn-gacor-warning:hover {
        background-color: #ffe082;
    }

    .btn-gacor-danger:hover {
        background-color: #e57373;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="container py-4">
    <div class="card-articles">
        <h2 class="fw-bold text-center mb-4">📚 Daftar Artikel Edukasi Hewan 🐾</h2>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-gacor">+ Tambah Artikel</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
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
                            <td><code>{{ $article->slug }}</code></td>
                            <td>
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar" width="90" style="border-radius: 10px;">
                                @else
                                    <span class="text-muted fst-italic">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($article->created_at)->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.articles.show', $article->id) }}" class="btn btn-gacor btn-sm btn-gacor-info mb-1">Detail</a>
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-gacor btn-sm btn-gacor-warning mb-1">Edit</a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini? 😢')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-gacor btn-sm btn-gacor-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada artikel yang ditambahkan 🐶</td>
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
</div>
@endsection
