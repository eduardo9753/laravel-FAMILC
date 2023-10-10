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
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'               //VARIABLE QUE ESTA EN EL HOME [1-5]
            )->where('products.precio', '>', 0)
            ->orderBy('products.id', 'desc')->simplePaginate(8);
        return view('cliente.sublimacion.index', [
            'products' => $products
        ]);
    }

    //MOSTRAR LOS PRODUCTOS LE PASAMOS EL MODELO QUE YA TIENE TODOS LOS CAMPOS DE SU TABLA
    public function show(Product $product)
    {
        //echo "id: " . $product->id;
        $slug = $product->nombre;
        $categories = Category::all();

        //CUANDO ES UN GET TE RETORNA UNA COLECCION DE DATOS
        //ENTONCES TIENES QUE RECORRER ESOS DATOS POR MEDIO DE UN BUBLEW FOREACH()
        //ASI TE DEVUELVA UN DATO O VARIOS DATOS
        $product = Product::join('photos', 'photos.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.descripcion',
                'products.slug',
                'products.stock',
                'products.nombre',
                'products.precio',
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'
            )->where('products.precio', '>', 0)
            ->where('products.id', '=', $product->id)->get();

        return view('cliente.sublimacion.show', [
            'product' => $product,
            'slug' => $slug,
            'categories' => $categories
        ]);
    }
}
