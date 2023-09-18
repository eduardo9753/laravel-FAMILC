<?php

namespace App\Http\Controllers\Admin\proveedor;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    //
    public function index()
    {
        $providers = Person::where('tipo_persona', '=', 'PROVEEDOR')->get();
        return view('admin.proveedor.index', [
            'providers' => $providers
        ]);
    }

    public function create()
    {
        return view('admin.proveedor.create');
    }

    public function store(Request $request)
    {
        //validar los datos
        $this->validate($request, [
            'nombres' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required|unique:people|max:16',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);


        //guardar los datos del producto
        $save = Person::create([
            'tipo_persona' => 'PROVEEDOR', //1:proveedor  2:Cliente
            'nombres' => $request->nombres,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);

        //REDIRECCIONAMOS
        return redirect()->route('admin.provider.index');
    }

    public function show(Person $provider)
    {
        return view('admin.proveedor.show', [
            'provider' => $provider
        ]);
    }


    public function update(Person $provider, Request $request)
    {
        //validar los datos
        $this->validate($request, [
            'nombres' => 'required',
            'tipo_documento' => 'required',
            'numero_documento' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        //ACTUALIZANDO LOS DATOS
        $provider->nombres = $request->nombres;
        $provider->tipo_documento = $request->tipo_documento;
        $provider->numero_documento = $request->numero_documento;
        $provider->direccion = $request->direccion;
        $provider->telefono = $request->telefono;
        $provider->email = $request->email;
        $provider->save();

        //RETORNAMOS LA VISTA CON LA TABLA DE DATOS
        return redirect()->route('admin.provider.index');
    }
}
