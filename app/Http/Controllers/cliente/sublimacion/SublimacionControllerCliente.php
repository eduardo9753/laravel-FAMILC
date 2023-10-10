<?php

namespace App\Http\Controllers\cliente\sublimacion;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SublimacionControllerCliente extends Controller
{
    //productos de sublimacion
    public function index()
    {
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
                'photos.foto_tres'               //VARIABLE QUE ESTA EN EL HOME [1-5]
            )->where('products.precio', '>', 0)
            ->where('products.category_id', '=', 6)
            ->orderBy('products.id', 'desc')->simplePaginate(8);
        return view('cliente.sublimacion.index', [
            'products' => $products
        ]);
    }
}
