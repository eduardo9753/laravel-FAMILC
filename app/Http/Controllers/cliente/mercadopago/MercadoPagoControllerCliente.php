<?php

namespace App\Http\Controllers\cliente\mercadopago;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Mail\UsuarioMail;
use App\Models\Pay;
use App\Models\Person;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;


class MercadoPagoControllerCliente extends Controller
{
    //CREAR EL BOTON DE MERCADOPAGO
    public function pay(Request $request)
    {
        //ARREGLO DE DATOS PARA VALIDAR EL STOCK
        $product_id = $request->product_id;
        $cantidad = $request->cantidad;
        $contStock = 0;
        while ($contStock < count($product_id)) {
            //BUSCAMOS AL PRODUCTO POR ID Y VALIDAMOS EL STOCK
            $producto = Product::find($product_id[$contStock]);
            $stock_actual = $producto->stock;
            if ($stock_actual <= $cantidad[$contStock]) { //<
                return response()->json(['code' => 2, 'msg' => $producto->nombre,]);
            }
            $contStock = $contStock + 1;
        }



        /* Agrega credenciales*/
        SDK::setAccessToken(config('mercadopago.token'));
        $public_key = config('mercadopago.public_key');
        $preference = new Preference();
        $carrito = [];

        // Crea un ítem en la preferencia
        $product_id = $request->product_id;
        $cantidad = $request->cantidad;
        $precio_venta = $request->precio_venta;
        $cont = 0;
        while ($cont < count($product_id)) {
            $item = new Item();
            $item->title = 'Mi producto';
            $item->quantity = $cantidad[$cont];
            $item->unit_price = $precio_venta[$cont];
            $cont = $cont + 1;

            $carrito[] = $item;
        }
        $preference->items = $carrito;

        // Guarda los datos del $request en la sesión
        $request->session()->put('data', $request->all());
        $preference->back_urls = [
            'success' => route('mercadopago.success'),
            'failure' => route('mercadopago.failure'),
            'pending' => route('mercadopago.pending'),
        ];
        $preference->auto_return = 'approved'; // Redirige automáticamente al usuario después de un pago aprobado

        // Guarda la preferencia
        $save = $preference->save();

        // Obtiene el link de pago
        $paymentLink = $preference->init_point;
        //dd($carrito);//dd($preference);//echo $preference->id;

        if ($save) {
            $dato = [
                'public_key' => $public_key,
                'preference_id' =>  $preference->id,
                'url' => $preference->back_urls,
                'init_point' => $paymentLink
            ];
            return response()->json([
                'code' => 1,
                'msg' => $dato
            ]);
        } else {
            return response()->json([
                'code' => 0,
                'msg' => 'Error de Datos'
            ]);
        }
    }

    //pago exitoso y retornamos a este metodo para guardar la compra
    public function success(Request $request)
    {
        /**/
        if ($request->status === 'approved') {

            // Obtiene los datos del $request desde la sesión en array 
            //asi se accede en datos de array: $requestData['numero_documento']
            //asi se accede en datos de objetos: $requestData->numero_documento
            $requestData = session('data');

            //dd($requestData['numero_documento']);
            //GUARDAMOS AL CLIENTE dd($request->product_id);
            $person = Person::where('numero_documento', '=',  $requestData['numero_documento'])->first();
            if ($person) {
                $person_id = $person->id;
            } else {
                $person = new Person();
                $person->tipo_persona = 'CLIENTE';
                $person->nombres =  $requestData['nombres'];
                $person->tipo_documento =  $requestData['tipo_documento'];
                $person->numero_documento =  $requestData['numero_documento'];
                $person->direccion =  $requestData['direccion'];
                $person->telefono =  $requestData['telefono'];
                $person->email =  $requestData['email'];
                $person->save();
                $person_id = $person->id;
            }

            //GUARDAMOS LA VENTA
            $sale = new Sale();
            $sale->person_id = $person_id;
            $sale->fecha = date('Y-m-d H:i:s');
            $sale->inpuesto = 18;
            $sale->total_venta =  $requestData['total_venta'];
            $sale->estado = 'PAGADO';
            $sale->save();


            //ARREGLO DE DATOS PARA ALMACEMAR DEL DETALLE VENTA(pedido) 
            $product_id =  $requestData['product_id'];
            $cantidad =  $requestData['cantidad'];
            $precio_venta =  $requestData['precio_venta'];
            $cont = 0;
            while ($cont < count($product_id)) {
                //guardando la compra del pedido
                $detail = new SaleDetail();
                $detail->sale_id = $sale->id;
                $detail->product_id = $product_id[$cont];
                $detail->cantidad = $cantidad[$cont];
                $detail->precio_venta = $precio_venta[$cont];
                $save = $detail->save();

                //descontando stock
                $product = Product::find($detail->product_id);
                if ($product->stock > $detail->cantidad) {
                    $stock_actual = $product->stock;
                    $stock_final = $stock_actual - $detail->cantidad;
                    $save = $product->update(['stock' => $stock_final]);
                }

                $cont = $cont + 1;
            }

            if ($save) {
                $pay = Pay::create([
                    'sale_id' => $sale->id,
                    'collection_id' => $request->collection_id,
                    'collection_status' => $request->collection_status,
                    'payment_id' => $request->payment_id,
                    'status' => $request->status,
                    'external_reference' => $request->external_reference,
                    'payment_type' => $request->payment_type,
                    'merchant_order_id' => $request->merchant_order_id,
                    'preference_id' => $request->preference_id,
                    'site_id' => $request->site_id,
                    'processing_mode' => $request->processing_mode,
                    'merchant_account_id' => $request->merchant_account_id,
                    'estado' => 'ACTIVO',
                ]);

                if ($pay) {
                    //Mail::to(['j.a_alarcon_24@outlook.com', 'nsnyliz@gmail.com', 'Huamanirosase@gmail.com', 'nunezcancharimabell@gmail.com'])->send(new AdminMail($requestData['nombres'], $requestData['total_venta'], $requestData['telefono']));
                    Mail::to($person->email)->send(new UsuarioMail($requestData['nombres'], $requestData['total_venta'], $requestData['telefono']));
                    $person = Person::where('numero_documento', '=',  $requestData['numero_documento'])->first();
                    return redirect()->route('home')->with('pay', "Agradecemos su elección. Su compra ha sido procesada, y se le ha enviado un correo electrónico con los detalles recibidos. :)" . $person->nombres . "");
                } else {
                    return redirect()->route('home')->with('nopay', 'Se produjo un inconveniente durante la compra. Por favor, póngase en contacto con nosotros al 922394642 para recibir el soporte necesario.');
                }
            } else {
                return redirect()->route('home')->with('nopay', 'Se produjo un inconveniente durante la compra. Por favor, póngase en contacto con nosotros al 922394642 para recibir el soporte necesario.');
            }
        }
    }

    public function failure()
    {
        return "error de pago";
    }

    public function pending()
    {
        return "Pago Pendiente";
    }
}
