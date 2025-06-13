@extends('layouts.admin')

@section('content')
<h2>Detail Pesanan #{{ $pesanan->invoice }}</h2>

<p><strong>Nama:</strong> {{ $pesanan->user->name }}</p>
<p><strong>Tanggal:</strong> {{ $pesanan->created_at->format('d-m-Y H:i') }}</p>

@if($pesanan->detailPesanans->isEmpty())
    <p>Tidak ada item dalam pesanan ini.</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan->detailPesanans as $item)
            <tr>
                <td>{{ $item->nama_menu }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4><strong>Total:</strong> Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</h4>
@endif

<div class="mt-4">
    <a href="{{ route('admin.pesanan.index') }}" class="btn btn-secondary">Kembali ke Daftar Pesanan</a>
</div>
@endsection
