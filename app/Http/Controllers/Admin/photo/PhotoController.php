<?php

namespace App\Http\Controllers\Admin\photo;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; //AJUTE DE LAS FOTOS
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; //MAYORMENTE ES DE LOS ILUMINATE

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

    //EDITAR LOS DATOS VISTS
    public function edit(Request $request)
    {
        $photo_id = $request->id;
        $photo = Photo::find($photo_id);

        //dd($photo);
        return view('admin.photo.edit', [
            'photo' => $photo
        ]);
    }

    //update de las photos
    public function update(Request $request, Photo $photo)
    {
        $photo = DB::table('photos')->where('id', $photo->id)->first();

        //primera imagen
        if ($request->foto_uno) {
            $nombreImagen_uno = $request->foto_uno;
        } else {
            $nombreImagen_uno = $photo->foto_uno;
        }

        //segunda imagen
        if ($request->foto_dos) {
            $nombreImagen_dos = $request->foto_dos;
        } else {
            $nombreImagen_dos = $photo->foto_dos;
        }

        //tercera imagen
        if ($request->foto_tres) {
            $nombreImagen_tres = $request->foto_tres;
        } else {
            $nombreImagen_tres = $photo->foto_tres;
        }

        //actualizando los datos
        $photo = Photo::find($photo->id);
        $photo->foto_uno = $nombreImagen_uno;
        $photo->foto_dos = $nombreImagen_dos;
        $photo->foto_tres = $nombreImagen_tres;
        $photo->save();

        return redirect()->route('admin.photo.index');
    }
}
