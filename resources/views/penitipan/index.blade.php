@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Penitipan Hewan</h2>

    <a href="{{ route('penitipan.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Data Penitipan
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark text-center">
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
            @foreach($owners as $owner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $owner->name }}</td>
                    <td>{{ $owner->address }}</td>
                    <td>{{ $owner->pets->first()->name ?? '-' }}</td>
                    <td>{{ $owner->pets->first()->species ?? '-' }}</td>
                    <td>{{ $owner->pets->first()->breed ?? '-' }}</td>
                    <td>{{ $owner->pets->first()->age ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('penitipan.show', $owner->id) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                        <a href="{{ route('penitipan.edit', $owner->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('penitipan.destroy', $owner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
