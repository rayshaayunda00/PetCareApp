@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold text-primary mb-4">Tambah Dokter Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Dokter</label>
                    <input type="text" name="name" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label for="specialization" class="form-label">Spesialisasi</label>
                    <input type="text" name="specialization" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Foto Dokter (opsional)</label>
                    <input type="file" name="image" class="form-control rounded-3" accept="image/*">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('doctors.index') }}" class="btn btn-secondary rounded-pill">Kembali</a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
