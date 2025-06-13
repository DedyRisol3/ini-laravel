@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow mb-4">
    <h1 class="text-3xl font-semibold text-gray-800 mb-2">Daftar Menu</h1>
    <p class="text-gray-700 mb-6">Berikut adalah daftar menu yang tersedia. Klik pada nama menu untuk melihat detailnya.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($menus as $menu)
            <div class="relative bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200 group">
                @if($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}" class="w-full h-28 object-cover rounded mb-4 relative z-10">
                @endif

                <div class="flex justify-between items-center mt-2 relative z-10">
                    <h2 class="text-xl font-semibold text-gray-900 pr-4">
                        <a href="{{ route('menu.detail', $menu->id) }}" class="hover:underline">{{ $menu->nama }}</a>
                    </h2>
                    <div class="flex space-x-4">
                        <a href="{{ route('menu.edit', $menu->id) }}" class="text-blue-600 hover:underline z-20">Edit</a>
                        <p>|</p>
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="inline z-20">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>

                <p class="text-sm text-gray-700 mt-2 mb-1 text-justify relative z-10">
                    {{ Str::limit($menu->deskripsi, 100) }}
                </p>

                <p class="text-gray-600 text-sm mb-1">Kategori: <strong>{{ ucfirst($menu->kategori) }}</strong></p>
                <p class="text-gray-800 font-bold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
            </div>
        @empty
            <div class="col-span-4 text-center text-gray-600 font-medium">
                Tidak Ada Menu yang Tersedia.
            </div>
        @endforelse