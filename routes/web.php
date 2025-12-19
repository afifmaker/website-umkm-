<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\KebabController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- 1. HALAMAN PUBLIK (Bisa diakses siapa saja) ---
Route::get('/', [KebabController::class, 'index'])->name('home');
Route::get('/menu', [KebabController::class, 'menu'])->name('menu');


// --- 2. AREA UMUM USER LOGIN (Dashboard Pintar & Profil) ---
Route::middleware(['auth'])->group(function () {
    
    // LOGIKA DASHBOARD PINTAR (Memisahkan Tampilan Admin vs User)
    Route::get('/dashboard', function () {
        
        // A. Jika yang login adalah ADMIN
        if (Auth::user()->role === 'admin') {
            // Hitung data untuk statistik Admin
            $totalMenu = Product::count();
            $totalUser = User::where('role', 'user')->count();
            
            // Tampilkan view khusus Admin
            return view('admin.dashboard', compact('totalMenu', 'totalUser'));
        }

        // B. Jika yang login User Biasa, tampilkan Dashboard Member biasa
        return view('dashboard');
        
    })->name('dashboard');


    // Fitur Profil (Ganti Password/Hapus Akun)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// --- 3. KHUSUS PEMBELI (Admin DILARANG Masuk Sini) ---
// Middleware 'user' akan menendang Admin jika coba masuk keranjang
Route::middleware(['auth', 'user'])->group(function () {
    
    // Fitur Keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    
    // RUTE PENTING: PROSES CHECKOUT KE WHATSAPP
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});


// --- 4. KHUSUS ADMIN (Pembeli DILARANG Masuk Sini) ---
Route::middleware(['auth', 'admin'])->group(function () {
    
    // Tambah Menu
    Route::get('/menu/create', [KebabController::class, 'create'])->name('menu.create');
    Route::post('/menu', [KebabController::class, 'store'])->name('menu.store');
    
    // Edit Menu (Update)
    Route::get('/menu/{id}/edit', [KebabController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [KebabController::class, 'update'])->name('menu.update');

    // Hapus Menu
    Route::delete('/menu/{id}', [KebabController::class, 'destroy'])->name('menu.destroy');
});


// --- 5. AREA AUTHENTIKASI (Login, Register, Logout) ---
require __DIR__.'/auth.php';