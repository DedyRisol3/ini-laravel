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
        <h1 class="text-4xl font-bold">Edit Menu</h1>
        <p class="text-lg">Silakan mengedit menu yang telah ada</p>
    </div>
</div>

<div class="max-w-2xl mx-auto mt-10 px-6">
    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow-lg w-full">
        @csrf
        @method('PUT')

        <!-- Nama Menu -->
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-medium mb-2">Nama Menu</label>
            <input type="text" name="nama" id="nama" value="{{ $menu->nama }}" placeholder="Masukkan nama menu"
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 text-sm font-medium mb-2">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi menu"
                      class="w-full h-32 border border-gray-300 rounded px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $menu->deskripsi }}</textarea>
        </div>

        <!-- Kategori -->
        <div class="mb-4">
            <label for="kategori" class="block text-gray-700 text-sm font-medium mb-2">Kategori</label>
            <select name="kategori" id="kategori"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="makanan" {{ $menu->kategori == 'makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="minuman" {{ $menu->kategori == 'minuman' ? 'selected' : '' }}>Minuman</option>
                <option value="dessert" {{ $menu->kategori == 'dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label for="harga" class="block text-gray-700 text-sm font-medium mb-2">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" value="{{ $menu->harga }}" placeholder="Masukkan harga menu"
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-medium mb-2">Status</label>
            <select name="status" id="status"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="tersedia" {{ $menu->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="habis" {{ $menu->status == 'habis' ? 'selected' : '' }}>Habis</option>
            </select>
        </div>

        <!-- Upload Gambar Baru -->
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 text-sm font-medium mb-2">Gambar Baru (Opsional)</label>
            <input type="file" name="gambar" id="gambar" accept="image/*" onchange="previewImage(event)"
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Gambar Saat Ini -->
        @if($menu->gambar)
        <div class="mb-6">
            <p class="text-sm text-gray-500">Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="Gambar Menu"
                 class="w-40 h-auto rounded mt-2 object-cover">
        </div>
        @endif

        <!-- Preview Gambar Baru -->
        <div id="imagePreview" class="mt-2 mb-6">
            <p id="imageMessage" class="text-sm text-gray-500">
                Preview Gambar Baru:<br>
                <span>Tidak Ada Gambar</span>
            </p>
            <img id="preview" class="w-40 h-auto rounded mt-2 hidden" />
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-start items-center mt-6 p-2 space-x-4">
            <a href="{{ route('menu.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">
                Kembali
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-blue py-2 px-4 rounded">
                Update Menu
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const message = document.getElementById('imageMessage');
        const preview = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
            message.innerHTML = 'Preview Gambar Baru:';
        } else {
            preview.classList.add('hidden');
            preview.src = '';
            message.innerHTML = 'Tidak Ada Gambar';
        }
    }
</script>
@endsection
