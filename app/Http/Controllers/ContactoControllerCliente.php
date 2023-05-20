<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoControllerCliente extends Controller
{
    //VISTA CONTACTO
    public function index()
    {
        return view('cliente.contacto.index');
    }
}
