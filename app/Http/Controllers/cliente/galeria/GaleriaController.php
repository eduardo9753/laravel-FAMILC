<?php

namespace App\Http\Controllers\cliente\galeria;

use App\Http\Controllers\Controller;

class GaleriaController extends Controller
{
    //INDEX VISTA GALERIA
    public function index()
    {
        return view('cliente.galeria.index');
    }
}
