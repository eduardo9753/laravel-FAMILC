@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />






{{-- CONTENIDO --}}
@section('contenido')
    <section id="categoria" class="espacio-section">
        <div class="contenedor">
            <div class="caja-categoria">
                <div>
                    <a href="{{ route('admin.category.create') }}" class="boton espacio-abajo">Nueva Categoria</a>
                </div>
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->nombre }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.category.show', ['category' => $category]) }}"><i
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
