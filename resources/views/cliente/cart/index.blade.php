@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />




{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">Mi Carrito de Compras</h1>
        </div>
    </header>
@endsection






{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="mt-5">
        <div class="contenedor">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!--datos para la tabla entrada detalle-->
                            <div class="carrito table-responsive">
                                <table class="table lista-carrito-venta" id="">
                                    <thead class="boton-color">
                                        <tr>
                                            <th scope="col" class="text-center">X</th>
                                            <th scope="col" class="text-center">Item</th>
                                            <th scope="col" class="text-center">Imagen</th>
                                            <th scope="col" class="text-center">Descripcion</th>
                                            <th scope="col" class="">Precio</th>
                                            <th scope="col" class="">Cantidad</th>
                                            <th scope="col" class="text-center">+</th>
                                            <th scope="col" class="text-center">-</th>
                                            <th scope="col" class="text-center">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" style="font-size: 25px" class="boton-sin-color mb-2 input-carrito mt-1"
                                        value="0" name="total_venta" id="total_venta" readonly>
                                </div>

                                <div class="col-md-6">
                                    <form id="form-cart-comprar" action="{{ route('cart.create') }}" method="GET">
                                        <input type="submit"id="boton-comprar" class="boton boton-color w-100"
                                            value="Comprar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--SCRIPT PARA LISTAR LOS PRODUCTOS EN LA TABLA LOCALSTORAGE-->
    <script src="{{ asset('js/cliente/cart/ventaCarritoTabla.js') }}"></script>
@endsection



{{-- FOOTER --}}
<x-footer-cliente />
