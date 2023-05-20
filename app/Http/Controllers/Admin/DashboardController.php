<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //PROTEGIENDO LAS RUTAS
    public function __construct()
    {
        //ESTA LINEA PROTEGRA A TODOS LOS METODOS 
        $this->middleware('auth');

        /*ESTA LINEA PROTEGERA SOLO A LOS METODOS QUE LE PASES
        $this->middleware('auth' , ['only' => ['index','create']]);*/

        /**ESTE METODO PROTEGERA A LOS METODOS EXCEPTO A LOS METODOS QUE LE PASES
        $this->middleware('auth')->except(['show','index']);*/
    }
    
    //FUNCION PINCIPAL Y UNICA
    public function __invoke()
    {
        return view('admin.dashboard');
    }
}
