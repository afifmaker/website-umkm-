@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FFFBF0] py-12">
    <div class="container mx-auto px-6 max-w-6xl">
        
        <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-8 flex items-center gap-3">
            <span>🛒</span> Keranjang Saya
        </h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6 font-bold flex items-center gap-2">
                <span>✅</span> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6 font-bold flex items-center gap-2">
                <span>⚠️</span> {{ session('error') }}
            </div>
        @endif

        @if($carts->isEmpty())
            <div class="text-center py-24 bg-white rounded-[3rem] shadow-sm border border-gray-100">
                <span class="text-7xl block mb-6">🍽️</span>
                <h2 class="text-2xl font-black text-gray-800">Keranjangmu masih kosong.</h2>
                <p class="text-gray-500 mb-8 mt-2 font-medium">Perut lapar? Yuk, pesan kebab enak sekarang!</p>
                <a href="{{ route('menu') }}" class="inline-block bg-yellow-400 text-black px-8 py-4 rounded-full font-bold hover:bg-yellow-500 transition shadow-lg hover:shadow-yellow-200 hover:-translate-y-1">
                    Belanja Sekarang
                </a>
            </div>
        @else
            <div class="flex flex-col lg:flex-row gap-8 items-start">
                
                <div class="lg:w-2/3 w-full space-y-6">
                    @foreach($carts as $cart)
                    <div class="flex flex-col sm:flex-row items-center gap-6 bg-white p-5 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-md transition group">
                        
                        <div class="w-full sm:w-32 h-32 bg-gray-50 rounded-2xl flex-shrink-0 overflow-hidden relative">
                             <img src="{{ Str::startsWith($cart->product->image, 'http') ? $cart->product->image : asset('storage/' . $cart->product->image) }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                                 alt="{{ $cart->product->name }}">
                        </div>
                        
                        <div class="flex-1 text-center sm:text-left">
                            <h3 class="font-bold text-xl text-gray-900 mb-1">{{ $cart->product->name }}</h3>
                            <p class="text-gray-500 font-medium">Rp {{ number_format($cart->product->price, 0, ',', '.') }}</p>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="font-bold text-lg bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl border border-yellow-200">
                                x{{ $cart->quantity }}
                            </div>

                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-12 h-12 rounded-full bg-red-50 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition" title="Hapus Item">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="lg:w-1/3 w-full">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-xl border border-gray-100 sticky top-28">
                        <h3 class="font-black text-2xl text-gray-900 mb-6">Ringkasan Pesanan</h3>
                        
                        @php
                            $total = $carts->sum(function($cart) {
                                return $cart->product->price * $cart->quantity;
                            });
                        @endphp
                        
                        <div class="flex justify-between mb-4 text-gray-500 font-medium">
                            <span>Total Harga</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <hr class="border-dashed border-gray-200 my-4">
                        <div class="flex justify-between mb-8 text-3xl font-black text-gray-900">
                            <span>Total</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            
                            <p class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Pilih Metode Pembayaran</p>
                            
                            <div class="space-y-4 mb-8">
                                <label class="relative flex items-center p-4 rounded-2xl border-2 cursor-pointer transition-all duration-200 bg-gray-50 border-transparent hover:bg-white hover:border-yellow-400 has-[:checked]:bg-white has-[:checked]:border-yellow-400 has-[:checked]:shadow-md group">
                                    <input type="radio" name="payment_method" value="cod" class="peer sr-only" required>
                                    <div class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xl mr-3">🛵</div>
                                    <div class="flex-1">
                                        <span class="block font-bold text-gray-900">COD</span>
                                        <span class="text-xs text-gray-500 font-medium">Bayar di tempat (Delivery)</span>
                                    </div>
                                    <div class="hidden peer-checked:block text-yellow-500 font-bold text-xl">✓</div>
                                </label>

                                <label class="relative flex items-center p-4 rounded-2xl border-2 cursor-pointer transition-all duration-200 bg-gray-50 border-transparent hover:bg-white hover:border-yellow-400 has-[:checked]:bg-white has-[:checked]:border-yellow-400 has-[:checked]:shadow-md group">
                                    <input type="radio" name="payment_method" value="pickup" class="peer sr-only">
                                    <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center text-xl mr-3">🏪</div>
                                    <div class="flex-1">
                                        <span class="block font-bold text-gray-900">Ambil Sendiri</span>
                                        <span class="text-xs text-gray-500 font-medium">Datang ke Outlet</span>
                                    </div>
                                    <div class="hidden peer-checked:block text-yellow-500 font-bold text-xl">✓</div>
                                </label>
                            </div>

                            <button type="submit" class="w-full bg-gray-900 text-white py-4 rounded-xl font-bold hover:bg-yellow-500 hover:text-black transition shadow-lg transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                <span>Checkout via WhatsApp</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection