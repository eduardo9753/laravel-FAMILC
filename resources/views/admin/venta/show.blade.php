@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />






{{-- CONTENIDO --}}
@section('contenido')
    <section id="" class="mt-5">
        <div class="contenedor">
            <div class="card mb-4">
                <div class="card-header boton-color">
                    <h1 class="lead">Cliente: {{ $people->nombres }}</h1>
                </div>
                <div class="card-body">
                    {{-- MENSAJE SI ESTAN MAL LAS CREDENCIALES --}}
                    @if (session('stock'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Alerta!</strong> {{ session('stock') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Alerta!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.sale.update', ['id' => $sales->id]) }}" method="POST">

                        {{-- METODO ACTUALIZAR --}}
                        @method('PUT')

                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tipo de Comprobante</label>
                                    <select class="form-select" name="tipo_comprobante" id="tipo_comprobante">
                                        <option value="YAPE">YAPE</option>
                                        <option value="PLIN">PLIN</option>
                                        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""># Comprobante</label>
                                    <input type="text" class="form-control" name="numero_comprobante" id=""
                                        required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Registrar Pago" class="boton boton-color w-100 mt-4">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nombres</th>
                            <th scope="col">cantidad</th>
                            <th scope="col">precio</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saleDetail as $sale)
                            <tr>
                                <th scope="row">P-{{ $sale->id }}</th>
                                <td>{{ $sale->product_id }}</td>
                                <td>{{ $sale->cantidad }}</td>
                                <td>{{ $sale->precio_venta }}</td>
                                <td>
                                    <form action="">
                                        <button type="submit" class="" id=""><i
                                                class='bx bxs-comment-x bx-tada'></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </section>
@endsection
