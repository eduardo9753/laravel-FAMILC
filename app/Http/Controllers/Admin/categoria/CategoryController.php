<?php

namespace App\Http\Controllers\Admin\categoria;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str; //PARA GENERAR SLUG
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CategoryController extends Controller
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

    //FUNCION INDEX "TABLA DE DATOS CATEGORIA"
    public function index()
    {
        $category  = Category::whereNotIn('id',[6,7,8,9,10,11])->get();
        return view('admin.categoria.index', [
            'category' => $category
        ]);
    }

    //VISTA FORMULARIO PARA CREAR UNA CATEGORIA
    public function create()
    {
        return view('admin.categoria.create');
    }

    //FORMULARIO PARA GUARDAR LA GATEGORIA
    public function store(Request $request)
    {
        //CREAMOS EL SLUG CON LA VARIABLE "slug" Y LE AGREGAMOS LO QUE VIENE EN EL CAMPO "nombre"
        $request->request->add(['slug' => Str::slug($request->nombre)]);

        //CREAMOS LAS VALIDACIONES
        $this->validate($request, [
            'nombre' => 'required|unique:categories|min:4|max:50',
            'slug' => 'required|unique:categories|min:4|max:50', //opcional
        ]);

        /*GUARDAMOS LOS DATOS EN LA BD*/
        Category::create([
            'nombre' => $request->nombre,
            'slug' => $request->slug
        ]);

        return redirect()->route('admin.category.index');
    }

    public function show(Category $category)
    {
            //PRIMERA FORMA PARA TRAER LOS DATOS
            //$data = Category::where('slug', '=', $category->slug)->first();

            /*SEGUNDA FORMA PASARLE LA VARIABLE MODELO QUE LE PASAS EN LA RUTA COMO PARAMETRO */;
        return view('admin.categoria.show', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request)
    {
        try {
            //CREAMOS EL SLUG CON LA VARIABLE "slug" Y LE AGREGAMOS LO QUE VIENE EN EL CAMPO "nombre"
            $request->request->add(['slug' => Str::slug($request->nombre)]);

            //CREAMOS LAS VALIDACIONES QUE SON LOS CAMPOS DE LOS INPUT
            $this->validate($request, [
                'nombre' => 'required|min:4|max:50',
                //OPCIONAL YA QUE TU FORMULARIO NO TIENE UN INPUT CON ESTA VARIABLE
                //'slug' => 'required|unique:categories|min:4|max:50', 
            ]);

            //ACTUALIZANDO LOS DATOS
            $category->nombre = $request->nombre;
            $category->slug = $request->slug;
            $category->save();

            return redirect()->route('admin.category.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
