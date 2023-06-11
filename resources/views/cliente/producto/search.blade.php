@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />





{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">por categorias</h1>
        </div>
    </header>
@endsection




{{-- CONTENIDO --}}
@section('contenido')
    <section id="tazas" class="espacio-section-abajo">
        <div class="contenedor">

            <div class="buscador">
                {{-- YA QUE SOLO VMOS A DEVOLVER UNA VISTA CON DATOS --}}
                <form action="{{ route('busqueda.search') }}" method="GET">
                    <div class="flex-buscador">
                        <div class="caja-grupo">
                            <label for="categoria" class="">Seleccione la categoria</label>
                            <select name="categoria" class="caja-admin espacio-abajo" id="categoria">
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <button type="submit" class="boton boton-login">
                                Buscar Producto
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="taza-grid">

                @foreach ($products as $product)
                    <div class="taza">
                        <div class="taza-img">
                            <a href="{{ route('product.show', ['product' => $product]) }}">
                                <img src="{{ asset('tazas') . '/' . $product->foto_uno }}" alt="{{ $product->foto_uno }}">
                            </a>

                            <div class="taza-color-mitad"></div>
                        </div>

                        <div class="taza-descripcion">
                            <h2>{{ $product->nombre }}</h2>
                            <p>{{ $product->descripcion }}</p>
                            <p class="texto-boton-general tamanio-precio">S/. {{ $product->precio }}</p>
                            <a href="{{ route('product.show', ['product' => $product]) }}"
                                class="boton texto-boton-general">saber mas</a>
                        </div>
                    </div>
                @endforeach
                {{ $products->withQueryString()->links()}}
            </div>
        </div>
    </section>
@endsection



{{-- FOOTER --}}
<x-footer-cliente />
