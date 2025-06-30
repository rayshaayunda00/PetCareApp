@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Data Dokter</h2>

        @if(Auth::user()->role !== 'admin_super')
            <a href="{{ route('doctors.create') }}" class="btn btn-primary rounded-pill">
                <i class="bi bi-plus-lg"></i> Tambah Dokter
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Spesialisasi</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vets as $vet)
                            <tr>
                                <td>
                                    @if ($vet->image)
                                        <img src="{{ asset($vet->image) }}" width="100" class="shadow-sm" alt="Foto Dokter">
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>{{ $vet->name }}</td>
                                <td>{{ $vet->specialization }}</td>
                                <td>{{ $vet->phone }}</td>
                                <td>
    @if(Auth::user()->role !== 'admin_super')
        <a href="{{ route('doctors.edit', $vet->id) }}" class="btn btn-sm btn-warning rounded-pill">
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
        <span class="text-muted">Tidak tersedia</span>
    @endif
</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data dokter.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
