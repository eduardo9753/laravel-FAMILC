<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaControllerCliente extends Controller
{
    //INDEX
    public function index()
    {
        return view('cliente.empresa.index');
    }
}
