<?php

namespace App\Http\Controllers\cliente;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //FUNCION PINCIPAL Y UNICA
    public function __invoke()
    {
        $categories  = Category::all();
        $products = Product::join('photos', 'photos.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.descripcion',
                'products.slug',
                'products.stock',
                'products.nombre',
                'products.precio',
                'products.category_id',
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'           //LE PASAMOS EL ID DEL FORMULARIO DE BUSQUEDA
            )->where('products.precio', '>', 0)
            ->inRandomOrder()->limit(4)->get();

        //dd($product);
        return view('cliente.home', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
