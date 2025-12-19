<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // --- DAFTARKAN SATPAM DI SINI ---
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,       // Satpam Admin (Cek Admin.php)
            'user'  => \App\Http\Middleware\UserAccess::class,  // Satpam User (Cek UserAccess.php)
        ]);
        // --------------------------------
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();