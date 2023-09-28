<?php

namespace App\Http\Controllers\cliente\venta;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Mail\MailController;
use App\Mail\UsuarioMail;
use App\Models\Person;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SaleControllerCliente extends Controller
{
    //FUNCION QUE GUARDA AL CLIENTE - A LA VENTA Y DETALLE VENTA
    public function store(Request $request)
    {
        //ARREGLO DE DATOS PARA VALIDAR EL STOCK
        $product_id = $request->product_id;
        $cantidad = $request->cantidad;
        $contStock = 0;
        while ($contStock < count($product_id)) {
            //BUSCAMOS AL PRODUCTO POR ID Y VALIDAMOS EL STOCK
            $producto = Product::find($product_id[$contStock]);
            $stock_actual = $producto->stock;
            if ($stock_actual <= $cantidad[$contStock]) {
                return response()->json(['code' => 2, 'msg' => $producto->nombre,]);
            }
            $contStock = $contStock + 1;
        }


        /*GUARDAMOS AL CLIENTE dd($request->product_id);*/
        $person = Person::where('numero_documento', '=', $request->numero_documento)->first();
        if ($person) {
            $person_id = $person->id;
        } else {
            $person = new Person();
            $person->tipo_persona = 'CLIENTE';
            $person->nombres = $request->nombres;
            $person->tipo_documento = $request->tipo_documento;
            $person->numero_documento = $request->numero_documento;
            $person->direccion = $request->direccion;
            $person->telefono = $request->telefono;
            $person->email = $request->email;
            $person->save();
            $person_id = $person->id;
        }

        /**GUARDAMOS LA VENTA*/
        $sale = new Sale();
        $sale->person_id = $person_id;
        $sale->fecha = date('Y-m-d H:i:s');
        $sale->inpuesto = 18;
        $sale->total_venta = $request->total_venta;
        $sale->estado = 'ENTREGAR';
        $sale->save();


        //ARREGLO DE DATOS PARA ALMACEMAR DEL DETALLE VENTA(pedido) 
        $product_id = $request->product_id;
        $cantidad = $request->cantidad;
        $precio_venta = $request->precio_venta;
        $cont = 0;
        while ($cont < count($product_id)) {
            $detail = new SaleDetail();
            $detail->sale_id = $sale->id;
            $detail->product_id = $product_id[$cont];
            $detail->cantidad = $cantidad[$cont];
            $detail->precio_venta = $precio_venta[$cont];
            $save = $detail->save();
            $cont = $cont + 1;
        }

        if ($save) {
            /*Mail::to(['j.a_alarcon_24@outlook.com', 'nsnyliz@gmail.com', 'Huamanirosase@gmail.com', 'nunezcancharimabell@gmail.com'])->send(new AdminMail($request->nombres, $request->total_venta, $request->telefono));
            Mail::to($person->email)->send(new UsuarioMail($request->nombres, $request->total_venta, $request->telefono));*/
            Mail::to($person->email)->send(new UsuarioMail($request->nombres, $request->total_venta, $request->telefono));
            return response()->json([
                'code' => 1,
                'msg' => 'Su Pedido fue guardado Correctamente'
            ]);
        } else {
            return response()->json([
                'code' => 0,
                'msg' => 'Hubo un error en el registro de su pedido'
            ]);
        }
    }
}
