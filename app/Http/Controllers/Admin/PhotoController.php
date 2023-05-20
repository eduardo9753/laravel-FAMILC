<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
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

    //TABLA DE DATOS PHOTOS
    public function index()
    {
        $photo = DB::select('SELECT  
        ph.id AS "id_photo",
        p.nombre AS "nombre",
        p.id AS "id",
        ph.foto_uno AS "foto_uno",
        ph.foto_dos AS "foto_dos",
        ph.foto_tres AS "foto_tres",
        u.name AS "usuario"
        
        FROM products p 
        INNER JOIN photos ph ON p.id = ph.product_id
        INNER JOIN users u ON p.user_id = u.id');

        return view('admin.photo.index', [
            'photo' => $photo
        ]);
    }
}
