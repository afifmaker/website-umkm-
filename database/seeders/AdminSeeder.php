<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Masukkan Data Owner Apip
        DB::table('users')->insert([
            'name' => 'Owner Apip',
            'phone' => '089523848425',
            'email' => 'afif99amrullah@gmail.com', // Email Login
            'password' => Hash::make('admin123'),   // Password Login
            'role' => 'admin',                      // Jabatan: ADMIN
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}