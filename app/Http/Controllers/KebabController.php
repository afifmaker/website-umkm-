<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KebabController extends Controller
{
    // 1. Halaman Depan (Home)
    public function index()
    {
        // Ambil 3 menu terbaru untuk banner/highlight
        $products = Product::latest()->take(3)->get();
        return view('home', compact('products'));
    }

    // 2. Halaman Semua Menu (Dengan Fitur Search & Pagination)
    public function menu(Request $request)
    {
        // Mulai query produk
        $query = Product::query();

        // Cek apakah ada pencarian?
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Ambil data (paginate 9 item per halaman biar rapi di grid)
        $products = $query->latest()->paginate(9);

        return view('menu', compact('products'));
    }

    // 3. Form Tambah Menu (Hanya Admin)
    public function create()
    {
        return view('menu_create');
    }

    // 4. Proses Simpan Menu (Hanya Admin)
    public function store(Request $request)
    {
        // Validasi input agar data bersih
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Support WebP juga
        ]);

        // Upload Gambar ke Folder 'public/storage/menu-images'
        // Pastikan sudah menjalankan: php artisan storage:link
        $imagePath = $request->file('image')->store('menu-images', 'public');

        // Simpan ke Database
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('menu')->with('success', 'Menu berhasil ditambahkan! 🌯');
    }

    // 5. Hapus Menu (Hanya Admin)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // LOGIKA PINTAR: Hapus gambar fisik HANYA JIKA itu file upload (bukan link internet)
        // Kita cek apakah path gambarnya tidak mengandung 'http'
        if ($product->image && !Str::startsWith($product->image, 'http')) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        
        return redirect()->back()->with('success', 'Menu berhasil dihapus!');
    }
}