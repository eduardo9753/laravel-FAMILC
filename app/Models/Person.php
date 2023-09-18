<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;


     //CAMPOS DE LA TABLA DE LA BASE DE DATOS
     protected $fillable = [
        'tipo_persona', //1:proveedor  2:Cliente
        'nombres',
        'tipo_documento',
        'numero_documento',
        'direccion',
        'telefono',
        'email'
    ];
}
