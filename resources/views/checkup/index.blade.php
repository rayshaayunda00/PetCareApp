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
        background-color: #dc3545;
        color: white;
    }

    .checkup-table td {
        vertical-align: middle;
    }

    .alert-success {
        border-radius: 10px;
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
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
        <p class="text-muted">Pantau kesehatan hewan peliharaan secara rutin bersama dokter terbaik!</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-hover checkup-table">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Hewan</th>
                    <th>Spesies</th>
                    <th>Umur Hewan</th>
                    {{-- <th>Spesialisasi</th> --}}
                    <th>Tanggal Periksa</th>
                    {{-- <th>Diagnosis</th> --}}
                    <th>Keluhan / Gejala</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($checkups as $checkup)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $checkup->pet_name }}</td>
                        <td>{{ $checkup->species }}</td>
                        <td>{{ $checkup->vet_name }}</td>
                        {{-- <td>{{ $checkup->specialization }}</td> --}}
                        <td>{{ \Carbon\Carbon::parse($checkup->date)->format('d M Y') }}</td>
                        {{-- <td>{{ $checkup->diagnosis }}</td> --}}
                        <td>{{ $checkup->treatment }}</td>
                        <td class="text-center">
                            <form action="{{ route('checkup.destroy', $checkup->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-pill">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Belum ada data periksa kesehatan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
