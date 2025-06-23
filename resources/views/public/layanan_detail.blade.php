@extends('layouts.public')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">{{ $layanan->judul }}</h2>
    <div class="text-center mb-4">
        <img src="{{ asset('storage/'.$layanan->gambar) }}" width="200">
    </div>
    <p class="text-center">{{ $layanan->deskripsi }}</p>
    <div class="text-center">
        <a href="{{ route('layanan.index') }}" class="btn btn-secondary mt-3">← Kembali ke Layanan</a>
    </div>
</div>
@endsection
