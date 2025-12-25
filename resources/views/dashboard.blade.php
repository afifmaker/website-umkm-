<x-app-layout>
    {{-- Container Utama --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
        
            {{-- 1. HERO SECTION (Dark Mode Premium Card) --}}
            <div class="relative bg-gray-900 rounded-[3rem] p-8 md:p-16 overflow-hidden shadow-2xl shadow-gray-200 mb-12 transform hover:scale-[1.01] transition-all duration-500 group">
                
                {{-- Background Effects --}}
                <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-500 rounded-full filter blur-[120px] opacity-20 group-hover:opacity-30 transition duration-700"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-orange-500 rounded-full filter blur-[100px] opacity-20 group-hover:opacity-30 transition duration-700"></div>
                
                {{-- Content --}}
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-10">
                    <div class="text-center md:text-left">
                        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/10 text-yellow-300 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest mb-6 shadow-lg">
                            <span>⭐</span> Member Prioritas
                        </div>
                        <h1 class="text-4xl md:text-6xl font-black text-white mb-3 leading-tight tracking-tight">
                            Hi, {{ Str::before(Auth::user()->name, ' ') }}! 👋
                        </h1>
                        <p class="text-gray-400 text-lg md:text-xl font-medium max-w-lg">
                            Mau makan enak apa hari ini? Perut kenyang, hati senang.
                        </p>
                    </div>
                    
                    {{-- Points Card --}}
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-[2.5rem] text-center min-w-[240px] shadow-2xl transform rotate-3 hover:rotate-0 transition duration-300">
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-2">BKR Points</p>
                        <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-400 leading-none mb-1">
                            150
                        </div>
                        <span class="text-sm font-medium text-gray-500">Points Available</span>
                    </div>
                </div>
            </div>

            {{-- 2. QUICK ACTIONS GRID --}}
            <div class="flex items-center justify-between mb-8 px-2">
                <h2 class="text-2xl font-black text-gray-800">Navigasi Cepat</h2>
                <span class="text-sm text-gray-400 font-medium">Pilih aktivitasmu 👇</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                
                {{-- Card: Pesan Menu --}}
                <a href="{{ route('menu') }}" class="group bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.03)] hover:shadow-[0_20px_60px_-15px_rgba(251,191,36,0.2)] hover:border-yellow-200 transition-all duration-300 flex flex-col items-center md:items-start text-center md:text-left relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-50 rounded-full filter blur-[60px] opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    
                    <span class="text-6xl mb-6 transform group-hover:scale-110 group-hover:rotate-12 transition duration-300 inline-block drop-shadow-lg">🍔</span>
                    
                    <div class="relative z-10 w-full">
                        <h3 class="text-3xl font-black text-gray-900 mb-3 group-hover:text-yellow-600 transition">Pesan Menu</h3>
                        <p class="text-gray-500 text-lg leading-relaxed mb-8">
                            Lihat daftar burger & kebab legendaris kami.
                        </p>
                        <div class="w-full md:w-auto inline-flex justify-center items-center gap-2 bg-gray-50 text-gray-600 font-bold px-8 py-4 rounded-2xl group-hover:bg-yellow-400 group-hover:text-gray-900 transition shadow-sm">
                            Lihat Menu <span>&rarr;</span>
                        </div>
                    </div>
                </a>

                {{-- Card: Keranjang --}}
                <a href="{{ route('cart.index') }}" class="group bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.03)] hover:shadow-[0_20px_60px_-15px_rgba(249,115,22,0.2)] hover:border-orange-200 transition-all duration-300 flex flex-col items-center md:items-start text-center md:text-left relative overflow-hidden">
                     <div class="absolute top-0 right-0 w-64 h-64 bg-orange-50 rounded-full filter blur-[60px] opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    
                    <span class="text-6xl mb-6 transform group-hover:scale-110 group-hover:-rotate-12 transition duration-300 inline-block drop-shadow-lg">🛒</span>
                    
                    <div class="relative z-10 w-full">
                        <h3 class="text-3xl font-black text-gray-900 mb-3 group-hover:text-orange-600 transition">Keranjang Saya</h3>
                        <p class="text-gray-500 text-lg leading-relaxed mb-8">
                            Cek item pilihanmu sebelum bayar.
                        </p>
                        <div class="w-full md:w-auto inline-flex justify-center items-center gap-2 bg-gray-50 text-gray-600 font-bold px-8 py-4 rounded-2xl group-hover:bg-orange-500 group-hover:text-white transition shadow-sm">
                            Lihat Keranjang <span>&rarr;</span>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>