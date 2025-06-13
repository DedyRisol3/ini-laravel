<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Tampilkan isi keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        // dd($cart);
        return view('cart', compact('cart'));
    }

    // Tambah item ke keranjang
    public function add(Request $request)
{
    $nama = $request->input('nama');
    $gambar = $request->input('gambar');
    $qty = $request->input('qty', 1);

    // Ambil harga dari model Menu
    $menu = \App\Models\Menu::where('nama', $nama)->first();

    if (!$menu) {
        return redirect()->back()->with('error', 'Menu tidak ditemukan.');
    }

    $harga = $menu->harga;

    $cart = session()->get('cart', []);

    if (isset($cart[$nama])) {
        $cart[$nama]['qty'] += $qty;
    } else {
        $cart[$nama] = [
            "nama" => $nama,
            "gambar" => $gambar,
            "harga" => $harga,
            "qty" => (int)$qty
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', "$nama berhasil ditambahkan ke keranjang!");
}

    // Hapus item dari keranjang
    public function remove(Request $request)
    {
        $nama = $request->input('nama');
        $cart = session()->get('cart', []);

        if (isset($cart[$nama])) {
            unset($cart[$nama]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', "$nama berhasil dihapus dari keranjang!");
    }

    // Kosongkan seluruh isi keranjang
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan.');
    }
} 
