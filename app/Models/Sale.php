<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    //CAMPOS DE LA TABLA DE LA BASE DE DATOS
    protected $fillable = [
        'person_id',
        'tipo_documento',
        'numero_documento',
        'fecha',
        'impuesto',
        'total_venta',
        'estado'
    ];
}
