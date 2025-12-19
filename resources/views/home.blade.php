@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden min-h-[90vh] flex items-center bg-[#FFFBF0]">
    
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[700px] h-[700px] bg-yellow-300 rounded-full mix-blend-multiply filter blur-[80px] opacity-20 animate-blob"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[600px] h-[600px] bg-orange-200 rounded-full mix-blend-multiply filter blur-[80px] opacity-20 animate-blob animation-delay-2000"></div>

    <div class="container mx-auto px-6 relative z-10">
        
        @if(session('success'))
        <div class="mb-6 bg-green-500 text-white px-6 py-4 rounded-xl shadow-lg font-bold flex items-center gap-3 animate-bounce max-w-md mx-auto md:mx-0">
            <span>✅</span> {{ session('success') }}
        </div>
        @endif

        <div class="flex flex-col-reverse md:flex-row items-center gap-12 md:gap-20">
            
            <div class="md:w-1/2 text-center md:text-left space-y-8">
                
                <div class="inline-flex items-center gap-2 bg-white px-5 py-2.5 rounded-full shadow-sm border border-orange-100 transform hover:scale-105 transition duration-300">
                    <span class="bg-orange-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wider">Promo</span>
                    <span class="text-sm font-bold text-gray-700">Gratis Ongkir Hari Ini! 🚀</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-black leading-[1.1] text-gray-900 tracking-tight">
                    Rasakan <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-orange-600">
                        Ledakan Rasa
                    </span> <br>
                    Di Mulutmu.
                </h1>
                
                <p class="text-gray-500 text-lg md:text-xl leading-relaxed max-w-lg mx-auto md:mx-0 font-medium">
                    Nikmati sensasi daging premium yang <span class="text-orange-500 font-bold italic">juicy</span> berpadu dengan saus rahasia yang melimpah.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start pt-4">
                    <a href="{{ route('menu') }}" class="group relative px-8 py-4 bg-gray-900 rounded-full text-white font-bold text-lg shadow-xl hover:shadow-2xl hover:bg-orange-600 transition-all duration-300 overflow-hidden">
                        <span class="relative z-10 group-hover:pr-4 transition-all">Pesan Sekarang</span>
                        <span class="absolute right-6 opacity-0 group-hover:opacity-100 group-hover:right-4 transition-all z-10">➔</span>
                    </a>
                    <a href="#menu-populer" class="px-8 py-4 bg-white border-2 border-gray-100 rounded-full text-gray-700 font-bold text-lg hover:border-yellow-400 hover:text-yellow-600 transition duration-300">
                        Lihat Menu
                    </a>
                </div>

                <div class="flex items-center gap-8 justify-center md:justify-start pt-6 opacity-80 grayscale hover:grayscale-0 transition duration-500">
                    <div class="flex -space-x-4">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=1" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=2" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white" src="https://i.pravatar.cc/100?img=3" alt="User">
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-600">+1k</div>
                    </div>
                    <div>
                        <div class="flex text-yellow-400 text-sm">★★★★★</div>
                        <p class="text-xs font-bold text-gray-500">4.9 Review Pelanggan</p>
                    </div>
                </div>
            </div>
            
            <div class="md:w-1/2 flex justify-center relative group">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-yellow-200 to-orange-200 rounded-full blur-[70px] opacity-40 animate-pulse"></div>
                
                <img src="{{ asset('img/burger-hero.png') }}" 
                     onerror="this.src='https://pngimg.com/d/burger_PNG9640.png'" 
                     alt="Premium Burger" 
                     class="relative w-[380px] md:w-[550px] z-10 drop-shadow-[0_30px_60px_rgba(0,0,0,0.3)] 
                            animate-[bounce_5s_infinite] transition-transform duration-500 hover:rotate-3 hover:scale-105">

                <div class="absolute bottom-10 -left-6 md:left-0 bg-white/80 backdrop-blur-xl p-4 rounded-2xl shadow-2xl border border-white/60 z-20 animate-[bounce_6s_infinite] animation-delay-1000">
                    <div class="flex items-center gap-4">
                        <div class="bg-green-100 p-3 rounded-full text-green-600">🔥</div>
                        <div>
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">Best Seller</p>
                            <p class="text-lg font-black text-gray-900">Double Beef</p>
                        </div>
                        <div class="ml-2">
                            <span class="text-xl font-bold text-orange-500">Rp 35k</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="menu-populer" class="py-24 bg-white relative rounded-t-[3rem] shadow-[0_-20px_60px_rgba(0,0,0,0.03)] z-20">
    <div class="container mx-auto px-6">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-orange-500 font-bold tracking-widest uppercase text-sm bg-orange-50 px-4 py-1 rounded-full">Menu Favorit</span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mt-4 mb-4">Paling Sering Dipesan</h2>
            <p class="text-gray-500 text-lg">Menu-menu pilihan yang paling dicintai oleh pelanggan setia kami minggu ini.</p>
        </div>

        @if($products->isEmpty())
            <div class="flex flex-col items-center justify-center py-20 bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200">
                <span class="text-6xl mb-4">🍽️</span>
                <p class="text-gray-400 font-bold text-lg">Menu belum tersedia.</p>
                <p class="text-gray-400 text-sm">Admin, silakan tambahkan menu dulu ya!</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($products as $product)
                
                <div class="group relative bg-white rounded-[2.5rem] p-5 border border-gray-100 transition-all duration-300 hover:shadow-[0_30px_60px_-15px_rgba(251,191,36,0.2)] hover:border-yellow-300 flex flex-col justify-between">
                    
                    <div>
                        <div class="h-64 w-full bg-[#FFFBF0] rounded-[2rem] flex items-center justify-center overflow-hidden mb-6 relative group-hover:bg-yellow-50 transition-colors">
                            <div class="absolute top-4 right-4 bg-white px-4 py-2 rounded-full shadow-md z-10 font-black text-gray-900 text-sm">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                            
                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-48 drop-shadow-lg transform transition duration-500 group-hover:scale-110 group-hover:rotate-6">
                        </div>

                        <div class="px-3 pb-3">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-2xl font-bold text-gray-900 group-hover:text-yellow-600 transition">{{ $product->name }}</h3>
                            </div>
                            <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-2 font-medium">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="px-3">
                        <form action="{{ route('cart.store', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-gray-900 text-white py-4 rounded-2xl font-bold hover:bg-yellow-500 hover:text-black transition-all duration-300 flex justify-center items-center gap-2 shadow-lg hover:shadow-yellow-200">
                                Tambah 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                            </button>
                        </form>
                    </div>

                </div>
                @endforeach
            </div>
        @endif
        
        <div class="text-center mt-16">
            <a href="{{ route('menu') }}" class="inline-block border-b-2 border-gray-900 text-gray-900 font-bold pb-1 hover:text-yellow-600 hover:border-yellow-600 transition">Lihat Semua Menu &rarr;</a>
        </div>
    </div>
</section>

<section class="container mx-auto px-6 py-20">
    <div class="bg-gray-900 rounded-[3rem] p-10 md:p-20 relative overflow-hidden flex flex-col md:flex-row items-center justify-between shadow-2xl">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-yellow-500 rounded-full filter blur-[120px] opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-orange-500 rounded-full filter blur-[100px] opacity-20"></div>

        <div class="relative z-10 max-w-2xl text-center md:text-left">
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6 leading-tight">
                Lapar Tengah Malam? <br>
                <span class="text-yellow-400">Kami Buka 24 Jam!</span>
            </h2>
            <p class="text-gray-400 text-lg mb-10 font-medium">
                Jangan biarkan perut kosong mengganggu tidurmu. Pesan sekarang, driver kami siap meluncur ke lokasimu.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                
                <a href="https://wa.me/6289523848425?text=Halo%20Admin%20BKR,%20saya%20mau%20pesan%20menu%20spesial%20dong!%20😋" 
                   target="_blank"
                   class="bg-yellow-500 text-black px-8 py-4 rounded-full font-bold hover:bg-yellow-400 transition shadow-[0_0_30px_rgba(234,179,8,0.4)] transform hover:-translate-y-1 inline-block text-center flex items-center justify-center gap-2">
                    <span>Pesan via WhatsApp</span> 📲
                </a>

            </div>
        </div>
        
        <div class="relative z-10 mt-12 md:mt-0 transform md:rotate-12 hover:rotate-0 transition duration-500">
             <div class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-[2rem]">
                <span class="text-9xl filter drop-shadow-2xl">🛵</span>
             </div>
        </div>
    </div>
</section>

@endsection