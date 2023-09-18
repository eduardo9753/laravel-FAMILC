@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />





{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="mt-5">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header boton-color">
                            <h1 class="lead">Editar Fotos</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.photo.update', ['photo' => $photo]) }}" method="POST"
                                enctype="multipart/form-data">

                                {{-- METODO ACTUALIZAR --}}
                                @method('PUT')

                                {{-- TOKEN DE SEGURIDAD --}}
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label for="foto_uno" class="">Primera foto</label>
                                        <input type="text" id="foto_uno" name="foto_uno" class="form-control"
                                            value="{{ old('foto_uno') }}">
                                        <div class=""> <img class="imagen-precia-admin" src=""
                                                id="imgPreview_foto_uno" alt="Nueva imagen"></div>
                                        <div><img class="imagen-precia-admin" src="{{ $photo->foto_uno }}"
                                                alt="Imagen del post {{ $photo->foto_uno }}"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="foto_dos" class="">Segunda foto</label>
                                        <input type="text" id="foto_dos" name="foto_dos" class="form-control"
                                            value="{{ old('foto_dos') }}">
                                        <div class=""> <img class="imagen-precia-admin" src=""
                                                id="imgPreview_foto_dos" alt="Nueva imagen"></div>
                                        <div><img class="imagen-precia-admin" src="{{ $photo->foto_dos }}"
                                                alt="Imagen del post {{ $photo->foto_dos }}"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="foto_tres" class="">Tercera foto</label>
                                        <input type="text" id="foto_tres" name="foto_tres" class="form-control"
                                            value="{{ old('foto_tres') }}">
                                        <div class=""> <img class="imagen-precia-admin" src=""
                                                id="imgPreview_foto_tres" alt="Nueva imagen"></div>
                                        <div><img class="imagen-precia-admin" src="{{ $photo->foto_tres }}"
                                                alt="Imagen del post {{ $photo->foto_tres }}"></div>
                                    </div>
                                </div>


                                <div>
                                    <button type="submit" name="btn-login" id="" class="boton boton-login">
                                        Actualizar Fotos
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
