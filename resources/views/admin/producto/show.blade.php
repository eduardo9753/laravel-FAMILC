@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
<x-navegador-admin />






{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="mt-5">
        <div class="contenedor">

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header boton-color">
                            <h1 class="lead">Actualizar Producto</h1>
                        </div>
                        <div class="card-body">
                            {{-- OBJETO DE DATOS POR ESO LE ASIGNAMOS COMO PARAMETRO TODO EL MODELO --}}
                            <form action="{{ route('admin.product.update', ['product' => $product]) }}" method="POST"
                                enctype="multipart/form-data">

                                {{-- METODO ACTUALIZAR --}}
                                @method('PUT')

                                {{-- TOKEN DE SEGURIDAD --}}
                                @csrf

                                <div class="form-group">
                                    <label for="nombre" class="">Nombre producto</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control espacio-abajo"
                                        placeholder="product" autocomplete="off" value="{{ $product->nombre }}">
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('nombre')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="descripcion" class="">Descripcion producto</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control espacio-abajo">{{ $product->descripcion }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="categoria" class="">Seleccione la categoria</label>
                                    <select name="categoria" class="form-select espacio-abajo" id="categoria">
                                        <option value="{{ $categoria_producto->id }}">
                                            {{ $categoria_producto->nombre }}
                                        </option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->id }}">{{ $category->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio" class="">Precio de Venta</label>
                                            <input type="text" id="precio" name="precio"
                                                class="form-control espacio-abajo" placeholder="precio" autocomplete="off"
                                                value="{{ $product->precio }}">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('precio')
                                                <p class="error-registro-usuario">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stock" class="">stock producto</label>
                                            <input type="text" id="stock" name="stock"
                                                class="form-control espacio-abajo" placeholder="stock" autocomplete="off"
                                                value="{{ $product->stock }}">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('stock')
                                                <p class="error-registro-usuario">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <button type="submit" name="btn-login" id="" class="boton boton-login">
                                        Actualizar Producto
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
