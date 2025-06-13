@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Info Kontak -->
        <div class="col-md-6 mb-4">
            <h2 class="mb-4 fw-bold">Hubungi Kami</h2>
            <p class="text-muted">Silakan hubungi kami melalui informasi berikut:</p>

            <div class="mb-3 d-flex align-items-start">
                <i class="bi bi-envelope-fill text-danger fs-4 me-3"></i>
                <div>
                    <h6 class="fw-bold mb-1">Email</h6>
                    <p class="mb-0">quickserve@example.com</p>
                </div>
            </div>

            <div class="mb-3 d-flex align-items-start">
                <i class="bi bi-telephone-fill text-success fs-4 me-3"></i>
                <div>
                    <h6 class="fw-bold mb-1">Telepon</h6>
                    <p class="mb-0">+62 812 3456 7890</p>
                </div>
            </div>

            <div class="mb-3 d-flex align-items-start">
                <i class="bi bi-geo-alt-fill text-primary fs-4 me-3"></i>
                <div>
                    <h6 class="fw-bold mb-1">Alamat</h6>
                    <p class="mb-0">Jl. Makan Enak No. 123, Jakarta</p>
                </div>
            </div>
        </div>

        <!-- Form Kontak -->
        <div class="col-md-6">
            <h2 class="mb-4 fw-bold">Kirim Pesan</h2>
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Anda</label>
                    <input type="text" class="form-control rounded-3 shadow-sm" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control rounded-3 shadow-sm" id="pesan" name="pesan" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">Kirim</button>
            </form>
        </div>
    </div>

    <!-- Jam Operasional -->
    <div class="row mt-5">
        <div class="col">
            <h3 class="fw-bold mb-4">Jam Operasional</h3>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="bi bi-calendar-event fs-2 text-primary mb-2"></i>
                            <h5 class="fw-bold">Senin - Jumat</h5>
                            <p class="text-muted mb-0">08.00 - 21.00</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="bi bi-calendar-week fs-2 text-success mb-2"></i>
                            <h5 class="fw-bold">Sabtu</h5>
                            <p class="text-muted mb-0">09.00 - 22.00</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="bi bi-calendar-x fs-2 text-danger mb-2"></i>
                            <h5 class="fw-bold">Minggu & Libur</h5>
                            <p class="text-muted mb-0">Tutup</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div class="row mt-5">
        <div class="col">
            <h3 class="fw-bold">Pertanyaan Umum</h3>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                            Bagaimana cara memesan makanan?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Anda bisa memesan makanan melalui halaman Menu, lalu menambahkannya ke Keranjang dan checkout.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                            Apakah saya bisa membatalkan pesanan?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Pesanan hanya dapat dibatalkan maksimal 5 menit setelah konfirmasi pembayaran.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lokasi Peta -->
    <div class="row mt-5 mb-5">
        <div class="col">
            <h3 class="fw-bold">Lokasi Kami</h3>
            <div class="ratio ratio-16x9">
                <iframe
                    src="https://maps.google.com/maps?q=Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    allowfullscreen=""
                    loading="lazy"
                    style="border:0;"></iframe>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; {{ date('Y') }} QuickServe. All rights reserved.
</footer>

@endsection
