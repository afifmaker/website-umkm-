@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">

    <div class="flex justify-between items-center mb-8 bg-white p-6 rounded-2xl shadow-md border-l-8 border-yellow-400">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Daftar Menu</h1>
            <p class="text-gray-500">Pilih makanan favoritmu hari ini</p>
        </div>
        
        @if(Auth::check() && Auth::user()->role == 'admin')
        <a href="{{ route('menu.create') }}" class="bg-green-500 text-white px-6 py-3 rounded-xl font-bold shadow-lg hover:bg-green-600 hover:scale-105 transition transform flex items-center gap-2">
            <span>+</span> Tambah Menu Baru
        </a>
        @endif
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden group hover:-translate-y-2 transition duration-300 relative">
            
            <div class="h-56 overflow-hidden">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            </div>

            <div class="p-5">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-lg font-bold leading-tight">{{ $product->name }}</h3>
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-2 py-1 rounded-md">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>
                <p class="text-gray-500 text-sm mb-4 h-10 overflow-hidden">{{ Str::limit($product->description, 50) }}</p>
                
                <button class="w-full bg-yellow-400 text-black font-bold py-2 rounded-lg hover:bg-yellow-500 transition shadow-md">
                    Masuk Keranjang
                </button>

                @if(Auth::check() && Auth::user()->role == 'admin')
                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-end">
                        <form action="{{ route('menu.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus menu ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-xs font-bold hover:text-red-700 underline">
                                Hapus Menu Ini 🗑️
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection