<?php

namespace App\Http\Controllers\cliente\contacto;

use App\Http\Controllers\Controller;

class ContactoControllerCliente extends Controller
{
    //VISTA CONTACTO
    public function index()
    {
        return view('cliente.contacto.index');
    }
}
