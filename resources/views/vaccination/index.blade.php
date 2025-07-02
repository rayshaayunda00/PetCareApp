@extends('layouts.app')

@section('content')
<style>
    .vaksin-header {
        background: linear-gradient(90deg, #d0f0fd, #a8e0f5);
        padding: 25px;
        border-radius: 20px;
        margin-bottom: 30px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .vaksin-header h2 {
        font-weight: bold;
        color: #0d6efd;
        margin-bottom: 5px;
    }

    .vaksin-table th {
        vertical-align: middle;
        background-color: #0d6efd;
        color: white;
        text-align: center;
    }

    .vaksin-table td {
        vertical-align: middle;
        text-align: center;
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
        background: white;
    }

    .btn-sm i {
        margin-right: 3px;
    }

    .btn-danger {
        background-color: #ff5c5c;
        border: none;
    }

    .btn-danger:hover {
        background-color: #e04b4b;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f9ff;
    }

    .alert-success {
        border-left: 5px solid #0d6efd;
    }

    .emoji-icon {
        font-size: 1.2rem;
        margin-right: 4px;
    }

    .pet-icon {
        font-size: 1.4rem;
        margin-right: 6px;
    }
</style>

<div class="container">
    <div class="vaksin-header shadow-sm">
        <h2><i class="bi bi-shield-plus me-2"></i>Data Vaksinasi Hewan</h2>
        <p class="text-muted">🐾💉 Lindungi hewan kesayanganmu dengan vaksinasi tepat waktu!</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">
            <i class="bi bi-check-circle-fill emoji-icon text-success"></i>{{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover vaksin-table">
            <thead>
                <tr>
                    <th><i class="bi bi-list-ol emoji-icon"></i>No</th>
                    <th><i class="bi bi-patch-plus emoji-icon"></i>Nama Hewan</th>
                    <th><i class="bi bi-capsule-pill emoji-icon"></i>Jenis Vaksin</th>
                    <th><i class="bi bi-calendar-check emoji-icon"></i>Tanggal</th>
                    <th><i class="bi bi-journal-text emoji-icon"></i>Catatan</th>
                    <th><i class="bi bi-tools emoji-icon"></i>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vaccinations as $vaccination)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><i class="bi bi-heart-pulse-fill pet-icon text-danger"></i>{{ $vaccination->pet_name }}</td>
                        <td>{{ $vaccination->vaccine_type }}</td>
                        <td>{{ \Carbon\Carbon::parse($vaccination->vaccination_date)->translatedFormat('d M Y') }}</td>
                        <td>{{ $vaccination->notes ?? '-' }}</td>
                        <td>
                            <form action="{{ route('vaccination.destroy', $vaccination->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm shadow-sm">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            <i class="bi bi-emoji-frown text-danger me-1"></i>Belum ada data vaksinasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
