@extends('layouts.admin')

@section('content')
    <h2>Daftar Pesanan</h2>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($pesanans->isEmpty())
        <p>Tidak ada pesanans.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Invoice</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanans as $p)
                    <tr>
                        <td>{{ $p->invoice }}</td>
                        <td>{{ $p->user->name }}</td>
                        <td>{{ $p->created_at->format('d-m-Y H:i') }}</td>
                        <td>Rp{{ number_format($p->total_harga) }}</td>
                        <td>
                            <a href="{{ route('admin.pesanan.detail', $p->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>

                            <form action="{{ route('admin.pesanan.destroy', $p->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
