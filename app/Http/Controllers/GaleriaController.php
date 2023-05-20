<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    //INDEX VISTA GALERIA
    public function index()
    {
        return view('cliente.galeria.index');
    }
}
