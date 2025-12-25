<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        
        $total = $carts->sum(function($cart) {
            return $cart->product->price * $cart->quantity;
        });

        return view('cart.index', compact('carts', 'total'));
    }

    public function store(Request $request, $productId)
    {
        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $productId)
                            ->first();

        if ($existingCart) {
            $existingCart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Berhasil masuk keranjang!');
    }

    public function destroy($id)
    {
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Barang dihapus.');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:cod,pickup',
        ]);

        $user = Auth::user();
        $carts = Cart::with('product')->where('user_id', $user->id)->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        $message = "Halo Admin BKR!%0A";
        $message .= "Saya mau pesan:%0A%0A";

        $totalBayar = 0;

        foreach ($carts as $cart) {
            $subtotal = $cart->product->price * $cart->quantity;
            $totalBayar += $subtotal;
            
            $message .= "- " . $cart->product->name . " (" . $cart->quantity . "x) : Rp " . number_format($subtotal, 0, ',', '.') . "%0A";
        }

        $message .= "%0A*Total Bayar: Rp " . number_format($totalBayar, 0, ',', '.') . "*";
        
        if ($request->payment_method == 'cod') {
            $message .= "%0A%0A*Metode: COD (Diantar ke Rumah)*";
            $message .= "%0A Pemesan: " . $user->name;
            $message .= "%0A Alamat: (Mohon isi alamat lengkap disini...)";
        } else {
            $message .= "%0A%0A*Metode: Ambil Sendiri / Makan di Tempat*";
            $message .= "%0A Pemesan: " . $user->name;
            $message .= "%0A Jam Pengambilan: (Mohon isi jam...)";
        }

        $message .= "%0A%0ATerima kasih!";

        $noHpAdmin = '6289523848425'; 
        
        return redirect()->away("https://wa.me/{$noHpAdmin}?text={$message}");
    }
}