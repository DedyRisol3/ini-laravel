<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF; // Untuk PDF

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (count($cart) == 0) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $totalHarga = 0;
        foreach ($cart as $item) {
            $totalHarga += $item['qty'] * $item['harga'];
        }

        // Generate invoice number
        $invoice = 'INV-' . Str::upper(Str::random(8));

        // Simpan pesanan
        $pesanan = Pesanan::create([
            'user_id' => Auth::id(),
            'invoice' => $invoice,
            'total_harga' => $totalHarga,
        ]);

        // Simpan detail pesanan
        foreach ($cart as $key => $item) {
            $menu = Menu::where('nama', $key)->first();

            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'menu_id' => $menu ? $menu->id : null, // Sesuaikan jika ada relasi menu
                'nama_menu' => $key,
                'jumlah' => $item['qty'],
                'harga_satuan' => $item['harga'],
                'subtotal' => $item['qty'] * $item['harga']
            ]);
        } 

        

        // Kosongkan cart
        session()->forget('cart');

        return redirect()->route('order.invoice', $pesanan->id);
    }

    public function invoice($id)
    {
        $pesanan = Pesanan::with('detailPesanans.menu', 'user')->findOrFail($id);
        $pdf = PDF::loadView('invoice', compact('pesanan'));
        return $pdf->stream('invoice-'.$pesanan->invoice.'.pdf');
    }
    
    // Menampilkan semua pesanan (untuk admin)
    public function listPesanan()
    {
        $pesanans = \App\Models\Pesanan::with('user')->latest()->get();
        return view('admin.pesanan.index', compact('pesanans'));
    }

    // Menampilkan detail satu pesanan (untuk admin)
    public function detailPesanan($id)
    {
        $pesanan = Pesanan::with(['user', 'detailPesanans'])->findOrFail($id);
        return view('admin.pesanan.detail', compact('pesanan'));
    }

    // Menghapus pesanan dari dari muka bumi
    public function destroy($id)
    {
        $pesanan = \App\Models\Pesanan::findOrFail($id);
        $pesanan->delete();
        return redirect()->route('admin.pesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
    }