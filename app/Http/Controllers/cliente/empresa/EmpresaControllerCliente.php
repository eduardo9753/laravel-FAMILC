<?php

namespace App\Http\Controllers\cliente\empresa;

use App\Http\Controllers\Controller;

class EmpresaControllerCliente extends Controller
{
    //INDEX
    public function index()
    {
        return view('cliente.empresa.index');
    }
}
