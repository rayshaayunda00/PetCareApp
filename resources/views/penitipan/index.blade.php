@extends('layouts.app')

@section('content')
<style>
    .penitipan-header {
        background: linear-gradient(90deg, #89caff, #a0e0ff);
        padding: 25px;
        border-radius: 20px;
        margin-bottom: 30px;
        text-align: center;
    }

    .penitipan-header h2 {
        font-weight: bold;
        color: #0d6efd;
        margin-bottom: 5px;
    }

    .penitipan-table th {
        vertical-align: middle;
        background-color: #0d6efd;
        color: white;
    }

    .penitipan-table td {
        vertical-align: middle;
    }

    .btn-rounded {
        border-radius: 30px;
    }

    .btn-add {
        background-color: #4caf50;
        color: white;
    }

    .btn-add:hover {
        background-color: #449d48;
        color: white;
    }

    .alert-success {
        border-radius: 10px;
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .penitipan-header h2 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container">
    <div class="penitipan-header shadow-sm">
        <h2><i class="bi bi-house-heart-fill me-2"></i>Data Penitipan Hewan</h2>
        <p class="text-muted">Kelola semua data penitipan hewan di klinik secara rapi dan mudah</p>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('penitipan.create') }}" class="btn btn-add btn-rounded shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Data
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover penitipan-table">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat</th>
                    <th>Nama Hewan</th>
                    <th>Spesies</th>
                    <th>Ras</th>
                    <th>Usia</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($owners as $owner)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $owner->name }}</td>
                        <td>{{ $owner->address }}</td>
                        <td>{{ $owner->pets->first()->name ?? '-' }}</td>
                        <td>{{ $owner->pets->first()->species ?? '-' }}</td>
                        <td>{{ $owner->pets->first()->breed ?? '-' }}</td>
                        <td>{{ $owner->pets->first()->age ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('penitipan.show', $owner->id) }}" class="btn btn-info btn-sm btn-rounded mb-1">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('penitipan.edit', $owner->id) }}" class="btn btn-warning btn-sm btn-rounded mb-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('penitipan.destroy', $owner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data penitipan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
