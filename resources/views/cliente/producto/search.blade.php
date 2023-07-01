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

            {{-- COMPONENTE BUSCAR PRODUCTO --}}
            <x-buscar-producto :categories="$categories" />

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
                            <p class="texto-mayuscula">{{ $product->descripcion }}</p>
                            <p class="texto-boton-general tamanio-precio">{{ $product->precio }}</p>
                            <a href="{{ route('product.show', ['product' => $product]) }}"
                                class="boton texto-boton-general">saber mas</a>
                        </div>
                    </div>
                @endforeach
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </section>
@endsection



{{-- FOOTER --}}
<x-footer-cliente />
