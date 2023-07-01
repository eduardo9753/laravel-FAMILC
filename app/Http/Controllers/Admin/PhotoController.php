<?php

namespace App\Http\Controllers\Admin;

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
        //primera imagen
        if ($request->foto_uno) {
            //ELIMINANDO LA IAMGEN DEL SERVIDOR
            //$photo = Photo::find($photo_id)
            $photo = DB::table('photos')->where('id', $photo->id)->first();

            if ($photo->foto_uno) {
                $buscar_imagen_uno = public_path('tazas/' . $photo->foto_uno);
                if ($buscar_imagen_uno) {
                    unlink($buscar_imagen_uno);
                }
            }

            //IMAGEN NUMERO UNO
            $imagen_uno = $request->file('foto_uno'); //NOMBRE DEL INPUT
            $nombreImagen_uno = Str::uuid() . "." . $imagen_uno->extension(); //DANDOLE UN ID UNICO A LA IMAGEN

            $imagenServidor = Image::make($imagen_uno); //CREANDO LA IMAGEN CON Intervation
            $imagenServidor->fit(1600, 1600);       //DANDOLE TAMAÑO UNICO

            $imagen_path_uno = public_path('tazas') . "/" . $nombreImagen_uno; //DIRECCIONANDO A LA RUTA
            $imagenServidor->save($imagen_path_uno);      //GUARDANDO IMAGEN
        } else {
            $photo = DB::table('photos')->where('id', $photo->id)->first();
            $nombreImagen_uno = $photo->foto_uno;
        }

        //segunda imagen
        if ($request->foto_dos) {
            //ELIMINANDO LA IAMGEN DEL SERVIDOR
            //$photo = Photo::find($photo_id)
            $photo = DB::table('photos')->where('id', $photo->id)->first();

            if ($photo->foto_dos) {
                $buscar_imagen_dos = public_path('tazas/' . $photo->foto_dos);
                if ($buscar_imagen_dos) {
                    unlink($buscar_imagen_dos);
                }
            }

            //IMAGEN NUMERO DOS
            $imagen_dos = $request->file('foto_dos'); //NOMBRE DEL INPUT
            $nombreImagen_dos = Str::uuid() . "." . $imagen_dos->extension(); //DANDOLE UN ID UNICO A LA IMAGEN

            $imagenServidor = Image::make($imagen_dos); //CREANDO LA IMAGEN CON Intervation
            $imagenServidor->fit(1600, 1600);       //DANDOLE TAMAÑO UNICO

            $imagen_path_dos = public_path('tazas') . "/" . $nombreImagen_dos; //DIRECCIONANDO A LA RUTA
            $imagenServidor->save($imagen_path_dos);      //GUARDANDO IMAGEN
        } else {
            $photo = DB::table('photos')->where('id', $photo->id)->first();
            $nombreImagen_dos = $photo->foto_dos;
        }

        //tercera imagen
        if ($request->foto_tres) {
            //ELIMINANDO LA IAMGEN DEL SERVIDOR
            //$photo = Photo::find($photo_id)
            $photo = DB::table('photos')->where('id', $photo->id)->first();

            if ($photo->foto_tres) {
                $buscar_imagen_tres = public_path('tazas/' . $photo->foto_tres);
                if ($buscar_imagen_tres) {
                    unlink($buscar_imagen_tres);
                }
            }

            //IMAGEN NUMERO DOS
            $imagen_tres = $request->file('foto_tres'); //NOMBRE DEL INPUT
            $nombreImagen_tres = Str::uuid() . "." . $imagen_tres->extension(); //DANDOLE UN ID UNICO A LA IMAGEN

            $imagenServidor = Image::make($imagen_tres); //CREANDO LA IMAGEN CON Intervation
            $imagenServidor->fit(1600, 1600);       //DANDOLE TAMAÑO UNICO

            $imagen_path_tres = public_path('tazas') . "/" . $nombreImagen_tres; //DIRECCIONANDO A LA RUTA
            $imagenServidor->save($imagen_path_tres);      //GUARDANDO IMAGEN
        } else {
            $photo = DB::table('photos')->where('id', $photo->id)->first();
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
