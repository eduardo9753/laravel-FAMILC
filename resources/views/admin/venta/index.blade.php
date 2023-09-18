@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />






{{-- CONTENIDO --}}
@section('contenido')
    <section id="" class="mt-5">
        <div class="contenedor table-responsive">
            @if (session('exito'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Exito!</strong> {{ session('exito') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">item</th>
                        <th scope="col">nombres</th>
                        <th scope="col">direccion</th>
                        <th scope="col">telefono</th>
                        <th scope="col">email</th>
                        <th scope="col">venta</th>
                        <th scope="col">estado</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <th scope="row">{{ $sale->id }}</th>
                            <td>{{ $sale->nombres }}</td>
                            <td>{{ $sale->direccion }}</td>
                            <td>{{ $sale->telefono }}</td>
                            <td>{{ $sale->email }}</td>
                            <td>S/{{ $sale->total_venta }}</td>
                            <td>{{ $sale->estado }}</td>
                            <td>
                                {{-- ARREGLO DE DATOS POR ESO LE ASIGNAMOS EL SLUG COMO PARAMETRO --}}
                                <a href="{{ route('admin.sale.show', ['id' => $sale->id]) }}"><i
                                        class='bx bx-edit bx-tada'></i></a>
                            </td>

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
    </section>
@endsection
