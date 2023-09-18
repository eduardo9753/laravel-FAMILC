<?php

namespace App\Http\Controllers\Admin\ingreso;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\IncomeDetail;
use App\Models\Person;
use App\Models\Product;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    //
    public function index()
    {
        $incomes = Income::join('people', 'people.id', '=', 'incomes.person_id')
        ->select(
            'people.nombres',
            'people.direccion',
            'people.telefono',
            'people.email',
            'incomes.id',
            'incomes.total_compra',
            'incomes.estado',
        )
        ->where('incomes.estado', '=', 'INGRESADO')->get();
        return view('admin.ingreso.index' ,[
            'incomes' => $incomes
        ]);
    }

    public function create()
    {
        $providers = Person::where('tipo_persona', '=', 'PROVEEDOR')->get();
        $products = Product::all();
        return view('admin.ingreso.create', [
            'providers' => $providers,
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        //ARREGLO DE DATOS DE LA TABLA "Income"
        $proveedor_id = $request->proveedor_id;
        $tipo_documento = $request->tipo_documento;
        $numero_documento = $request->numero_documento;
        $total_compra = $request->total_compra;
        $countProveedor = 0;

        //CONTARA CUANTOS IDS DE PROVEEDORES HABRA EN LA TABLA PARA PODER RECORRER Y GUARDAR EN LA TABLA "incomes"
        while ($countProveedor < count($proveedor_id)) {
            //INGRESANDO NUEVA VENTA
            $income = new Income();
            $income->person_id = $proveedor_id[$countProveedor]; //id de los proveedores
            $income->tipo_documento = $tipo_documento[$countProveedor];
            $income->numero_documento = $numero_documento[$countProveedor];
            $income->fecha = date('Y-m-d H:i:s');
            $income->inpuesto = 18;
            $income->total_compra = $total_compra[$countProveedor];
            $income->estado = 'INGRESADO';
            $income->save();
            $countProveedor = $countProveedor + 1;
        }

        //ARREGLO DE DATOS DE LA TABLA "incomeDetail"
        $product_id = $request->product_id;
        $cantidad = $request->cantidad;
        $precio_compra = $request->precio_compra;
        $precio_venta = $request->precio_venta;
        $cont = 0;

        //guardamos el detalle ingreso de la tabla
        while ($cont < count($product_id)) {
            $detail = new IncomeDetail();
            $detail->income_id = $income->id;
            $detail->product_id = $product_id[$cont];
            $detail->cantidad = $cantidad[$cont];
            $detail->precio_compra = $precio_compra[$cont];
            $detail->precio_venta = $precio_venta[$cont];
            $detail->save();

            //actualizando el stock en la tabla producto
            $producto = Product::find($product_id[$cont]);
            $stock_actual = $producto->stock;
            $stock_final =  $stock_actual + $cantidad[$cont];
            $save = $producto->update(['stock' => $stock_final, 'precio' => $precio_venta[$cont]]);
            $cont = $cont + 1;
        }

        if ($save) {
            return response()->json([
                'code' => 1,
                'msg' => 'Se guardo la Informacion Correctamente'
            ]);
        } else {
            return response()->json([
                'code' => 0,
                'msg' => 'Hubo un error en el registro de su ingreso'
            ]);
        }
    }
}
