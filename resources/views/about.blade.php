@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Hero Section --}}
    <div class="text-center mb-5">
        <h2 class="text-danger fw-bold">Tentang QuickServe</h2>
        <p class="lead text-muted mx-auto" style="max-width: 800px;">
            QuickServe adalah platform digital pemesanan makanan yang dirancang untuk memberikan kenyamanan, kecepatan, dan kemudahan dalam menikmati hidangan favorit Anda tanpa antre.
        </p>
    </div>

    {{-- Misi dan Visi --}}
    <div class="row text-center mb-5 g-4">
        <div class="col-md-6">
            <div class="p-4 border rounded shadow-sm h-100 bg-white">
                <h4 class="text-danger fw-semibold mb-2">Misi Kami</h4>
                <p class="text-muted">Memberikan kemudahan dan efisiensi dalam memesan makanan. Kami berkomitmen menyediakan layanan yang cepat dan handal bagi semua pelanggan.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 border rounded shadow-sm h-100 bg-white">
                <h4 class="text-danger fw-semibold mb-2">Visi Kami</h4>
                <p class="text-muted">Menjadi platform pemesanan makanan online terbaik di Indonesia yang berfokus pada kualitas layanan dan inovasi digital.</p>
            </div>
        </div>
    </div>

    {{-- Mengapa Memilih --}}
    <div class="bg-light p-5 rounded shadow-sm mb-5">
        <h3 class="text-center text-warning fw-bold mb-5">Mengapa Memilih QuickServe?</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="fs-1 mb-3">🍔</div>
                    <h5 class="fw-semibold">Beragam Menu</h5>
                    <p class="text-muted">Kami bermitra dengan restoran dan UMKM untuk menyajikan makanan, minuman, dan dessert yang bervariasi.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="fs-1 mb-3">⚡</div>
                    <h5 class="fw-semibold">Pelayanan Cepat</h5>
                    <p class="text-muted">Setiap pesanan diproses dengan cepat dan efisien untuk menjamin makanan sampai tepat waktu.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <div class="fs-1 mb-3">💻</div>
                    <h5 class="fw-semibold">Antarmuka Modern</h5>
                    <p class="text-muted">Desain aplikasi kami user-friendly dan intuitif untuk kemudahan pengguna dari berbagai kalangan.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tim Kami --}}
    <div class="text-center mb-5">
        <h4 class="text-danger fw-bold">Tim Kami</h4>
        <p class="text-muted mx-auto" style="max-width: 800px;">
            Dibalik QuickServe adalah tim kreatif yang terdiri dari developer, desainer UI/UX, dan pakar kuliner. Kami memiliki satu tujuan: menghadirkan platform pemesanan makanan yang efisien, menyenangkan, dan terpercaya bagi semua orang.
        </p>
    </div>

</div>

{{-- Footer --}}
<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; {{ date('Y') }} QuickServe. All rights reserved.
</footer>
@endsection
