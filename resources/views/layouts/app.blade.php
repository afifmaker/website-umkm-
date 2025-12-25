<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Burger Dan Kebab Rizki</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #F59E0B; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #D97706; }
    </style>
</head>
<body class="bg-[#FFFBF0] text-gray-800 antialiased selection:bg-yellow-300 selection:text-yellow-900">

    <nav class="fixed w-full z-50 top-0 start-0 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-white/20 shadow-sm">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between px-6 py-4">
            
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="bg-yellow-400 p-2.5 rounded-2xl shadow-yellow-200 shadow-lg group-hover:rotate-12 transition duration-300">
                    <span class="text-2xl">🌯</span> 
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-black tracking-tight text-gray-900">BKR<span class="text-yellow-500">.</span></span>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-1 bg-gray-50/80 px-2 py-1.5 rounded-full border border-gray-200 shadow-inner">
                <a href="{{ route('home') }}" class="px-5 py-2 rounded-full text-sm font-bold text-gray-600 hover:text-yellow-700 hover:bg-white hover:shadow-sm transition {{ request()->routeIs('home') ? 'bg-white text-yellow-700 shadow-sm' : '' }}">
                    Home
                </a>
                <a href="{{ route('menu') }}" class="px-5 py-2 rounded-full text-sm font-bold text-gray-600 hover:text-yellow-700 hover:bg-white hover:shadow-sm transition {{ request()->routeIs('menu') ? 'bg-white text-yellow-700 shadow-sm' : '' }}">
                    Menu
                </a>
                
                @if(!Auth::check() || Auth::user()->role != 'admin')
                    <a href="{{ route('cart.index') }}" class="px-5 py-2 rounded-full text-sm font-bold text-gray-600 hover:text-yellow-700 hover:bg-white hover:shadow-sm transition {{ request()->routeIs('cart.index') ? 'bg-white text-yellow-700 shadow-sm' : '' }}">
                        Keranjang
                    </a>
                @endif

                @if(Auth::check() && Auth::user()->role == 'admin')
                    <div class="w-px h-6 bg-gray-300 mx-1"></div> 
                    <a href="{{ route('menu.create') }}" class="px-5 py-2 rounded-full text-sm font-bold text-red-500 hover:bg-red-500 hover:text-white transition flex items-center gap-1">
                        <span>+</span> Menu
                    </a>
                @endif
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <div class="relative group">
                        
                        <button class="flex items-center justify-center w-12 h-12 bg-yellow-400 text-gray-900 rounded-2xl shadow-lg hover:shadow-yellow-200 hover:-translate-y-1 hover:bg-yellow-300 transition-all duration-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-7 h-7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>

                        <div class="absolute right-0 top-full mt-4 w-64 bg-white rounded-[2rem] shadow-2xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right z-50 overflow-hidden">
                            
                            <div class="bg-gray-50 p-6 border-b border-gray-100 text-center">
                                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mx-auto mb-3 flex items-center justify-center text-2xl shadow-md text-white font-bold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Halo, Bos!</p>
                                <p class="text-lg font-black text-gray-900 truncate leading-tight">{{ Auth::user()->name }}</p>
                            </div>

                            <div class="p-2">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-xl text-gray-600 font-bold hover:bg-yellow-50 hover:text-yellow-700 transition flex items-center gap-3">
                                    <span>🏠</span> Dashboard
                                </a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-3 rounded-xl text-gray-600 font-bold hover:bg-yellow-50 hover:text-yellow-700 transition flex items-center gap-3">
                                    <span>⚙️</span> Edit Profil
                                </a>
                            </div>

                            <div class="p-2 border-t border-gray-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-3 rounded-xl text-red-500 font-bold hover:bg-red-50 transition flex items-center gap-3">
                                        <span>🚪</span> Keluar Akun
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                @else
                    <a href="{{ route('login') }}" class="bg-gray-900 text-white px-7 py-3 rounded-full font-bold text-sm shadow-xl hover:bg-yellow-500 hover:text-black hover:shadow-yellow-500/30 transition transform hover:-translate-y-1">
                        Masuk Akun
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="pt-24 min-h-screen">
        {{-- Menampilkan slot jika menggunakan <x-app-layout> --}}
        {{ $slot ?? '' }}

        {{-- Menampilkan content jika menggunakan @extends --}}
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-100 mt-20 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-2xl font-black mb-4">Burger & Kebab Rizki<span class="text-yellow-500">.</span></h2>
            <div class="flex justify-center gap-6 mb-8 text-gray-500 font-medium">
                <a href="#" class="hover:text-yellow-500 transition">Tentang Kami</a>
                <a href="#" class="hover:text-yellow-500 transition">Lokasi</a>
                <a href="#" class="hover:text-yellow-500 transition">Instagram</a>
            </div>
            <p class="text-gray-400 text-sm">&copy; 2024 Dibuat dengan ❤️ dan 🌯 di Indonesia.</p>
        </div>
    </footer>
</body>
</html>