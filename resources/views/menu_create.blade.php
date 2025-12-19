@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center py-10 px-4">
    <div class="bg-white w-full max-w-lg p-8 rounded-3xl shadow-2xl border-4 border-yellow-400">
        <h2 class="text-3xl font-bold text-center mb-6">Tambah Menu Baru 🍳</h2>
        
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            
            <div>
                <label class="block font-bold mb-1">Nama Makanan</label>
                <input type="text" name="name" required class="w-full rounded-xl border-gray-300 focus:border-yellow-500 focus:ring-yellow-500" placeholder="Contoh: Kebab Super">
            </div>

            <div>
                <label class="block font-bold mb-1">Deskripsi</label>
                <textarea name="description" rows="3" required class="w-full rounded-xl border-gray-300 focus:border-yellow-500 focus:ring-yellow-500"></textarea>
            </div>

            <div>
                <label class="block font-bold mb-1">Harga (Rp)</label>
                <input type="number" name="price" required class="w-full rounded-xl border-gray-300 focus:border-yellow-500 focus:ring-yellow-500" placeholder="15000">
            </div>

            <div>
                <label class="block font-bold mb-1">Foto Makanan</label>
                <input type="file" name="image" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200">
            </div>

            <div class="flex gap-3 pt-4">
                <a href="{{ route('menu') }}" class="w-1/2 text-center py-3 rounded-xl border border-gray-300 hover:bg-gray-50 font-bold">Batal</a>
                <button type="submit" class="w-1/2 bg-yellow-500 text-white py-3 rounded-xl hover:bg-yellow-600 font-bold shadow-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection