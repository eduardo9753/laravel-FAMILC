@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
@section('navegador')
    <x-navegador-cliente />
@endsection




{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">nuestros productos</h1>
        </div>
    </header>
@endsection




{{-- CONTENIDO --}}
@section('contenido')
    <section id="tazas" class="espacio-section">
        <div class="contenedor">
            <div class="taza-grid">

                @foreach ($product as $product)
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

            </div>
        </div>
    </section>
@endsection



{{-- FOOTER --}}
<x-footer-cliente />