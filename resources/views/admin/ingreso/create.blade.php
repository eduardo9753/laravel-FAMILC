@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />





{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="mt-5">
        <div class="container">
            @if (session('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Exito!</strong> {{ session('mensaje') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('admin.income.store') }}" id="form-ingreso" method="POST" enctype="multipart/form-data">
                {{-- TOKEN DE SEGURIDAD --}}
                @csrf
                {{-- datos para la tabla entrada --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header boton-color">
                                <h1 class="lead">Proveedor</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="person_id" class="">Seleccione proveedor</label>
                                    <select name="person_id" class="form-select espacio-abajo" id="person_id">
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_documento" class="">Tipo documento</label>
                                            <select name="tipo_documento" class="form-select espacio-abajo"
                                                id="tipo_documento">
                                                <option value="F">FACTURA</option>
                                                <option value="B">BOLETA</option>
                                                <option value="T">TICKET</option>
                                                <option value="C">COMPROBANTE DE PAGO</option>
                                                <option value="X">RECIBO X HONORARIO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="numero_documento" class="">Numero documento</label>
                                            <input type="text" id="numero_documento" name="numero_documento"
                                                class="form-control espacio-abajo" placeholder="numero_documento">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header boton-color">
                                <h1 class="lead">Producto</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_id" class="">Seleccione Producto</label>
                                            <select name="product_id" class="form-select espacio-abajo" id="product_id">
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cantidad" class="">cantidad</label>
                                            <input type="text" id="cantidad" name="cantidad"
                                                class="form-control espacio-abajo" placeholder="cantidad">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio_compra" class="">Precio Compra</label>
                                            <input type="text" id="precio_compra" name="precio_compra"
                                                class="form-control espacio-abajo" placeholder="precio_compra">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio_venta" class="">Precio Venta</label>
                                            <input type="text" id="precio_venta" name="precio_venta"
                                                class="form-control espacio-abajo" placeholder="precio_venta">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" name="" id="agregar-datos-entrada"
                        class="boton boton-sin-color w-100 my-4">
                        Agregar a la Tabla
                    </button>
                </div>

                <!--datos para la tabla entrada detalle-->
                <div class="carrito table-responsive">
                    <table class="table lista-carrito" id="">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">producto</th>
                                <th scope="col">proveedor</th>
                                <th scope="col">tipo docu</th>
                                <th scope="col"># docu</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">P.Compra</th>
                                <th scope="col">P.Venta</th>
                                <th scope="col">-</th>
                                <th scope="col">+</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <div>
                        <input type="text" style="font-size: 25px"
                            class="boton-sin-color mb-2 input-carrito mt-1"
                            id="total_compra" readonly>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a class="boton boton-sin-color" id="vaciar-carrito">Limpiar Datos</a>
                        <button type="submit" name="" id="guardar-datos-entrada" class="boton boton-color">
                            Guardar Inventario
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!--SCRIPT PARA PODER GUARDAR EL INVENTARIO DE DATOS-->
    <script src="{{ asset('js/Admin/ingreso/ingreso.js') }}"></script>
@endsection
