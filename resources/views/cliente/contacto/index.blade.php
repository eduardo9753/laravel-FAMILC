@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
@section('navegador')
    <x-navegador-cliente />
@endsection




{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">Contacto</h1>
        </div>
    </header>
@endsection




{{-- CONTENIDO --}}
@section('contenido')
    <section id="contacto" class="espacio-section">
        <div class="contenedor">
            <div class="contacto-grid">
                <div class="contacto-caja-uno">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d690.0918847103595!2d-77.02384485994851!3d-11.922533608728624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTHCsDU1JzIxLjEiUyA3N8KwMDEnMjQuNCJX!5e0!3m2!1ses!2spe!4v1684286650876!5m2!1ses!2spe"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="contacto-caja-dos">
                    <div>
                        <h3 class="contacto-titulo">Direccion</h3>
                        <p class="contacto-parrafo">Av Ciro Alegria Mz D.LT 10 3Zn de Collique</p>
                    </div>
                    <div>
                        <h3 class="contacto-titulo">Celulares</h3>
                        <p class="contacto-parrafo">+51 922 394 642</p>
                    </div>
                    <div>
                        <h3 class="contacto-titulo">Correo Electronico</h3>
                        <p class="contacto-parrafo">familc.sac@gmail.com</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection



{{-- FOOTER --}}
<x-footer-cliente />
