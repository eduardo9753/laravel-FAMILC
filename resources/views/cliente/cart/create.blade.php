@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-cliente />




{{-- HEADER --}}
@section('header')
    <header id="header-producto">
        <div class="header-producto-descripcion">
            <h1 class="titulo-header">Mi Carrito</h1>
        </div>
    </header>
@endsection






{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="mt-5">
        <div class="contenedor">

            <form action="" id="form-cart-venta" method="POST" enctype="multipart/form-data">
                {{-- TOKEN DE SEGURIDAD --}}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="card-header boton-color">
                            <h1 class="lead">Tus Datos</h1>
                        </div>

                        {{-- datos para la tabla venta --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombres" class="">Nombre Completo</label>
                                        <input type="text" id="nombres" name="nombres"
                                            class="form-control espacio-abajo" placeholder="nombres">
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion" class="">Dirección de Entrega</label>
                                        <input type="text" id="direccion" name="direccion"
                                            class="form-control espacio-abajo" placeholder="direccion">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tipo_documento" class="">Tipo Documento</label>
                                                <select name="tipo_documento" class="form-select espacio-abajo"
                                                    id="tipo_documento">
                                                    <option value="DNI">DNI</option>
                                                    <option value="CE">CE</option>
                                                    <option value="ID-CARD">ID-CARD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="numero_documento" class="">
                                                    Documento de Identidad</label>
                                                <input type="text" id="numero_documento" name="numero_documento"
                                                    class="form-control espacio-abajo" placeholder="numero_documento">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="telefono" class="">Celular</label>
                                                <input type="number" id="telefono" name="telefono"
                                                    class="form-control espacio-abajo" placeholder="Celular">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="email" class="">Email válido</label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control espacio-abajo" placeholder="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-12">

                                    <!--datos para la tabla entrada detalle-->
                                    <div class="carrito table-responsive">
                                        <table class="table lista-carrito-venta" id="">
                                            <thead class="boton-color">
                                                <tr>
                                                    <th scope="col" class="text-center">X</th>
                                                    <th scope="col" class="text-center">Item</th>
                                                    <th scope="col" class="text-center">Imagen</th>
                                                    <th scope="col" class="text-center">Descripcion</th>
                                                    <th scope="col" class="text-center">Precio</th>
                                                    <th scope="col" class="text-center">Cantidad</th>
                                                    <th scope="col" class="text-center">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <input type="text" style="font-size: 25px"
                                            class="boton-sin-color mb-2 input-carrito mt-1" value="0"
                                            name="total_venta" id="total_venta" readonly>
                                    </div>

                                </div>

                            </div>

                            <div class="d-flex justify-content-between">
                                <!--<div>
                                                    <button type="submit" name="" id="guardar-datos-venta"
                                                        class="boton boton-color w-100 mt-4">
                                                        Generar Pedido
                                                    </button>
                                                </div>-->

                                <div>
                                    <button type="submit" name="" id="guardar-datos-venta-compra"
                                        class="boton boton-color w-100 mt-4">
                                        Comprar ahora
                                    </button>
                                    <div id="wallet_container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="alert alert-info mt-2 alert-dismissible fade show" role="alert">
                <strong>Importante!:</strong> Realizada la compra, MercadoPago lo redireccionará a nuestro sitio web para
                poder completar exitosamente la compra. No cierre la pestaña del navegador.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </section>

    <!--SCRIPT PARA LISTAR LOS PRODUCTOS EN LA TABLA LOCALSTORAGE-->
    <script src="{{ asset('js/cliente/cart/ventaCarritoTabla.js') }}"></script>

    <!--SCRIP PARA CREAR EL BOTON DE MERCADOPAGO-->
    <script src="{{ asset('js/cliente/mercadopago/mercadopago.js') }}"></script>
@endsection


<!--FOOTER -->
@section('footer')
    <x-footer-cliente />
@endsection
