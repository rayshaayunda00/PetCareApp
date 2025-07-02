@extends('layouts.app')

@section('content')
<style>
    .doctor-header {
        background: linear-gradient(90deg, #cdefff, #a2dcf4);
        padding: 25px;
        border-radius: 20px;
        margin-bottom: 30px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .doctor-header h2 {
        font-weight: bold;
        color: #0d6efd;
        margin-bottom: 5px;
    }

    .btn-primary.rounded-pill {
        background-color: #007bff;
        border: none;
    }

    .btn-primary.rounded-pill:hover {
        background-color: #0069d9;
    }

    .table td img {
        border-radius: 10px;
    }

    .badge-muted {
        background-color: #f5f5f5;
        color: #6c757d;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 0.85rem;
    }

    .alert-success {
        border-radius: 10px;
        font-weight: 500;
        text-align: center;
    }

    @media (max-width: 768px) {
        .doctor-header h2 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container">
    <div class="doctor-header shadow-sm">
        <h2><i class="bi bi-person-badge-fill me-2"></i>Data Dokter Klinik</h2>
        <p class="text-muted">Pantau dan kelola semua data dokter hewan di klinik</p>
        @if(Auth::user()->role !== 'admin_super')
            <a href="{{ route('doctors.create') }}" class="btn btn-primary btn-sm mt-3 rounded-pill">
                <i class="bi bi-plus-circle"></i> Tambah Dokter
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Spesialisasi</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vets as $vet)
                            <tr>
                                <td>
                                    @if ($vet->image)
                                        <img src="{{ asset($vet->image) }}" width="90" class="shadow-sm" alt="Foto Dokter">
                                    @else
                                        <span class="badge-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>{{ $vet->name }}</td>
                                <td>{{ $vet->specialization }}</td>
                                <td>{{ $vet->phone }}</td>
                                <td>
                                    @if(Auth::user()->role !== 'admin_super')
                                        <a href="{{ route('doctors.edit', $vet->id) }}" class="btn btn-sm btn-warning rounded-pill me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('doctors.destroy', $vet->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus dokter ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger rounded-pill">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="badge-muted">Tidak tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted text-center">Belum ada data dokter.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
