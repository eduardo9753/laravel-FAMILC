@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />






{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="espacio-section">
        <div class="contenedor">
            <div class="caja-formulario">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf

                    <div class="grilla-producto">
                        <div>
                            <div class="caja-grupo">
                                <label for="nombre" class="">Nombre producto</label>
                                <input type="text" id="nombre" name="nombre" class="caja-admin espacio-abajo"
                                    placeholder="product" autocomplete="off" value="{{ old('nombre') }}">
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('nombre')
                                    <p class="error-registro-usuario">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="caja-grupo">
                                <label for="precio" class="">Precio producto</label>
                                <input type="text" id="precio" name="precio" class="caja-admin espacio-abajo"
                                    placeholder="precio" autocomplete="off" value="{{ old('precio') }}">
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('precio')
                                    <p class="error-registro-usuario">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="caja-grupo">
                                <label for="descripcion" class="">Descripcion producto</label>
                                <textarea name="descripcion" id="descripcion" class="caja-admin espacio-abajo"></textarea>
                            </div>

                            <div class="caja-grupo">
                                <label for="categoria" class="">Seleccione la categoria</label>
                                <select name="categoria" class="caja-admin espacio-abajo" id="categoria">
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="caja-grupo">
                                <label for="foto_uno" class="">Primera foto</label>
                                <input type="file" accept="image/*" id="foto_uno" name="foto_uno" class="caja-admin espacio-abajo"
                                    placeholder="Categoria" autocomplete="off" value="{{ old('foto_uno') }}">
                                    <div class=""> <img class="imagen-precia-admin" src="" id="imgPreview_foto_uno" alt="Nueva imagen"></div>    
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('foto_uno')
                                    <p class="error-registro-usuario">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="caja-grupo">
                                <label for="foto_dos" class="">Segunda foto</label>
                                <input type="file" accept="image/*" id="foto_dos" name="foto_dos" class="caja-admin espacio-abajo"
                                    placeholder="Categoria" autocomplete="off" value="{{ old('foto_dos') }}">
                                    <div class=""> <img class="imagen-precia-admin" src="" id="imgPreview_foto_dos" alt="Nueva imagen"></div>  
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('foto_dos')
                                    <p class="error-registro-usuario">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="caja-grupo">
                                <label for="foto_tres" class="">Tercera foto</label>
                                <input type="file" accept="image/*" id="foto_tres" name="foto_tres" class="caja-admin espacio-abajo"
                                    placeholder="Categoria" autocomplete="off" value="{{ old('foto_tres') }}">
                                    <div class=""> <img class="imagen-precia-admin" src="" id="imgPreview_foto_tres" alt="Nueva imagen"></div>  
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('foto_tres')
                                    <p class="error-registro-usuario">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div>
                        <button type="submit" name="btn-login" id="" class="boton boton-login">
                            Guardar Producto
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
