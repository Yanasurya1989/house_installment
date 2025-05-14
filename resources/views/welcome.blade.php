<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Artos ti Mamah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .custom-header {
            text-align: center;
            padding: 40px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .custom-table tr:nth-child(even) {
            background-color: #f3f3f3;
        }

        .custom-table tr:nth-child(odd) {
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
        }

        .table-wrapper {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .total-box {
            margin-top: 30px;
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            color: white;
            border-radius: 10px;
            padding: 20px;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

    <div class="custom-header">
        <h1>Artos ti Mamah Tea ning</h1>
        <p>Selamat datang, {{ auth()->user()->name }}</p>
    </div>

    <div class="container mt-4">
        <div class="table-wrapper">
            <table class="table table-bordered custom-table">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Tanggal Pembayaran</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($installments as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->payment_date)->format('d M Y') }}</td>
                            <td>Rp{{ number_format($item->amount, 2, ',', '.') }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $installments->links() }}
        </div>

        <div class="total-box text-center mt-4">
            <strong>Total Cicilan Anda:</strong><br>
            Rp{{ number_format($totalAmount, 2, ',', '.') }}
        </div>
    </div>

</body>

</html>
