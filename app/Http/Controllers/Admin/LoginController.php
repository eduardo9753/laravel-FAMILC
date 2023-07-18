<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //FUNCION INDEX RETORNA UNA VISTA
    public function index()
    {
        return view('admin.auth.login');
    }


    //AUTENTICACION DEL USUARIO
    public function store(Request $request)
    {
       //VALIDAMOS LOS CAMPOS DEL FORMULARIO
       $this->validate($request , [
           'email' => 'required|email',
           'password' => 'required'
       ]);


       /*COMPROBAMOS LOS DATOS CON LA BASE DE DATOS
       $request->remenber : RECORDAR SESSION*/
       if(!auth()->attempt($request->only('email','password'), $request->remenber)){
          return back()->with('mensaje', 'Tus credenciales estan incorrectas');
       }

       /*REDIRECCIONAMOS A LA VISTA PRINCIPAK*/
       return redirect()->route('dashboard.index', auth()->user()->username);
    }

    //SALIR DE LA SESSION
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
