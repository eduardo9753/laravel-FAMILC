@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />





{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">Buscador</h1>
        </div>
    </header>
@endsection




{{-- CONTENIDO --}}
@section('contenido')
    <section id="tazas" class="espacio-section-abajo">
        <div class="contenedor">

            {{-- COMPONENTE BUSCAR PRODUCTO 
            <x-buscar-producto :categories="$categories" />
            --}}


            <div class="card mt-1">
                <div class="card-body">
                    {{-- COMPONENTE LIVEWIRE BUSCADOR --}}
                    @livewire('search')
                </div>
            </div>

            <div class="taza-grid mt-4">
                @foreach ($aleatorios as $product)
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
                            @if ($product->category_id == 6)
                                <a target="_blank"
                                    href="https://wa.me/51952955205?text=Quisiera más información del producto - Codigo:{{ $product->id }} - {{ $product->descripcion }}"
                                    class="boton boton-sin-color mt-3 mb-3">Whatsapp</a>

                                <a href="{{ route('product.show', ['product' => $product]) }}"
                                    class="boton boton-color mt-3 mb-3">Saber más</a>
                            @else
                                <a href="{{ route('product.show', ['product' => $product]) }}"
                                    class="boton boton-sin-color mt-3 mb-3">Saber más</a>

                                @if ($product->stock == 0)
                                    <a class="boton boton-sin-color mb-3">Agotado</a>
                                @else
                                    <a href="#" class="agregar-carrito boton boton-color mb-3"
                                        data-id="{{ $product->id }}">Agregar<i
                                            class='bx bx-cart-add bx-flip-vertical bx-tada' style='color:#a205a1'></i></a>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection



<!--FOOTER -->
@section('footer')
    <x-footer-cliente />
@endsection
