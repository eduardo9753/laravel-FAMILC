<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'slug',
        'descripcion',
        'estado',
        'user_id',
        'category_id',
        'stock'
    ];
}
