@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Periksa Kesehatan Hewan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama Hewan</th>
                <th>Spesies</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>Tanggal Periksa</th>
                <th>Diagnosis</th>
                <th>Tindakan / Perawatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($checkups as $checkup)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $checkup->pet_name }}</td>
                    <td>{{ $checkup->species }}</td>
                    <td>{{ $checkup->vet_name }}</td>
                    <td>{{ $checkup->specialization }}</td>
                    <td>{{ \Carbon\Carbon::parse($checkup->date)->format('d M Y') }}</td>
                    <td>{{ $checkup->diagnosis }}</td>
                    <td>{{ $checkup->treatment }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data periksa kesehatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
