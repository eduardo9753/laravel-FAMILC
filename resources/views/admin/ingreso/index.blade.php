@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />






{{-- CONTENIDO --}}
@section('contenido')
    <section id="" class="mt-5">
        <div class="contenedor table-responsive">

            <div>
                <a href="{{ route('admin.income.create') }}" class="boton boton-sin-color mb-3">Nuevo Registro</a>
            </div>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">item</th>
                        <th scope="col">nombres</th>
                        <th scope="col">direccion</th>
                        <th scope="col">telefono</th>
                        <th scope="col">email</th>
                        <th scope="col">compra</th>
                        <th scope="col">estado</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incomes as $income)
                        <tr>
                            <th scope="row">{{ $income->id }}</th>
                            <td>{{ $income->nombres }}</td>
                            <td>{{ $income->direccion }}</td>
                            <td>{{ $income->telefono }}</td>
                            <td>{{ $income->email }}</td>
                            <td>S/{{ $income->total_compra }}</td>
                            <td>{{ $income->estado }}</td>
                            <td>
                                {{-- ARREGLO DE DATOS POR ESO LE ASIGNAMOS EL SLUG COMO PARAMETRO --}}
                                <a href=""><i
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


