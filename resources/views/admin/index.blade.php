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
        <h1 class="display-4 fw-bold">Manajemen Menu <span class="text-warning">Admin</span></h1>
        <p class="lead">Kelola menu makanan dengan mudah dan cepat!</p>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-warning">+ Tambah Menu</a>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">Menu Tersedia</h2>
    <div class="row">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($menus->isEmpty())
            <div class="mt-10 text-center text-gray-500 flex-grow flex items-center justify-center">
                Belum ada menu yang ditambahkan.
            </div>
        @else
            @foreach ($menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card menu-card shadow">
                        <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top menu-img" alt="{{ $menu->nama }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $menu->nama }}</h5>
                            <p class="text-muted">Harga: <span class="font-weight-bold text-warning">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span></p>
                            <p class="text-muted">Status: 
                                @if($menu->status == 'tersedia')
                                    <span class="text-success">Tersedia</span>
                                @else
                                    <span class="text-danger">Habis</span>
                                @endif
                            </p>
                            <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection