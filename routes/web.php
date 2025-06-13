<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Halaman Umum
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
// Jika kamu ingin /home tetap aktif dan redirect ke /
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| About & Contact
|--------------------------------------------------------------------------
*/
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'pesan' => 'required|string',
    ]);

    // Simpan pesan / kirim email bisa di sini

    return back()->with('success', 'Pesan Anda telah dikirim!');
})->name('contact.send');

/*
|--------------------------------------------------------------------------
| Menu - Public
|--------------------------------------------------------------------------
*/
Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/detail/{nama}', [MenuController::class, 'detail'])->name('menu.detail');
    Route::get('/show/{nama}', [MenuController::class, 'show'])->name('menu.show');
});

/*
|--------------------------------------------------------------------------
| Menu - Admin (Role-Based Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('admin.menu.store');
    Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('admin.menu.update');
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');

    Route::get('/pesanan', [OrderController::class, 'listPesanan'])->name('admin.pesanan.index');
    Route::get('/pesanan/{id}', [OrderController::class, 'detailPesanan'])->name('admin.pesanan.detail');
    Route::delete('/pesanan/{id}', [OrderController::class, 'destroy'])->name('admin.pesanan.destroy');
});

/*
|--------------------------------------------------------------------------
| Keranjang (Cart)
|--------------------------------------------------------------------------
*/
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

/*
|--------------------------------------------------------------------------
| Order Checkout & Invoice
|--------------------------------------------------------------------------
*/
Route::post('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');
