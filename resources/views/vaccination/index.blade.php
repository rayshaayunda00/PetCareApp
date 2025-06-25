<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Vaksinasi Hewan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Data Vaksinasi Hewan</h2>

    <a href="{{ route('vaccination.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Data Vaksinasi
    </a>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Nama Hewan</th>
                <th>Jenis Vaksin</th>
                <th>Tanggal Vaksinasi</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vaccinations as $vaccination)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vaccination->pet_name }}</td>
                    <td>{{ $vaccination->vaccine_type }}</td>
                    <td>{{ \Carbon\Carbon::parse($vaccination->vaccination_date)->format('d M Y') }}</td>
                    <td>{{ $vaccination->notes ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('vaccination.show', $vaccination->id) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> Detail
                        </a>
                        <a href="{{ route('vaccination.edit', $vaccination->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('vaccination.destroy', $vaccination->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data vaksinasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
