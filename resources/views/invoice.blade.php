<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $pesanan->invoice }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .total {
            font-weight: bold;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <h2>INVOICE PEMESANAN</h2>

    <p><strong>No. Invoice:</strong> {{ $pesanan->invoice }}</p>
    <p><strong>Tanggal:</strong> {{ $pesanan->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Pelanggan:</strong> {{ $pesanan->user->name ?? 'Umum' }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan->detail as $detail)
                <tr>
                    <td>{{ $detail->nama_menu }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td colspan="3" class="text-right">Total</td>
                <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
