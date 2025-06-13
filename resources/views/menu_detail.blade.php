{{-- resources/views/menu/show.blade.php --}}
@extends('layouts.app')

@section('title', $item->nama . ' - QuickServe')

@section('content')
<div class="container py-5">
    <div class="card mx-auto" style="max-width: 600px;">
        {{-- Gunakan $item->gambar dan asset storage --}}
        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">
        <div class="card-body">
            <h3 class="card-title">{{ $item->nama }}</h3>
            <p class="card-text">{{ $item->deskripsi }}</p>
            <p class="card-text"><strong>Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></p>

            <a href="{{ route('menu.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
