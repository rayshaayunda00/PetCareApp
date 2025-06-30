<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Vaksinasi Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 20px;
            background: #fff;
        }
        h2 {
            color: #1e67a8;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #1e67a8;
            border: none;
        }
        .btn-primary:hover {
            background-color: #155d92;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width:600px;">
        <h2 class="text-center">Formulir Vaksinasi Hewan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('vaccination.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="pet_name" class="form-label">Nama</label>
                <input type="text" name="pet_name" id="pet_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="vaccine_type" class="form-label">Keluhan</label>
                <input type="text" name="vaccine_type" id="vaccine_type" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="vaccination_date" class="form-label">Tanggal Vaksinasi</label>
                <input type="date" name="vaccination_date" id="vaccination_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Catatan (Opsional)</label>
                <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Data Vaksinasi</button>
        </form>
    </div>
</div>

@if(session('vaccination'))
<!-- Modal Popup Struk -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptModalLabel">Struk Vaksinasi Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" id="receipt-content">
                <p><strong>Nama:</strong> {{ session('vaccination')->pet_name }}</p>
                <p><strong>Keluhan:</strong> {{ session('vaccination')->vaccine_type }}</p>
                <p><strong>Tanggal Vaksinasi:</strong> {{ \Carbon\Carbon::parse(session('vaccination')->vaccination_date)->format('d M Y') }}</p>
                @if(session('vaccination')->notes)
                    <p><strong>Catatan:</strong> {{ session('vaccination')->notes }}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button onclick="printReceipt()" class="btn btn-success">Unduh Struk</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function printReceipt() {
        var printContents = document.getElementById('receipt-content').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }

    window.onload = function () {
        var modal = new bootstrap.Modal(document.getElementById('receiptModal'));
        modal.show();
    };
</script>
@endif

</body>
</html>
