@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />






<!---HEADER -->
@section('header')
    <header id="header">
        {{-- <video muted autoplay loop>
            <source src="{{ asset('video/taza-video.mp4') }}" type="video/mp4">
        </video> --}}

        <div class="header-descripcion">
            <h1 class="titulo-header">FAMILC S.A.C</span></h1>
        </div>
    </header>
    <div id="header-footer">
        <p class="parrafo-header">Productos personalizadas</p>
    </div>

    <!--  OWLCOURRESL Demos -->
    <section id="demos">
        <div class="row">
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-1.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-2.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-3.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-4.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-5.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-6.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-7.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-8.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-9.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-10.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-11.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/eventos/galeria-12.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
                <!-- <a class="boton secondary play">Play</a>
                        <a class="boton secondary stop">Stop</a>-->
            </div>
        </div>
    </section>
    <!--OWLCOURRESL-->
@endsection




<!--CONTENIDO -->
@section('contenido')
    <section id="producto" class="espacio-section contenedor">
        <div class="caja-titulo-general">
            <span class="span-titulo-general">Cóntamos con distintos tipo de productos</span>
            <h2 class="titulo-h2-general">nuestros productos</h2>
            <hr>
        </div>

        <div class="producto-grilla">
            <div class="producto-grilla-uno">
                <a href="{{ route('product.index', ['category' => 7]) }}">
                    <div class="producto-caja-relative">
                        <img src="{{ asset('img/home/taza-producto.jpg') }}" alt="Producto Tazas">

                        <div class="producto-descripcion">
                            <p>Tazas</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="producto-grilla-dos">
                <a href="{{ route('product.index', ['category' => 6]) }}">
                    <div class="producto-caja-relative">
                        <img src="{{ asset('img/home/polo-producto.jpg') }}" alt="Producto Polos">

                        <div class="producto-descripcion">
                            <p>Polos</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('product.index', ['category' => 9]) }}">
                    <div class="producto-caja-relative">
                        <img src="{{ asset('img/home/botella-producto.jpg') }}" alt="Producto Botellas">

                        <div class="producto-descripcion">
                            <p>Botellas</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('product.index', ['category' => 8]) }}">
                    <div class="producto-caja-relative">
                        <img src="{{ asset('img/home/cuadro-producto.jpg') }}" alt="Producto Cuadros">

                        <div class="producto-descripcion">
                            <p>Cuadros</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('product.index', ['category' => 10]) }}">
                    <div class="producto-caja-relative">
                        <img src="{{ asset('img/home/chop-producto.jpg') }}" alt="Producto Gorros">

                        <div class="producto-descripcion">
                            <p>Chop</p>
                        </div>
                    </div>
                </a>
            </div>
    </section>

    <section id="tazas" class="espacio-section">
        <div class="caja-titulo-general">
            <span class="span-titulo-general">Cóntamos con distintos diseños y categorias</span>
            <h2 class="titulo-h2-general">nuestros diseños</h2>
            <hr>
        </div>

        <div class="contenedor">
            <div class="taza-grid">

                @foreach ($product as $product)
                    <div class="taza">
                        <div class="taza-img">
                            <a href="{{ route('product.show', ['product' => $product->slug]) }}">
                                <img src="{{ asset('tazas') . '/' . $product->foto_uno }}" alt="{{ $product->foto_uno }}">
                            </a>

                            <div class="taza-color-mitad"></div>
                        </div>

                        <div class="taza-descripcion">
                            <h2>{{ $product->nombre }} </h2>
                            <p>{{ $product->descripcion }}</p>
                            <a href="{{ route('product.show', ['product' => $product->slug]) }}"
                                class="boton texto-boton-general">saber mas</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <section id="taza-fondo" class="espacio-section">
        <div class="taza-fondo-img">
            <img src="{{ asset('img/logo/FAMILC.png') }}" alt="">
            <div class="taza-fondo-descripcion">
                <h3 class="taza-fondo-titulo">conoce nuestros productos</h3>
                <a href="" class="boton texto-blanco">saber mas</a>
            </div>
        </div>
    </section>


    <section id="conocenos" class="">
        <div class="contenedor">
            <div class="conocenos-grilla">
                <div class="conocenos-img">
                    <img src="{{ asset('img/home/taza-conocenos.jpg') }}" alt="">

                    <div class="conocenos-fondo"></div>

                </div>

                <div class="conocenos-descripcion">
                    <span class="conocenos-span">Acerca de Nosotros</span>
                    <h3 class="conocenos-titulo">conócenos</h3>
                    <p class="conocenos-parrafo">Somos una empresa en la dedicacion de tazas y logos</p>

                    <a href="{{ route('empresa.index') }}" class="boton texto-boton-general">saber mas</a>
                </div>
            </div>
        </div>
    </section>
@endsection



<!--FOOTER -->
<x-footer-cliente />
