@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
@section('navegador')
    <x-navegador-cliente />
@endsection




{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">FAMILC.SAC</h1>
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
                        <p class="empresa-parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique
                            impedit beatae accusamus eum
                            delectus fugit placeat dolorum laboriosam facilis ab nemo sit dicta odio corrupti totam ducimus
                            minus. </p>
                    </div>
                    <div>
                        <h3 class="empresa-titulo">Mision</h3>
                        <p class="empresa-parrafo">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos
                            voluptate facere ipsam
                            officia rem? Ducimus consequatur debitis exercitationem voluptatem ratione iusto distinctio ex
                            numquam minus quisquam eos ea.</p>
                    </div>
                    <div>
                        <h3 class="empresa-titulo">Vision</h3>
                        <p class="empresa-parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
                            veritatis corporis vel quos,
                            iure fugit esse quae similique sed necessitatibus quasi, expedita architecto commodi id dolores
                            tempora harum tenetur sit .</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



{{-- FOOTER --}}
<x-footer-cliente />
