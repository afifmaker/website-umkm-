<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // 1. Tampilkan Halaman Keranjang
    public function index()
    {
        // Ambil data keranjang milik user yang sedang login
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        
        // Hitung total harga
        $total = $carts->sum(function($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('cart.index', compact('carts', 'total'));
    }

    // 2. Tambah Barang ke Keranjang
    public function store(Request $request, $productId)
    {
        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $productId)
                            ->first();

        if ($existingCart) {
            // Kalau barang sudah ada, tambah jumlahnya
            $existingCart->increment('quantity');
        } else {
            // Kalau belum ada, buat baru
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil masuk keranjang! 🛒');
    }

    // 3. Hapus Barang dari Keranjang
    public function destroy($id)
    {
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Barang dihapus.');
    }
}