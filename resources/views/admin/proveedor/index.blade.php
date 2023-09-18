@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />






{{-- CONTENIDO --}}
@section('contenido')
    <section id="" class="mt-5">
        <div class="contenedor table-responsive">

            <div>
                <a href="{{ route('admin.provider.create') }}" class="boton boton-sin-color mb-3">Nuevo Proveedor</a>
            </div>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th scope="col">item</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Celular</th>
                        <th scope="col">edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($providers as $provider)
                        <tr>
                            <th scope="row">{{ $provider->id }}</th>
                            <td>{{ $provider->tipo_persona }}</td>
                            <td>{{ $provider->nombres }}</td>
                            <td>{{ $provider->numero_documento }}</td>
                            <td>{{ $provider->direccion }}</td>
                            <td>{{ $provider->telefono }}</td>
                            <td>
                                {{-- ARREGLO DE DATOS POR ESO LE ASIGNAMOS EL SLUG COMO PARAMETRO --}}
                                <a href="{{ route('admin.provider.show', ['provider' => $provider->nombres]) }}"><i
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

