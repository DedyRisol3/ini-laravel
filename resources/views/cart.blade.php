@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">🛒 Keranjang Belanja</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <div class="row">
            @foreach($cart as $item)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="row g-0">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('images/' . $item['gambar']) }}" class="img-fluid rounded-start p-2" style="height: 100px;" alt="{{ $item['nama'] }}">
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="card-body">
                                    <h5 class="card-title mb-0">{{ $item['nama'] }}</h5>
                                    <p class="card-text mt-2">Jumlah: <strong>{{ $item['qty'] ?? 1 }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex flex-wrap justify-content-between gap-2 mt-4">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash3-fill"></i> Kosongkan Keranjang
                </button>
            </form>

            <!-- Trigger Modal Invoice -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#invoiceModal">
                <i class="bi bi-cart-check-fill"></i> Pesan Sekarang
            </button>
        </div>

        <!-- Modal Invoice -->
        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="invoiceModalLabel">🧾 Invoice Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
              </div>
              <div class="modal-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Menu</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cart as $item)
                      @php
                          $subtotal = $item['qty'] * $item['harga'];
                          $grandTotal += $subtotal;
                      @endphp
                      <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="3" class="text-end">Total Bayar:</th>
                      <th>Rp{{ number_format($grandTotal, 0, ',', '.') }}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="modal-footer">
                <form action="{{ route('order.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Konfirmasi & Checkout</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>

    @else
        <div class="alert alert-warning text-center">
            <p class="mb-3">Keranjang belanja kamu masih kosong</p>
            <a href="{{ route('menu.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left-circle"></i> Lihat Menu
            </a>
        </div>
    @endif
</div>
@endsection
