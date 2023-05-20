<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //INDEX "FORMULARIO DE REGISTRO"
    public function index()
    {
        return view('admin.auth.register');
    }

    //GUARDAR LOS DATOS
    public function store(Request $request)
    {
        //VALIDAMOS LOS DATOS
       $this->validate($request, [
          'nombre' => 'required|min:4|max:20',
          'email' => 'required|unique:users|email|max:60',
          'password' => 'required|confirmed|min:6'
       ]);

        //GUARMOS LOS DATOS
        User::create([
            //CAMPOS TABLA  -  CAMPOS DEL REQUEST
            'name'  => $request->nombre,
            'email' => $request->email,
            'foto'  => '',
            'password' => Hash::make($request->password)
        ]);

        //GUARDAR LOS DATOS DE LA SESSION INICIADA
        auth()->attempt([
           'email' => $request->email,
           'password' => $request->password
        ]);

        //REDIRECCIONAMOS
        return redirect()->route('dashboard.index');
    }
}
