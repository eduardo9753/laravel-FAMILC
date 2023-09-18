@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />





{{-- CONTENIDO --}}
@section('contenido')
    <section id="categoria" class="mt-5">
        <div class="contenedor">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header boton-color">
                            <h1 class="lead">Categoria</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.store') }}" method="POST">

                                {{-- TOKEN DE SEGURIDAD --}}
                                @csrf

                                <div class="form-group">
                                    <label for="nombre" class="">Nombre de la categoria</label>
                                    <input type="nombre" id="nombre" name="nombre" class="form-control espacio-abajo"
                                        placeholder="Categoria" autocomplete="off" value="{{ old('nombre') }}">
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('nombre')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" name="btn-login" id="" class="boton boton-login">
                                        Guardar Categoria
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



