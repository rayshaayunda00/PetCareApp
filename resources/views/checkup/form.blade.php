@extends('layouts.public')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Form Periksa Kesehatan Hewan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('checkup.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pilih Hewan</label>
            <select name="pet_id" class="form-control" required>
                <option value="">-- Pilih Hewan --</option>
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }} ({{ $pet->species }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Pilih Dokter Hewan</label>
            <select name="vet_id" class="form-control" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach($vets as $vet)
                    <option value="{{ $vet->id }}">{{ $vet->name }} - {{ $vet->specialization }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Periksa</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Diagnosis</label>
            <textarea name="diagnosis" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Tindakan / Perawatan</label>
            <textarea name="treatment" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Data Periksa</button>
    </form>
</div>
@ends
