@extends('layouts.app')

@section('content')
<style>
    .penitipan-header {
        background: linear-gradient(90deg, #89caff, #a0e0ff);
        padding: 25px;
        border-radius: 20px;
        margin-bottom: 30px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
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
        text-align: center;
    }

    .penitipan-table td {
        vertical-align: middle;
    }

    .btn-rounded {
        border-radius: 30px;
    }

    .btn-add {
        background-color: #28a745;
        color: white;
    }

    .btn-add:hover {
        background-color: #218838;
        color: white;
    }

    .btn-danger {
        background-color: #e74c3c;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .alert-success {
        border-radius: 10px;
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
        background-color: white;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f9ff;
    }

    @media (max-width: 768px) {
        .penitipan-header h2 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container">
    <div class="penitipan-header">
        <h2><i class="bi bi-house-heart-fill me-2"></i>Data Penitipan Hewan</h2>
        <p class="text-muted">Kelola semua data penitipan hewan di klinik secara rapi dan mudah</p>
    </div>

    <div class="d-flex justify-content-end mb-3">
        
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover penitipan-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat</th>
                    <th>Nama Hewan</th>
                    <th>Spesies</th>
                    <th>Ras</th>
                    <th>Usia</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($owners as $owner)
                    @php
                        $pet = $owner->pets->first();
                        $penitipan = $pet?->penitipan;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $owner->name }}</td>
                        <td>{{ $owner->address }}</td>
                        <td>{{ $pet->name ?? '-' }}</td>
                        <td>{{ $pet->species ?? '-' }}</td>
                        <td>{{ $pet->breed ?? '-' }}</td>
                        <td>{{ $pet->age ?? '-' }}</td>
                        <td>{{ $penitipan ? \Carbon\Carbon::parse($penitipan->start_date)->format('d-m-Y') : '-' }}</td>
                        <td>{{ $penitipan && $penitipan->end_date ? \Carbon\Carbon::parse($penitipan->end_date)->format('d-m-Y') : '-' }}</td>
                        <td class="text-center">
                            <form action="{{ route('penitipan.destroy', $owner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted">Belum ada data penitipan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
