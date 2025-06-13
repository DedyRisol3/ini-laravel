@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Menu</h2>

    <ul class="nav nav-tabs justify-content-center" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#makanan">Makanan</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#minuman">Minuman</a></li>
        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#dessert">Dessert</a></li>
    </ul>

    <div class="tab-content py-4">
        {{-- Tab Makanan --}}
        <div id="makanan" class="tab-pane fade show active">
            <div class="row">
                @foreach($makanan as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top img-fluid" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p class="card-text"><strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></p>

                                <a href="{{ route('menu.detail', ['nama' => $item->nama]) }}" class="btn btn-sm btn-info mb-2">Lihat Detail</a>

                                <div class="input-group justify-content-center mb-2">
                                    <button type="button" class="btn btn-outline-secondary btn-minus">-</button>
                                    <input type="text" value="0" class="form-control text-center jumlah-input" style="width: 50px;">
                                    <button type="button" class="btn btn-outline-secondary btn-plus">+</button>
                                </div>
                                <button class="btn btn-danger btn-add-cart" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-gambar="{{ $item->gambar }}">Tambah</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Tab Minuman --}}
        <div id="minuman" class="tab-pane fade">
            <div class="row">
                @foreach($minuman as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top img-fluid" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p class="card-text"><strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></p>

                                <a href="{{ route('menu.detail', ['nama' => $item->nama]) }}" class="btn btn-sm btn-info mb-2">Lihat Detail</a>

                                <div class="input-group justify-content-center mb-2">
                                    <button type="button" class="btn btn-outline-secondary btn-minus">-</button>
                                    <input type="text" value="0" class="form-control text-center jumlah-input" style="width: 50px;">
                                    <button type="button" class="btn btn-outline-secondary btn-plus">+</button>
                                </div>
                                <button class="btn btn-danger btn-add-cart" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-gambar="{{ $item->gambar }}">Tambah</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Tab Dessert --}}
        <div id="dessert" class="tab-pane fade">
            <div class="row">
                @foreach($dessert as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/'.$item->gambar) }}" class="card-img-top img-fluid" alt="{{ $item->nama }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <p class="card-text"><strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></p>

                                <a href="{{ route('menu.detail', ['nama' => $item->nama]) }}" class="btn btn-sm btn-info mb-2">Lihat Detail</a>

                                <div class="input-group justify-content-center mb-2">
                                    <button type="button" class="btn btn-outline-secondary btn-minus">-</button>
                                    <input type="text" value="0" class="form-control text-center jumlah-input" style="width: 50px;">
                                    <button type="button" class="btn btn-outline-secondary btn-plus">+</button>
                                </div>
                                <button class="btn btn-danger btn-add-cart" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}" data-gambar="{{ $item->gambar }}">Tambah</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.btn-plus, .btn-minus');
        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const input = this.closest('.input-group').querySelector('.jumlah-input');
                let value = parseInt(input.value);
                if (this.classList.contains('btn-plus')) {
                    input.value = value + 1;
                } else if (this.classList.contains('btn-minus')) {
                    input.value = value > 0 ? value - 1 : 0;
                }
            });
        });

        const addToCartButtons = document.querySelectorAll('.btn-add-cart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function () {
                const nama = this.getAttribute('data-nama');
                const gambar = this.getAttribute('data-gambar');
                const qty = this.closest('.card-body').querySelector('.jumlah-input').value;

                fetch("{{ route('cart.add') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ nama, gambar, qty })
                }).then(response => {
                    if (response.ok) {
                        alert(nama + ' berhasil ditambahkan ke keranjang!');
                        location.reload();
                    }
                });
            });
        });
    });
</script>
@endpush
@endsection
