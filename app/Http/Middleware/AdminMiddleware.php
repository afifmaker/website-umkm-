<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Apakah login? DAN Apakah role-nya 'admin'?
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request); // Silakan lewat
        }

        // Kalau bukan, tendang ke halaman utama
        return redirect('/')->with('error', 'Anda tidak punya akses!');
    }
}