<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Mengizinkan kolom ini diisi data
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}