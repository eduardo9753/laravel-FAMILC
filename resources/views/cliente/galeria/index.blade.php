@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />





{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">GALERIA DE IMAGENES</h1>
        </div>
    </header>
@endsection




{{-- CONTENIDO --}}
@section('contenido')
    <!--  OWLCOURRESL Demos -->
    <section id="demos">
        <div class="row">
            <div class="large-12 columns">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-1.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-2.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-3.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-4.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-5.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-6.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-7.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-8.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-9.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-10.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-11.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="{{ asset('img/galeria/galeria-12.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
                <!-- <a class="boton secondary play">Play</a>
                    <a class="boton secondary stop">Stop</a>-->
            </div>
        </div>
    </section>
    <!--OWLCOURRESL-->

    <section id="galeria" class="espacio-section">
        <div class="contenedor">
            <div class="galeria-grid">

                <div>
                    <video muted autoplay loop class="tamanio-video">
                        <source src="{{ asset('video/taza-video.mp4') }}" type="video/mp4">
                    </video>
                </div>

                <div>
                    <video muted autoplay loop class="tamanio-video">
                        <source src="{{ asset('video/taza-papa-video.mp4') }}" type="video/mp4">
                    </video>
                </div>

                <div>
                    <video muted autoplay loop class="tamanio-video">
                        <source src="{{ asset('video/roca-video.mp4') }}" type="video/mp4">
                    </video>
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-1.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-2.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-3.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-4.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-5.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-6.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-7.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-8.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-9.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-10.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-11.jpeg') }}" alt="">
                </div>

                <div>
                    <img src="{{ asset('img/galeria/galeria-12.jpeg') }}" alt="">
                </div>

            </div>
        </div>
    </section>
@endsection



{{-- FOOTER --}}
<x-footer-cliente />
