@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />





{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="mt-5">
        <div class="container">

            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">

                {{-- TOKEN DE SEGURIDAD --}}
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body boton-color">
                                <h1 class="lead">Producto</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre" class="">Nombre producto</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control espacio-abajo"
                                        placeholder="product" autocomplete="off" value="{{ old('nombre') }}">
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('nombre')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="descripcion" class="">Descripcion producto</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control espacio-abajo"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="categoria" class="">Seleccione la categoria</label>
                                            <select name="categoria" class="form-select espacio-abajo" id="categoria">
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stock" class="">stock producto</label>
                                            <input type="text" id="stock" name="stock"
                                                class="form-control espacio-abajo" placeholder="stock" autocomplete="off"
                                                value="{{ old('stock') }}">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('stock')
                                                <p class="error-registro-usuario">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body boton-color">
                                <h1 class="lead">Producto Fotos</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="foto_uno" class="">Url de primera foto</label>
                                    <input type="text" id="foto_uno" name="foto_uno"
                                        class="form-control espacio-abajo" value="{{ old('foto_uno') }}">
                                    <div class=""> <img class="imagen-precia-admin" src=""
                                            id="imgPreview_foto_uno" alt="Nueva imagen"></div>
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('foto_uno')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="foto_dos" class="">Segunda foto</label>
                                    <input type="text" id="foto_dos" name="foto_dos"
                                        class="form-control espacio-abajo" value="{{ old('foto_dos') }}">
                                    <div class=""> <img class="imagen-precia-admin" src=""
                                            id="imgPreview_foto_dos" alt="Nueva imagen"></div>
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('foto_dos')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="foto_tres" class="">Tercera foto</label>
                                    <input type="text" id="foto_tres" name="foto_tres"
                                        class="form-control espacio-abajo" value="{{ old('foto_tres') }}">
                                    <div class=""> <img class="imagen-precia-admin" src=""
                                            id="imgPreview_foto_tres" alt="Nueva imagen"></div>
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('foto_tres')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
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
    </section>
@endsection


