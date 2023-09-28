<?php

namespace App\Http\Controllers\Admin\venta;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    //por ahora esta funcion ya no estara disponible, ya que se
    //integro mercadopago para compras directas
    public function index()
    {
        $sales = Sale::join('people', 'people.id', '=', 'sales.person_id')
            ->select(
                'people.nombres',
                'people.direccion',
                'people.telefono',
                'people.email',
                'sales.id',
                'sales.total_venta',
                'sales.estado',
            )
            ->where('sales.estado', '=', 'ENTREGAR')->orderBy('sales.id', 'desc')->get();
        return view('admin.venta.index', [
            'sales' => $sales
        ]);
    }

    //por ahora esta funcion ya no estara disponible, ya que se
    //integro mercadopago para compras directas
    public function show($id)
    {
        $sales = Sale::find($id);
        $saleDetail = SaleDetail::where('sale_id', '=', $sales->id)->get();
        $people = Person::find($sales->person_id);

        return view('admin.venta.show', [
            'sales' => $sales,
            'saleDetail' => $saleDetail,
            'people' =>  $people
        ]);
    }

    //funcion para actualizar la compra del cliente - venta y actualizar estock producto
    //por ahora esta funcion ya no estara disponible, ya que se
    //integro mercadopago para compras directas
    public function update($id, Request $request)
    {
        //dato venta por id
        $sales = Sale::find($id);
        $people = Person::find($sales->person_id);

        //datos detalle venta por id
        $saleDetail = SaleDetail::where('sale_id', '=', $sales->id)->get();

        //PRIMER BUCLE PARA VALIDAR LA CANTIDAD DEL STOCK
        foreach ($saleDetail as $detail) {
            $product = Product::find($detail->product_id);
            if ($product->stock < $detail->cantidad) {
                return back()->with('stock', "la catidad del producto: " . $product->nombre . ' Sobrepasa el stock actual');
            }
        }



        //SI SALTA A QUI ACTULIZAMOS LOS DATOS DE LA VENTA - CLIENTE Y STOCK PRODUCTO
        $saleDetail = SaleDetail::where('sale_id', '=', $sales->id)->get();
        $people = Person::find($sales->person_id);
        $update = $sales->update([
            'tipo_comprobante' => $request->tipo_comprobante,
            'numero_comprobante' => $request->numero_comprobante,
            'estado' => 'CANCELADO'
        ]);

        if ($update) {
            $save = false;
            foreach ($saleDetail as $detail) {
                $product = Product::find($detail->product_id);
                if ($product->stock > $detail->cantidad) {
                    $stock_actual = $product->stock;
                    $stock_final = $stock_actual - $detail->cantidad;
                    $save = $product->update(['stock' => $stock_final]);
                }
            }

            if ($save) {
                return redirect()->route('admin.sale.index')->with('exito', "se genero la venta del cliente: " . $people->nombres . "");
            } else {
                return back()->with('error', "Hubo un error de registro, comunicarse con el area de sistemas");
            }
        } else {
            return back()->with('error', "Hubo un error de actualizar de la venta, comunicarse con el area de sistemas");
        }
    }


    //PEDIDOS PAGADOS
    public function list()
    {
        $sales = Sale::join('people', 'people.id', '=', 'sales.person_id')
            ->select(
                'people.nombres',
                'people.direccion',
                'people.telefono',
                'people.email',
                'sales.id',
                'sales.total_venta',
                'sales.estado',
            )
            ->where('sales.estado', '=', 'PAGADO')->orderBy('sales.id', 'desc')->get();
        return view('admin.venta.list', [
            'sales' => $sales
        ]);
    }
}
