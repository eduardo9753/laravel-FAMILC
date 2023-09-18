<?php

namespace App\Http\Controllers\cliente\producto;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductControllerClient extends Controller
{
    //VISTA DE TODOS LOS PRODCUTOS CON CATEGORIA
    public function index(Request $request)
    {
        //LO RECORRIMOS CON UN FOREACH EN LA VISTA
        $products = Product::join('photos', 'photos.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.descripcion',
                'products.slug',
                'products.nombre',
                'products.precio',
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'               //VARIABLE QUE ESTA EN EL HOME [1-5]
            )->where('products.precio', '>', 0)
            ->where('products.category_id', '=', $request->category)->orderBy('products.id', 'desc')->simplePaginate(9);
        //dd($product);
        return view('cliente.producto.index', [
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
                'products.nombre',
                'products.precio',
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'
            )->where('products.precio', '>', 0)->where('products.id', '=', $product->id)->get();


        //DATOS ALEATORIOS PARA MOSTRAR DISTINTOS PRODUCTOS
        //RECORRIDO CON BUCLE FOR
        $aleatorios = Product::join('photos', 'photos.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.descripcion',
                'products.slug',
                'products.nombre',
                'products.precio',
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'           //LE PASAMOS EL ID DEL FORMULARIO DE BUSQUEDA
            )->where('products.precio', '>', 0)->inRandomOrder()->limit(3)->get();


        return view('cliente.producto.show', [
            'product' => $product,
            'aleatorios' => $aleatorios,
            'slug' => $slug,
            'categories' => $categories
        ]);
    }

    //VISTA BUSCADOR
    public function search(Request $request)
    {
        //LISTA DE CATEGORIAS
        $categories = Category::all();

        //LO RECORRIMOS CON UN FOREACH EN LA VISTA
        $products = Product::join('photos', 'photos.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.descripcion',
                'products.slug',
                'products.nombre',
                'products.precio',
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'           //LE PASAMOS EL ID DEL FORMULARIO DE BUSQUEDA
            )->where('products.precio', '>', 0)
            ->where('products.category_id', '=', $request->categoria)->orderBy('products.id', 'desc')->simplePaginate(6);

        return view('cliente.producto.search', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
