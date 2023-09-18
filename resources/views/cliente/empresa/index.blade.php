@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />





{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">FAMILC CREACIONES</h1>
        </div>
    </header>
@endsection




{{-- CONTENIDO --}}
@section('contenido')
    <section id="empresa" class="espacio-section">
        <div class="contenedor">
            <div class="empresa-grid">
                <div class="empresa-caja-uno">
                    <img src="{{ asset('img/home/foto-empresa.png') }}" alt="">
                </div>
                <div class="empresa-caja-dos">
                    <div>
                        <h3 class="empresa-titulo">La empresa</h3>
                        <p class="empresa-parrafo">Somos FAMILC 4 Ositos, venta de productos al por mayor y tienda virtual,
                            aquí encontraras variedades de productos para uso personal, así como familiar con los mejores
                            precios del mercado dado que estamos enlazados con las mejoras importadoras del país 🎁</p>
                    </div>
                    <div>
                        <h3 class="empresa-titulo">Mision</h3>
                        <p class="empresa-parrafo">Proporcionar a los clientes nuestros productos con la mejor calidad y
                            precios accesibles,
                            manteniendo el profesionalismo y la preferencia de nuestros clientes.</p>
                    </div>
                    <div>
                        <h3 class="empresa-titulo">Vision</h3>
                        <p class="empresa-parrafo">Ampliar nuestra cartera de clientes brindando productos sublimados a
                            través de procesos de alta calidad humana.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



<!--FOOTER -->
@section('footer')
    <x-footer-cliente />
@endsection
