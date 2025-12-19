<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Kita isi dengan 3 Menu Andalan
        DB::table('products')->insert([
            [
                'name' => 'Kebab Monster Beef',
                'description' => 'Daging sapi premium extra banyak dengan saus keju lumer dan sayuran segar.',
                'price' => 35000,
                'image' => 'https://pngimg.com/uploads/kebab/kebab_PNG8.png', // Gambar Online
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Burger King Wagyu',
                'description' => 'Burger dengan patty wagyu asli, double cheese, dan caramelized onion.',
                'price' => 55000,
                'image' => 'https://pngimg.com/d/burger_PNG9640.png', // Gambar Online
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kebab Ayam Crispy',
                'description' => 'Perpaduan ayam goreng tepung renyah dengan kulit tortilla yang lembut.',
                'price' => 25000,
                'image' => 'https://static.vecteezy.com/system/resources/previews/025/064/813/original/kebab-with-ai-generated-free-png.png', // Gambar Online
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}