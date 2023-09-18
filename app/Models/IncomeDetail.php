<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeDetail extends Model
{
    use HasFactory;

     //CAMPOS DE LA TABLA DE LA BASE DE DATOS
     protected $fillable = [
        'income_id',
        'product_id',
        'cantidad',
        'precio_compra',
        'precio_venta'
    ];
}
