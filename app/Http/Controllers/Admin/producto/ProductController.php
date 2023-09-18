<?php

namespace App\Http\Controllers\Admin\producto;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    //PROTEGIENDO LAS RUTAS
    public function __construct()
    {
        //ESTA LINEA PROTEGRA A TODOS LOS METODOS 
        $this->middleware('auth');

        /*ESTA LINEA PROTEGERA SOLO A LOS METODOS QUE LE PASES
        $this->middleware('auth' , ['only' => ['index','create']]);*/

        /**ESTE METODO PROTEGERA A LOS METODOS EXCEPTO A LOS METODOS QUE LE PASES
        $this->middleware('auth')->except(['show','index']);*/
    }

    //FUNCION INDEX "TABLA DE DATOS PRODUCTOS"
    public function index()
    {
        //ESTE ES UN ARREGLO DE DATOS (NO SE PUEDE USAR model route binding)
        $product = DB::select('SELECT  
        p.id AS "id",
        p.nombre AS "nombre",
        p.slug AS "slug",
        p.precio AS "precio",
        p.estado AS "estado",
        p.stock AS "stock",
        c.nombre AS "categoria",
        c.id AS "idCategoria",
        u.name AS "usuario"
        
        FROM products p 
        INNER JOIN categories c ON p.category_id = c.id
        INNER JOIN users u ON p.user_id = u.id
        where p.id NOT IN(6,7,8,9,10,11)');

        return view('admin.producto.index', [
            'product' => $product
        ]);
    }

    public function create()
    {
        $category = Category::whereNotIn('id',[6,7,8,9,10,11])->get();
        return view('admin.producto.create', [
            'category' => $category
        ]);
    }


    public function store(Request $request)
    {
        //CREAMOS EL SLUG CON LA VARIABLE "slug" Y LE AGREGAMOS LO QUE VIENE EN EL CAMPO "nombre"
        $request->request->add(['slug' => Str::slug($request->nombre)]);
        //echo $slug = $request->slug;

        //validar los datos
        $this->validate($request, [
            'nombre' => 'required|unique:products|max:50', //METERLE UN UNIQUE
            'precio' => 'required',
            'stock' => 'required',
            'descripcion' => 'required',
            'foto_uno' => 'required',
            'foto_dos' => 'required',
            'foto_tres' => 'required'
        ]);

        //guardar los datos del producto
        $save = Product::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'slug' => $request->slug,
            'descripcion' => $request->descripcion,
            'estado' => 1, //(1)ACTIVO (2)INACTIVO
            'user_id' => auth()->user()->id,
            'category_id' => $request->categoria,
            'stock' => $request->stock,
        ]);

        //guardar las fotos del producto en la tabla de photos
        $ultimo_id_producto = $save->id;
        Photo::create([
            'product_id' => $ultimo_id_producto,
            'foto_uno' => $request->foto_uno,
            'foto_dos' =>  $request->foto_dos,
            'foto_tres' => $request->foto_tres
        ]);

        //REDIRECCIONAMOS
        return redirect()->route('admin.product.index');
    }

    public function show(Product $product)
    {
        //ESTE ES UN OBJETO POR ESO SE PASA DE FRENTE A LA VISTA
        $category = Category::whereNotIn('id',[6,7,8,9,10,11])->get();
        $categoria_producto = Category::find($product->category_id);
        return view('admin.producto.show', [
            'product' => $product,
            'category' =>  $category,
            'categoria_producto' => $categoria_producto
        ]);
    }

    public function update(Product $product, Request $request)
    {
        //CREAMOS EL SLUG CON LA VARIABLE "slug" Y LE AGREGAMOS LO QUE VIENE EN EL CAMPO "nombre"
        $request->request->add(['slug' => Str::slug($request->nombre)]);

        //validar los datos
        $this->validate($request, [
            'nombre' => 'required|max:50', //METERLE UN UNIQUE
            'descripcion' => 'required',
            'stock' => 'required',
            'precio' => 'required',
        ]);

        //ACTUALIZANDO LOS DATOS
        $product->nombre = $request->nombre;
        $product->slug = $request->slug;
        $product->descripcion = $request->descripcion;
        $product->category_id = $request->categoria;
        $product->stock = $request->stock;
        $product->precio = $request->precio;
        $product->save();

        //RETORNAMOS LA VISTA CON LA TABLA DE DATOS
        return redirect()->route('admin.product.index');
    }
}
