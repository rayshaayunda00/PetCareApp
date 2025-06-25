<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Penitipan Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Data Penitipan Hewan</h2>
    <a href="{{ route('penitipan.create') }}" class="btn btn-success mb-3">Tambah Data Penitipan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
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
                    <td>
                        <a href="{{ route('penitipan.show', $owner->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('penitipan.edit', $owner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penitipan.destroy', $owner->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
