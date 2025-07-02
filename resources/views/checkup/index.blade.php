@extends('layouts.app')

@section('content')
<style>
    .checkup-header {
        background: linear-gradient(90deg, #ffd6e8, #fcb3c9);
        padding: 25px;
        border-radius: 20px;
        margin-bottom: 30px;
        text-align: center;
    }

    .checkup-header h2 {
        font-weight: bold;
        color: #dc3545;
        margin-bottom: 5px;
    }

    .checkup-table th {
        vertical-align: middle;
        background-color: #ff5c8d;
        color: white;
    }

    .checkup-table td {
        vertical-align: middle;
    }

    .alert-success {
        border-radius: 10px;
    }

    .btn-danger {
        background-color: #ff4d6d;
        border: none;
    }

    .btn-danger:hover {
        background-color: #e24361;
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
    }

    .icon-pet {
        font-size: 1.3rem;
        margin-right: 6px;
    }

    @media (max-width: 768px) {
        .checkup-header h2 {
            font-size: 1.4rem;
        }
    }
</style>

<div class="container">
    <div class="checkup-header shadow-sm">
        <h2><i class="bi bi-heart-pulse-fill me-2"></i>Data Periksa Kesehatan</h2>
        <p class="text-muted">💉🐾 Pantau kesehatan hewan kesayanganmu secara rutin dengan dokter terbaik!</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm text-center">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover checkup-table text-center align-middle">
            <thead>
                <tr>
                    <th><i class="bi bi-list-ol icon-pet"></i>No</th>
                    <th><i class="bi bi-bug icon-pet"></i>Nama Hewan</th>
                    <th><i class="bi bi-feather icon-pet"></i>Spesies</th>
                    <th><i class="bi bi-person-bounding-box icon-pet"></i>Umur</th>
                    <th><i class="bi bi-calendar-heart icon-pet"></i>Tanggal Periksa</th>
                    <th><i class="bi bi-chat-left-dots icon-pet"></i>Keluhan / Gejala</th>
                    <th><i class="bi bi-tools icon-pet"></i>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($checkups as $checkup)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $checkup->pet_name }}</td>
                        <td>{{ $checkup->species }}</td>
                        <td>{{ $checkup->vet_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($checkup->date)->format('d M Y') }}</td>
                        <td>{{ $checkup->treatment }}</td>
                        <td>
                            <form action="{{ route('checkup.destroy', $checkup->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-pill shadow-sm">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            <i class="bi bi-emoji-frown text-danger me-1"></i>Belum ada data periksa kesehatan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
