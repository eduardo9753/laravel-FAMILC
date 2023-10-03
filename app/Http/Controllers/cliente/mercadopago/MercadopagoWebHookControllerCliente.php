<?php

namespace App\Http\Controllers\cliente\mercadopago;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use App\Models\Person;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MercadopagoWebHookControllerCliente extends Controller
{
    //WEBHOOK PARA LOS CLIENTES QUE CIERRAN Y NO PRESIONAN EL BOTON "Volver al sitio"
    public function index(Request $request)
    {
        // Obtén el contenido de la solicitud del webhook
        $payload = $request->getContent();

        // Decodifica el contenido JSON en un arreglo asociativo
        $dataArray = json_decode($payload, true);

        if ($dataArray['type'] === 'payment') {

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
                // Limpia los datos del $request de la sesión (opcional)
                session()->forget('data');

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
                    echo "
                    <script>
                        carrito_entrada = []; localStorage.removeItem('carrito_venta');
                        localStorage.clear(); 
            
                        if(carrito_entrada.length <= 0){
                           console.log('carrito vacio')
                        }
                    </script>";
                } else {
                    Log::info("No se realizó el pago correctamente");
                }
            } else {
                Log::info("No se realizó el pago correctamente");
            }
        }
    }
}
