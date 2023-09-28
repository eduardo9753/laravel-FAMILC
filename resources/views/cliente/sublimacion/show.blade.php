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
                    <a target="_blank"
                        href="https://wa.me/51952955205?text=Quisiera más información del producto - Codigo:{{ $product->id }} - {{ $product->descripcion }}"
                        class="boton boton-color">Whatsapp</a>
                </div>
            </div>
        </div>
    @endforeach

    <section id="tazas" class="espacio-section">
        <div class="contenedor">
            <x-buscar-producto :categories="$categories" />
        </div>
    </section>

    <script src="{{ asset('js/cliente/splide.js') }}"></script>
@endsection



<!--FOOTER -->
@section('footer')
    <x-footer-cliente />
@endsection
