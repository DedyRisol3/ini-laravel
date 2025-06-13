@extends('layouts.app')

@section('content')
<style>
    .hero {
        background: url('/images/bg_food.png') center center/cover no-repeat;
        height: 150px;
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
</style>

<div class="hero">
    <div class="hero-content">
        <h1 class="text-4xl font-bold">Tambah Menu Baru</h1>
        <p class="text-lg">Silakan isi detail menu yang ingin ditambahkan.</p>
    </div>
</div>

<div class="max-w-2xl mx-auto mt-10 px-6">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block font-medium mb-1">Nama Menu</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama menu"
                   class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" placeholder="Masukkan deskripsi"
                      class="w-full border border-gray-300 rounded px-3 py-2">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="kategori" class="block font-medium mb-1">Kategori</label>
            <select name="kategori" id="kategori" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">Pilih Kategori</option>
                <option value="makanan" {{ old('kategori') == 'makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="minuman" {{ old('kategori') == 'minuman' ? 'selected' : '' }}>Minuman</option>
                <option value="dessert" {{ old('kategori') == 'dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="harga" class="block font-medium mb-1">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga') }}" placeholder="Masukkan harga"
                   class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="gambar" class="block font-medium mb-1">Gambar Menu</label>
            <input type="file" name="gambar" id="gambar" accept="image/*"
                   class="w-full border border-gray-300 rounded px-3 py-2">
            <img id="preview" class="mt-3 rounded w-64 {{ old('gambar') ? '' : 'hidden' }}" />
        </div>

        <div class="mb-4">
            <label for="status" class="block font-medium mb-1">Status</label>
            <select name="status" id="status"
                    class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="habis" {{ old('status') == 'habis' ? 'selected' : '' }}>Habis</option>
            </select>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('menu.index') }}"
               class="bg-gray-300 hover:bg-warning-400 text-gray-800 py-2 px-4 rounded">
                Kembali
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-warning-700 text-blue py-2 px-4 rounded">
                Simpan Menu
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('gambar').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(){
                const preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
