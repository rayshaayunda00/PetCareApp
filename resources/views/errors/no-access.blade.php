@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-4 text-danger">403 - Akses Ditolak</h1>
    <p class="lead">Halaman ini hanya dapat diakses oleh super admin.</p>
    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
