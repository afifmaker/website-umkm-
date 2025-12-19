@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FFFBF0] py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        
        <div class="relative bg-gray-900 rounded-[3rem] p-10 md:p-16 overflow-hidden shadow-2xl mb-16 transform hover:scale-[1.01] transition-all duration-500 group">
            <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-500 rounded-full filter blur-[120px] opacity-30 group-hover:opacity-40 transition duration-700"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-orange-500 rounded-full filter blur-[100px] opacity-20 group-hover:opacity-30 transition duration-700"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-10">
                <div class="text-center md:text-left">
                    <div class="inline-block bg-white/10 backdrop-blur-md border border-white/20 text-yellow-300 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-4">
                        ⭐ Member Prioritas
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black text-white mb-2 leading-tight">
                        Hi, {{Str::before(Auth::user()->name, ' ')}}! 👋
                    </h1>
                    <p class="text-gray-300 text-lg font-medium">Mau makan enak apa hari ini?</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-lg border border-white/10 p-6 rounded-[2rem] text-center min-w-[200px] shadow-inner">
                    <p class="text-sm text-gray-300 font-bold uppercase tracking-wider mb-2">BKR Points</p>
                    <p class="text-5xl font-black text-yellow-400 leading-none">150 <span class="text-lg text-white/80">pts</span></p>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center md:text-left">Navigasi Cepat</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <a href="{{ route('menu') }}" class="group bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_60px_-15px_rgba(251,191,36,0.3)] hover:border-yellow-300 transition-all duration-300 flex flex-col items-center md:items-start text-center md:text-left relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-100 rounded-full filter blur-[80px] opacity-0 group-hover:opacity-50 transition duration-500"></div>
                <span class="text-6xl mb-6 transform group-hover:scale-110 group-hover:rotate-12 transition duration-300 inline-block">🍔</span>
                <h3 class="text-3xl font-bold text-gray-900 mb-3 relative z-10">Pesan Menu</h3>
                <p class="text-gray-500 text-lg leading-relaxed relative z-10">Lihat daftar menu lengkap kami, pilih favoritmu, dan pesan sekarang.</p>
                <div class="mt-8 bg-yellow-50 text-yellow-700 font-bold px-8 py-3 rounded-full group-hover:bg-yellow-400 group-hover:text-black transition z-10 shadow-sm">
                    Lihat Menu ➔
                </div>
            </a>

            <a href="{{ route('cart.index') }}" class="group bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_60px_-15px_rgba(249,115,22,0.3)] hover:border-orange-300 transition-all duration-300 flex flex-col items-center md:items-start text-center md:text-left relative overflow-hidden">
                 <div class="absolute top-0 right-0 w-64 h-64 bg-orange-100 rounded-full filter blur-[80px] opacity-0 group-hover:opacity-50 transition duration-500"></div>
                <span class="text-6xl mb-6 transform group-hover:scale-110 group-hover:-rotate-12 transition duration-300 inline-block">🛒</span>
                <h3 class="text-3xl font-bold text-gray-900 mb-3 relative z-10">Keranjang Saya</h3>
                <p class="text-gray-500 text-lg leading-relaxed relative z-10">Cek kembali item yang sudah kamu pilih sebelum melakukan pembayaran.</p>
                <div class="mt-8 bg-gray-50 text-gray-700 font-bold px-8 py-3 rounded-full group-hover:bg-orange-500 group-hover:text-white transition z-10 shadow-sm">
                    Lihat Keranjang ➔
                </div>
            </a>

        </div>

    </div>
</div>
@endsection