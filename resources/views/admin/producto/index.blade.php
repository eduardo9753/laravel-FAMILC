@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
@section('navegador')
    <x-navegador-admin />
@endsection






{{-- CONTENIDO --}}
@section('contenido')
    <section id="categoria" class="espacio-section">
        <div class="contenedor">
            <div class="caja-categoria">
                <div>
                    <a href="{{ route('admin.product.create') }}" class="boton espacio-abajo">Nuevo Producto</a>
                </div>
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">nombre</th>
                            <th scope="col">precio</th>
                            <th scope="col">estado</th>
                            <th scope="col">categoria</th>
                            <th scope="col">usuario</th>
                            <th scope="col">edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $product)
                            <tr>
                                <th scope="row">P-{{ $product->id }}</th>
                                <td>{{ $product->nombre }}</td>
                                <td>{{ $product->precio }}</td>
                                <td>{{ $product->estado }}</td>
                                <td>{{ $product->categoria }}</td>
                                <td>{{ $product->usuario }}</td>
                                <td>
                                    {{--ARREGLO DE DATOS POR ESO LE ASIGNAMOS EL SLUG COMO PARAMETRO--}}
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
        </div>
    </section>
@endsection



{{-- FOOTER --}}
@section('footer')
    <footer id="footer">
    </footer>
@endsection
