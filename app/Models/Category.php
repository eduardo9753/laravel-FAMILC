<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    
    //CAMPOS DE LA TABLA DE LA BASE DE DATOS
    protected $fillable = [
        'nombre',
        'slug'
    ];

    //UNA CATEGORIA PERTECENE A UN PRODUCTO
    public function prducto()
    {
        return $this->belongsTo(Product::class);
    }

}
