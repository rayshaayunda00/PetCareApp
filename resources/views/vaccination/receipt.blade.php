<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Struk Vaksinasi Hewan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e67a8;
            --secondary-color: #4d9fda;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .receipt-wrapper {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
            margin-top: 50px;
        }

        .receipt-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 25px;
            border-radius: 16px 16px 0 0;
            color: white;
            text-align: center;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: #f0f4f8;
            color: var(--primary-color);
            width: 35%;
        }

        .table td {
            font-weight: 500;
        }

        .print-date {
            text-align: right;
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 25px;
        }

        @media print {
            body {
                background: white !important;
            }

            .receipt-wrapper {
                box-shadow: none !important;
                margin-top: 0 !important;
            }

            .receipt-header {
                border-radius: 0;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <div class="receipt-wrapper mx-auto">
            <div class="receipt-header">
                <h2><i class="fas fa-receipt me-2"></i>Struk Vaksinasi Hewan</h2>
                <p>PetCareDB - Layanan Vaksinasi</p>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Hewan</th>
                    <td>{{ $vaccination->pet_name }}</td>
                </tr>
                <tr>
                    <th>Jenis Vaksin</th>
                    <td>{{ $vaccination->vaccine_type }}</td>
                </tr>
                <tr>
                    <th>Tanggal Vaksinasi</th>
                    <td>{{ \Carbon\Carbon::parse($vaccination->vaccination_date)->translatedFormat('d M Y') }}</td>
                </tr>
                @if($vaccination->notes)
                <tr>
                    <th>Catatan</th>
                    <td>{{ $vaccination->notes }}</td>
                </tr>
                @endif
                <tr>
                    <th>Nama Dokter</th>
                    <td>{{ $vaccination->doctor_name ?? 'Tidak tersedia' }}</td>
                </tr>
            </table>
            <p class="print-date">Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d M Y, H:i') }}</p>
        </div>
    </div>
</body>
</html>



  
