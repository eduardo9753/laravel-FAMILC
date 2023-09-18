<?php

namespace App\Http\Controllers\cliente\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //FUNCION PARA  VER LOS DATOS DE MIS CARRITO
    public function index()
    {
        return view('cliente.cart.index');
    }

    public function create()
    {
        return view('cliente.cart.create');
    }
}
