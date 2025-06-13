@extends('layouts.app')

@section('content')
<style>
    .hero {
        background: url('/images/bg_food.png') center center/cover no-repeat;
        height: 400px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
    }
    .hero::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.6);
        top: 0;
        left: 0;
    }
    .hero-content {
        position: relative;
        z-index: 1;
    }
    .menu-img {
        height: 200px;
        object-fit: cover;
    }
    .menu-card {
        transition: transform 0.3s;
    }
    .menu-card:hover {
        transform: scale(1.05);
    }
</style>

<div class="hero">
    <div class="hero-content">
        <h1 class="display-4 fw-bold">WELCOME TO <span class="text-warning">QuickServe</span></h1>
        <p class="lead">Pemesanan makanan digital, cepat dan tanpa antre!</p>

        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('menu.index') }}" class="btn btn-warning">Kelola Menu</a>
            @else
                <a href="{{ route('menu.index') }}" class="btn btn-warning">Lihat Menu</a>
            @endif
        @else
            <a href="{{ route('menu.index') }}" class="btn btn-warning">Lihat Menu</a>
        @endauth
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">Menu Populer Hari Ini</h2>
    <div class="row">
        @foreach ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card menu-card shadow">
                    <img src="{{ asset('images/' . $menu['gambar']) }}" class="card-img-top menu-img" alt="{{ $menu['nama'] }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $menu['nama'] }}</h5>
                        <a href="{{ route('menu.index') }}" class="btn btn-outline-danger">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
