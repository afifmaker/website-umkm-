<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-[#FFC727]">
        
        <div class="w-full sm:max-w-md px-8 py-10 bg-[#FF8811] shadow-2xl sm:rounded-[40px] relative border-b-4 border-orange-600">
            
            <div class="flex justify-center mb-4 transform hover:scale-110 transition duration-300 cursor-pointer">
                 <span class="text-7xl drop-shadow-xl">🌯</span>
            </div>

            <h2 class="text-center text-white text-3xl font-extrabold mb-8 tracking-widest drop-shadow-md uppercase">
                LOGIN
            </h2>

            <x-auth-session-status class="mb-4 text-center font-bold text-white bg-red-500 rounded-lg p-2 shadow-lg" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="group">
                    <input id="email" type="text" name="email" :value="old('email')" required autofocus
                        placeholder="Username" 
                        class="block w-full px-6 py-4 rounded-2xl border-none text-center text-gray-600 placeholder-gray-400 focus:ring-4 focus:ring-yellow-300 shadow-lg font-bold text-lg transition-transform focus:scale-105" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-center text-white font-bold bg-red-500 rounded-md text-xs py-1" />
                </div>

                <div class="group">
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        placeholder="Password"
                        class="block w-full px-6 py-4 rounded-2xl border-none text-center text-gray-600 placeholder-gray-400 focus:ring-4 focus:ring-yellow-300 shadow-lg font-bold text-lg transition-transform focus:scale-105" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-center text-white font-bold bg-red-500 rounded-md text-xs py-1" />
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-white text-black font-extrabold py-4 px-4 rounded-2xl shadow-[0_4px_0_rgb(0,0,0,0.2)] 
                    transition-all duration-150 ease-in-out
                    hover:bg-gray-50 hover:-translate-y-1 hover:shadow-[0_6px_0_rgb(0,0,0,0.2)]
                    active:bg-yellow-100 active:translate-y-1 active:shadow-none active:scale-95
                    text-xl tracking-wide uppercase">
                        Masuk Sekarang
                    </button>
                </div>

                <div class="text-center mt-8">
                    <p class="text-white text-sm font-semibold">
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-white font-black hover:text-yellow-200 ml-1 underline decoration-2 underline-offset-4 transition">
                            Daftar disini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>