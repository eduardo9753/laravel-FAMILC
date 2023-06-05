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
                                <li class="splide__slide"> <img src="{{ asset('tazas') . '/' . $product->foto_uno }}"
                                        alt="{{ $product->foto_uno }}"></li>
                                <li class="splide__slide"> <img src="{{ asset('tazas') . '/' . $product->foto_dos }}"
                                        alt="{{ $product->foto_dos }}"></li>
                                <li class="splide__slide"> <img src="{{ asset('tazas') . '/' . $product->foto_tres }}"
                                        alt="{{ $product->foto_tres }}"></li>
                            </ul>
                        </div>
                    </section>
                </div>

                <div class="flex-splide-tamanio-dos">
                    <p class="flex-splide-nombre">{{ $product->nombre }}</p>
                    <p class="flex-splide-decripcion">{{ $product->descripcion }}</p>
                    <p class="flex-splide-precio ">S/. {{ $product->precio }}</p>

                    <a target="_blank"
                        href="https://wa.me/51952955205?text=Quisiera más información del producto - Codigo:{{ $product->id }} - {{ $product->descripcion }}"
                        class="boton texto-boton-general ">Whatsapp</a>
                </div>
            </div>
        </div>
    @endforeach

    <section id="tazas" class="espacio-section">

        <div class="contenedor">
            <div class="taza-grid">

                {{--TE TRAE TRES PRODUCTOS ALEATORIOS PARA MOSTRARLE AL USUARIO--}}
                @foreach ($aleatorios as $aleatorios)
                    <div class="taza">
                        <div class="taza-img">
                            <a href="{{ route('product.show', ['product' => $aleatorios->slug]) }}">
                                <img src="{{ asset('tazas') . '/' . $aleatorios->foto_uno }}"
                                    alt="{{ $aleatorios->foto_uno }}">
                            </a>

                            <div class="taza-color-mitad"></div>
                        </div>

                        <div class="taza-descripcion">
                            <h2>{{ $aleatorios->nombre }} </h2>
                            <p>{{ $aleatorios->descripcion }}</p>
                            <a href="{{ route('product.show', ['product' => $aleatorios->slug]) }}"
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
