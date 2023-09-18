@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />




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
                @foreach ($products as $product)
                    <div class="taza">
                        <div class="taza-img">
                            <a href="{{ route('product.show', ['product' => $product]) }}">
                                <img src="{{ $product->foto_uno }}" alt="{{ $product->foto_uno }}">
                            </a>

                            <div class="taza-color-mitad"></div>
                        </div>

                        <div class="taza-descripcion">
                            <h2>{{ $product->nombre }}</h2>
                            <p class="tamanio-precio boton-sin-color">{{ $product->precio }}</p>
                            <a href="{{ route('product.show', ['product' => $product]) }}"
                                class="boton boton-color mt-3">saber
                                mas</a>
                            @if ($product->stock >= 1)
                                <a href="#" class="agregar-carrito boton boton-sin-color mb-3"
                                    data-id="{{ $product->id }}">Agregar<i class='bx bx-cart-add bx-flip-vertical bx-tada'
                                        style='color:#a205a1'></i></a>
                            @else
                                <a class="boton boton-sin-color mb-3">Agotado</a>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{ $products->withQueryString()->links() }}
            </div>
        </div>

    </section>
@endsection



<!--FOOTER -->
@section('footer')
    <x-footer-cliente />
@endsection