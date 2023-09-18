@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />






{{-- CONTENIDO --}}
@section('contenido')
    <section id="" class="mt-5">
        <div class="contenedor">

            <div>
                <a href="{{ route('admin.product.create') }}" class="boton boton-sin-color mb-3">Nuevo Producto</a>
            </div>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">item</th>
                        <th scope="col">nombre</th>
                        <th scope="col">precio</th>
                        <th scope="col">estado</th>
                        <th scope="col">categoria</th>
                        <th scope="col">stock</th>
                        <th scope="col">usuario</th>
                        <th scope="col">edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->nombre }}</td>
                            <td>{{ $product->precio }}</td>
                            <td>{{ $product->estado }}</td>
                            <td>{{ $product->categoria }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->usuario }}</td>
                            <td>
                                {{-- ARREGLO DE DATOS POR ESO LE ASIGNAMOS EL SLUG COMO PARAMETRO --}}
                                <a href="{{ route('admin.product.show', ['product' => $product->slug]) }}"><i
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



