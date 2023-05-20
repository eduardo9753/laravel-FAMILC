<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //FUNCION PINCIPAL Y UNICA
    public function __invoke()
    {
        $product = DB::select('SELECT 
        p.nombre,
        p.slug ,
        p.precio,
        p.descripcion, 
        ph.foto_uno
        FROM products p 
        INNER JOIN photos ph ON p.id = ph.product_id
        INNER JOIN users u ON p.user_id = u.id 
        ORDER BY rand() LIMIT 3');
        
        //dd($product);
        return view('home', [
            'product' => $product
        ]);
    }
}
