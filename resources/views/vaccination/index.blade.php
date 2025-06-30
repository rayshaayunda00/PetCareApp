@extends('layouts.app')

@section('content')
<style>
    .vaksin-header {
        background: linear-gradient(90deg, #d0f0fd, #a8e0f5);
        padding: 25px;
        border-radius: 20px;
        margin-bottom: 30px;
        text-align: center;
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
    }

    .vaksin-table td {
        vertical-align: middle;
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
    }

    .btn-sm i {
        margin-right: 3px;
    }
</style>

<div class="container">
    <div class="vaksin-header shadow-sm">
        <h2><i class="bi bi-shield-plus me-2"></i>Data Vaksinasi Hewan</h2>
        <p class="text-muted">Lindungi hewan kesayanganmu dengan vaksinasi tepat waktu! 🐾💉</p>
        <a href="{{ route('vaccination.create') }}" class="btn btn-success btn-sm mt-3">
            <i class="bi bi-plus-circle"></i> Tambah Data Vaksinasi
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover vaksin-table">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Hewan</th>
                    <th>Keluhan</th>
                    <th>Tanggal Vaksinasi</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vaccinations as $vaccination)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $vaccination->pet_name }}</td>
                        <td>{{ $vaccination->vaccine_type }}</td>
                        <td>{{ \Carbon\Carbon::parse($vaccination->vaccination_date)->format('d M Y') }}</td>
                        <td>{{ $vaccination->notes ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('vaccination.show', $vaccination->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('vaccination.edit', $vaccination->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('vaccination.destroy', $vaccination->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data vaksinasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
