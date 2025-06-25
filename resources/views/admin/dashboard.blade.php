@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Halaman Dashboard Admin</h2>
    <p>Selamat datang, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>
</div>
@endsection
