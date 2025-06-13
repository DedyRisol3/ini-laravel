{{-- resources/views/menu/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Menu Makanan - QuickServe')

@section('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    .menu-img {
        height: 200px;
        object-fit: cover;
    }
    .section-title {
        margin-top: 60px;
        margin-bottom: 30px;
    }
    .kategori {
        display: flex;
        flex-wrap: wrap;
    }
    #cart-icon {
        position: fixed;
        top: 20px;
        right: 20px;
        background: orange;
        color: white;
        padding: 10px 15px;
        border-radius: 50px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        font-size: 18px;
        cursor: pointer;
        display: none;
        z-index: 9999;
    }
    #cart-icon .badge {
        background: #fff;
        color: orange;
        margin-left: 5px;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div id="cart-icon" title="Lihat Keranjang">
    🛒 Keranjang <span class="badge" id="cart-count">0</span>
</div>

<div class="container py-5">
    <h2 class="text-center mb-4">🍽 Menu QuickServe</h2>

    <div class="text-center mb-4">
    <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="makanan">Makanan</button>
    <button class="btn btn-outline-primary mx-1 filter-btn" data-filter="minuman">Minuman</button>
    <button class="btn btn-outline-success mx-1 filter-btn" data-filter="dessert">Dessert</button>
    <button class="btn btn-outline-dark mx-1 filter-btn" data-filter="all">Semua</button>
</div>

{{-- Makanan --}}
<h4 class="section-title text-danger">🍛 Makanan</h4>
<div class="row kategori makanan">
    @foreach ($makanan as $item)
    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="card shadow-sm">
            <img src="{{ asset('storage/' . $item['gambar']) }}" class="card-img-top menu-img" alt="{{ $item['nama'] }}">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $item['nama'] }}</h5>
                <a href="{{ route('menu.detail', ['nama' => $item['nama']]) }}" class="btn btn-info me-2">Lihat Detail</a>
                <button class="btn btn-warning add-to-cart-btn"
                    data-nama="{{ $item['nama'] }}"
                    data-gambar="{{ $item['gambar'] }}">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Minuman --}}
<h4 class="section-title text-primary">🥤 Minuman</h4>
<div class="row kategori minuman">
    @foreach ($minuman as $item)
    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="card shadow-sm">
            <img src="{{ asset('storage/' . $item['gambar']) }}" class="card-img-top menu-img" alt="{{ $item['nama'] }}">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $item['nama'] }}</h5>
                <a href="{{ route('menu.detail', ['nama' => $item['nama']]) }}" class="btn btn-info me-2">Lihat Detail</a>
                <button class="btn btn-warning add-to-cart-btn"
                    data-nama="{{ $item['nama'] }}"
                    data-gambar="{{ $item['gambar'] }}">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Dessert --}}
<h4 class="section-title text-success">🍰 Dessert</h4>
<div class="row kategori dessert">
    @foreach ($dessert as $item)
    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
        <div class="card shadow-sm">
            <img src="{{ asset('storage/' . $item['gambar']) }}" class="card-img-top menu-img" alt="{{ $item['nama'] }}">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $item['nama'] }}</h5>
                <a href="{{ route('menu.detail', ['nama' => $item['nama']]) }}" class="btn btn-info me-2">Lihat Detail</a>
                <button class="btn btn-warning add-to-cart-btn"
                    data-nama="{{ $item['nama'] }}"
                    data-gambar="{{ $item['gambar'] }}">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

    const filterButtons = document.querySelectorAll('.filter-btn');
    const kategoriSections = document.querySelectorAll('.kategori');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            kategoriSections.forEach(section => {
                if (filter === 'all' || section.classList.contains(filter)) {
                    section.parentElement.style.display = '';
                } else {
                    section.parentElement.style.display = 'none';
                }
            });
        });
    });

    const cartIcon = document.getElementById('cart-icon');
    const cartCount = document.getElementById('cart-count');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    updateCartIcon();

    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    addToCartButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const nama = btn.getAttribute('data-nama');
            const gambar = btn.getAttribute('data-gambar');

            let found = false;
            for(let i = 0; i < cart.length; i++) {
                if(cart[i].nama === nama) {
                    cart[i].qty++;
                    found = true;
                    break;
                }
            }
            if(!found) {
                cart.push({nama: nama, gambar: gambar, qty: 1});
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartIcon();

            alert(`${nama} ditambahkan ke keranjang!`);
        });
    });

    function updateCartIcon() {
        if(cart.length > 0) {
            cartIcon.style.display = 'block';
            let totalQty = cart.reduce((acc, item) => acc + item.qty, 0);
            cartCount.textContent = totalQty;
        } else {
            cartIcon.style.display = 'none';
        }
    }

    cartIcon.addEventListener('click', () => {
        window.location.href = "{{ route('cart.view') }}";
    });
</script>
@endsection
