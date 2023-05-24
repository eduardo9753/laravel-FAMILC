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
                    <a href="{{ route('admin.product.index') }}" class="boton espacio-abajo">Ver productos</a>
                </div>
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">producto</th>
                            <th scope="col">codigo</th>
                            <th scope="col">foto 1</th>
                            <th scope="col">foto 2</th>
                            <th scope="col">foto 3</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photo as $photo)
                            <tr>
                                <th scope="row">{{ $photo->id_photo }}</th>
                                <td>{{ $photo->nombre }}</td>
                                <td>P-{{ $photo->id }}</td>
                                <td> <img class="imagen-precia-admin" src="{{ asset('tazas') . '/' . $photo->foto_uno }}"
                                        alt="Imagen del post {{ $photo->foto_uno }}"></td>
                                <td><img class="imagen-precia-admin" src="{{ asset('tazas') . '/' . $photo->foto_dos }}"
                                        alt="Imagen del post {{ $photo->foto_dos }}"></td>
                                <td><img class="imagen-precia-admin" src="{{ asset('tazas') . '/' . $photo->foto_tres }}"
                                        alt="Imagen del post {{ $photo->foto_tres }}"></td>
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
