@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />





{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="espacio-section">
        <div class="contenedor">
            <div class="caja-formulario">
                <form action="{{ route('admin.photo.update', ['photo' => $photo]) }}" method="POST"
                    enctype="multipart/form-data">

                    {{-- METODO ACTUALIZAR --}}
                    @method('PUT')

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf

                    <div class="grilla-producto">
                        <div>
                            <div class="caja-grupo">
                                <label for="foto_uno" class="">Primera foto</label>
                                <input type="file" accept="image/*" id="foto_uno" name="foto_uno"
                                    class="caja-admin espacio-abajo" placeholder="Categoria" autocomplete="off"
                                    value="{{ old('foto_uno') }}">
                                <div class=""> <img class="imagen-precia-admin" src=""
                                        id="imgPreview_foto_uno" alt="Nueva imagen"></div>
                                <div><img class="imagen-precia-admin" src="{{ asset('tazas') . '/' . $photo->foto_uno }}"
                                        alt="Imagen del post {{ $photo->foto_uno }}"></div>
                            </div>

                            <div class="caja-grupo">
                                <label for="foto_dos" class="">Segunda foto</label>
                                <input type="file" accept="image/*" id="foto_dos" name="foto_dos"
                                    class="caja-admin espacio-abajo" placeholder="Categoria" autocomplete="off"
                                    value="{{ old('foto_dos') }}">
                                <div class=""> <img class="imagen-precia-admin" src=""
                                        id="imgPreview_foto_dos" alt="Nueva imagen"></div>
                                <div><img class="imagen-precia-admin" src="{{ asset('tazas') . '/' . $photo->foto_dos }}"
                                        alt="Imagen del post {{ $photo->foto_dos }}"></div>
                            </div>

                            <div class="caja-grupo">
                                <label for="foto_tres" class="">Tercera foto</label>
                                <input type="file" accept="image/*" id="foto_tres" name="foto_tres"
                                    class="caja-admin espacio-abajo" placeholder="Categoria" autocomplete="off"
                                    value="{{ old('foto_tres') }}">
                                <div class=""> <img class="imagen-precia-admin" src=""
                                        id="imgPreview_foto_tres" alt="Nueva imagen"></div>
                                <div><img class="imagen-precia-admin" src="{{ asset('tazas') . '/' . $photo->foto_tres }}"
                                        alt="Imagen del post {{ $photo->foto_tres }}"></div>
                            </div>
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
    </section>
@endsection



{{-- FOOTER --}}
@section('footer')
    <footer id="footer">
    </footer>
@endsection
