@extends('layouts.public')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Layanan Kami</h2>
    <div class="row g-4">
        @foreach($layanan as $item)
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="mx-auto mt-3">
                    <h5 class="mt-3">{{ $item->judul }}</h5>
                    <p>{{ Str::limit($item->deskripsi, 100) }}</p>
                    <a href="{{ route('layanan.show', $item->id) }}" class="btn btn-primary mt-2">Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
