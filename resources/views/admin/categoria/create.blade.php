@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
@section('navegador')
    <x-navegador-admin />
@endsection





{{-- CONTENIDO --}}
@section('contenido')
    <section id="categoria" class="espacio-section">
        <div class="contenedor">
            <div class="caja-formulario">
                <form action="{{ route('admin.category.store') }}" method="POST">

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf

                    <div class="caja-grupo">
                        <label for="nombre" class="">Nombre de la categoria</label>
                        <input type="nombre" id="nombre" name="nombre" class="caja-admin espacio-abajo"
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
    </section>
@endsection



{{-- FOOTER --}}
@section('footer')
    <footer id="footer">
    </footer>
@endsection
