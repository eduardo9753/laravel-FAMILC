<?php

namespace App\Http\Controllers;

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
        $product = Product::join('photos', 'photos.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.descripcion',
                'products.slug',
                'products.nombre',
                'products.precio',
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'               //VARIABLE QUE ESTA EN EL HOME [1-5]
            )->where('products.category_id', '=', $request->category)->orderBy('products.id','desc')->paginate(9);
        //dd($product);
        return view('cliente.producto.index', [
            'product' => $product
        ]);
    }

    //MOSTRAR LOS PRODUCTOS LE PASAMOS EL MODELO QUE YA TIENE TODOS LOS CAMPOS DE SU TABLA
    public function show(Product $product)
    {
        //echo "id: " . $product->id;
        $slug = $product->nombre;

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
            )->where('products.id', '=', $product->id)->get();


        //DATOS ALEATORIOS PARA MOSTRAR DISTINTOS PRODUCTOS
        //RECORRIDO CON BUCLE FOR
        $aleatorios = DB::select('SELECT 
            p.nombre,
            p.slug ,
            p.precio,
            p.descripcion, 
            ph.foto_uno
            FROM products p 
            INNER JOIN photos ph ON p.id = ph.product_id
            INNER JOIN users u ON p.user_id = u.id 
            ORDER BY rand() LIMIT 3');


        return view('cliente.producto.show', [
            'product' => $product,
            'aleatorios' => $aleatorios,
            'slug' => $slug,
        ]);
    }

    //VISTA BUSCADOR
    public function search(Request $request)
    {
        //LISTA DE CATEGORIAS
        $category = Category::all();

        //LO RECORRIMOS CON UN FOREACH EN LA VISTA
        $product = Product::join('photos', 'photos.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.descripcion',
                'products.slug',
                'products.nombre',
                'products.precio',
                'photos.foto_uno',
                'photos.foto_dos',
                'photos.foto_tres'           //LE PASAMOS EL ID DEL FORMULARIO DE BUSQUEDA
            )->where('products.category_id', '=', $request->categoria)->orderBy('products.id','desc')->paginate(9);

        return view('cliente.producto.search' , [
            'product' => $product,
            'category' => $category
        ]);
    }
}
