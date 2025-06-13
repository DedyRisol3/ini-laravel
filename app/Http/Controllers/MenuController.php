<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'detail', 'show']);
        $this->middleware('role:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // Menampilkan semua menu
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $menus = Menu::all();
            return view('admin.index', compact('menus'));
        }

        $makanan = Menu::where('kategori', 'makanan')->where('status', 'tersedia')->get();
        $minuman = Menu::where('kategori', 'minuman')->where('status', 'tersedia')->get();
        $dessert = Menu::where('kategori', 'dessert')->where('status', 'tersedia')->get();

        return view('menu.index', compact('makanan', 'minuman', 'dessert'));
    }

    // Menampilkan detail menu berdasarkan nama
    public function detail($nama)
    {
        $item = Menu::where('nama', $nama)->firstOrFail();
        return view('menu_detail', compact('item'));
    }

    // Alternatif detail
    public function show($nama)
    {
        $item = Menu::where('nama', $nama)->firstOrFail();
        return view('menu.show', compact('item'));
    }

    // Form tambah menu
    public function create()
    {
        return view('admin.create');
    }

    // Simpan menu baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|in:makanan,minuman,dessert',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,habis',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('gambar_menu', 'public');
            $validated['gambar'] = $path;
        }

        $validated['user_id'] = Auth::id();

        Menu::create($validated);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Form edit menu
    public function edit(Menu $menu)
    {
        return view('admin.edit', compact('menu'));
    }

    // Simpan update menu
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|in:makanan,minuman,dessert',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,habis',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
                Storage::disk('public')->delete($menu->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('gambar_menu', 'public');
        }

        $menu->update($validated);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    // Hapus menu
    public function destroy(Menu $menu)
    {
        if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
