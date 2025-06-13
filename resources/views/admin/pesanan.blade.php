@extends('layouts.admin')

@section('content')
<h2>Daftar Pesanan</h2>

<table>
    <thead>
        <tr>
            <th>Invoice</th>
            <th>Nama User</th>
            <th>Total</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesanans as $pesanan)
        <tr>
            <td>{{ $pesanan->invoice }}</td>
            <td>{{ $pesanan->user->name ?? '-' }}</td>
            <td>Rp{{ number_format($pesanan->total_harga) }}</td>
            <td>{{ $pesanan->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}</td>
            <td>
                <a href="{{ route('admin.pesanan.detail', $pesanan->id) }}">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
