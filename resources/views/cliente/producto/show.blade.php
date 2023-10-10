@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />





{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">{{ $slug }}</h1>
        </div>
    </header>
@endsection




{{-- CONTENIDO --}}
@section('contenido')
    @foreach ($product as $product)
        <div class="contenedor" id="flex-splide-padre">
            <div id="flex-splide">
                <div class="flex-splide-tamanio-uno">
                    <section class="splide contenedor" id="splide" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide"> <img style="height: 100%" src="{{ $product->foto_uno }}"
                                        alt="{{ $product->foto_uno }}"></li>
                                <li class="splide__slide"> <img style="height: 100%" src="{{ $product->foto_dos }}"
                                        alt="{{ $product->foto_dos }}"></li>
                                <li class="splide__slide"> <img style="height: 100%" src="{{ $product->foto_tres }}"
                                        alt="{{ $product->foto_tres }}"></li>
                            </ul>
                        </div>
                    </section>
                </div>

                <div class="taza-descripcion flex-splide-tamanio-dos">
                    <h2>{{ $product->nombre }}</h2>
                    <p class="texto-mayuscula">{{ $product->descripcion }}</p>
                    <p class="tamanio-precio my-4 boton-sin-color">{{ $product->precio }}</p>
                    @if ($product->category_id == 6)
                        <a target="_blank"
                            href="https://wa.me/51952955205?text=Quisiera más información del producto - Codigo:{{ $product->id }} - {{ $product->descripcion }}"
                            class="boton boton-color mt-3 mb-3">Whatsapp</a>
                    @else
                        <a target="_blank"
                            href="https://wa.me/51952955205?text=Quisiera más información del producto - Codigo:{{ $product->id }} - {{ $product->descripcion }}"
                            class="boton boton-color mt-3 mb-3">Whatsapp</a>

                        @if ($product->stock == 0)
                            <a class="boton boton-sin-color mb-3">Agotado</a>
                        @else
                            <a href="#" class="agregar-carrito boton boton-sin-color mb-3"
                                data-id="{{ $product->id }}">Agregar<i class='bx bx-cart-add bx-flip-vertical bx-tada'
                                    style='color:#a205a1'></i></a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <section id="tazas" class="espacio-section">
        <div class="contenedor">
            <div class="taza-grid">
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
                                    class="boton boton-color mt-3 mb-3">Whatsapp</a>
                            @else
                                <a target="_blank"
                                    href="https://wa.me/51952955205?text=Quisiera más información del producto - Codigo:{{ $product->id }} - {{ $product->descripcion }}"
                                    class="boton boton-color mt-3 mb-3">Whatsapp</a>

                                @if ($product->stock == 0)
                                    <a class="boton boton-sin-color mb-3">Agotado</a>
                                @else
                                    <a href="#" class="agregar-carrito boton boton-sin-color mb-3"
                                        data-id="{{ $product->id }}">Agregar<i
                                            class='bx bx-cart-add bx-flip-vertical bx-tada' style='color:#a205a1'></i></a>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- COMPONENTE BUSCAR PRODUCTO 
            <x-buscar-producto :categories="$categories" />
            --}}

            <div class="card mt-5">
                <div class="card-body">
                    {{-- COMPONENTE LIVEWIRE BUSCADOR --}}
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/cliente/splide.js') }}"></script>
@endsection



<!--FOOTER -->
@section('footer')
    <x-footer-cliente />
@endsection
