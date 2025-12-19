@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50/50 py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tight">Dashboard Overview</h1>
                <p class="text-gray-500 mt-1 text-lg">Selamat datang kembali, <span class="font-bold text-yellow-600">{{ Auth::user()->name }}</span>! 👋</p>
            </div>
            <div class="bg-white px-5 py-2.5 rounded-full shadow-sm border border-gray-100 text-sm font-medium text-gray-600 flex items-center gap-2">
                📅 {{ now()->isoFormat('dddd, D MMMM Y') }}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-8 rounded-[2rem] shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 flex items-center gap-6 hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-20 h-20 bg-yellow-50 rounded-[1.5rem] flex items-center justify-center text-4xl group-hover:rotate-12 transition">
                    🍔
                </div>
                <div>
                    <p class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-1">Total Menu</p>
                    <h3 class="text-4xl font-black text-gray-900 leading-none">{{ $totalMenu }}</h3>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-[2rem] shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 flex items-center gap-6 hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-20 h-20 bg-blue-50 rounded-[1.5rem] flex items-center justify-center text-4xl group-hover:rotate-12 transition">
                    👥
                </div>
                <div>
                    <p class="text-gray-400 text-sm font-bold uppercase tracking-wider mb-1">Pelanggan</p>
                    <h3 class="text-4xl font-black text-gray-900 leading-none">{{ $totalUser }}</h3>
                </div>
            </div>

             <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-[2rem] shadow-xl text-white flex items-center gap-6 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-500 rounded-full filter blur-[60px] opacity-20"></div>
                <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-[1.5rem] flex items-center justify-center text-3xl animate-pulse">
                    🚀
                </div>
                <div class="relative z-10">
                    <p class="text-white/60 text-sm font-bold uppercase tracking-wider mb-1">Status Operasional</p>
                    <h3 class="text-3xl font-black leading-none text-yellow-400">BUKA 24 JAM</h3>
                </div>
            </div>
        </div>

        <div class="mb-6">
             <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                ⚡ Aksi Cepat
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('menu.create') }}" class="group bg-white p-8 rounded-[2rem] border-2 border-dashed border-gray-200 hover:border-yellow-400 hover:bg-yellow-50/50 transition-all duration-300 flex items-center gap-6">
                <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 transition shadow-sm">
                    +
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-700 transition">Tambah Menu Baru</h3>
                    <p class="text-gray-400 text-sm font-medium mt-1">Upload produk makanan baru.</p>
                </div>
                 <div class="ml-auto opacity-0 group-hover:opacity-100 transition transform group-hover:translate-x-2 text-yellow-500">
                    ➝
                </div>
            </a>

            <a href="{{ route('menu') }}" class="group bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-6 hover:border-yellow-200">
                <div class="w-16 h-16 bg-gray-100 text-gray-600 rounded-2xl flex items-center justify-center text-2xl group-hover:scale-110 transition shadow-sm group-hover:bg-yellow-100 group-hover:text-yellow-600">
                    ✏️
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-700 transition">Kelola Daftar Menu</h3>
                    <p class="text-gray-400 text-sm font-medium mt-1">Edit harga, stok, atau hapus menu.</p>
                </div>
                <div class="ml-auto opacity-0 group-hover:opacity-100 transition transform group-hover:translate-x-2 text-yellow-500">
                    ➝
                </div>
            </a>
        </div>
    </div>
</div>
@endsection