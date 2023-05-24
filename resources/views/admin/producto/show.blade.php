@extends('layouts/app')



{{-- NAVEGADOR DE LAS PAGINAS --}}
@section('navegador')
    <x-navegador-admin />
@endsection






{{-- CONTENIDO --}}
@section('contenido')
    <section id="producto" class="espacio-section">
        <div class="contenedor">
            <div class="caja-formulario">
                 {{--OBJETO DE DATOS POR ESO LE ASIGNAMOS COMO PARAMETRO TODO EL MODELO--}}
                <form action="{{ route('admin.product.update' , ['product' => $product ]) }}" method="POST" enctype="multipart/form-data">

                    {{-- METODO ACTUALIZAR --}}
                    @method('PUT')

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf

                    <div class="grilla-producto">
                        <div>
                            <div class="caja-grupo">
                                <label for="nombre" class="">Nombre producto</label>
                                <input type="text" id="nombre" name="nombre" class="caja-admin espacio-abajo"
                                    placeholder="product" autocomplete="off" value="{{ $product->nombre }}">
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('nombre')
                                    <p class="error-registro-usuario">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="caja-grupo">
                                <label for="precio" class="">Precio producto</label>
                                <input type="text" id="precio" name="precio" class="caja-admin espacio-abajo"
                                    placeholder="precio" autocomplete="off" value="{{ $product->precio }}">
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('precio')
                                    <p class="error-registro-usuario">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="caja-grupo">
                                <label for="descripcion" class="">Descripcion producto</label>
                                <textarea name="descripcion" id="descripcion" class="caja-admin espacio-abajo">{{ $product->descripcion }}</textarea>
                            </div>

                            <div class="caja-grupo">
                                <label for="categoria" class="">Seleccione la categoria</label>
                                <select name="categoria" class="caja-admin espacio-abajo" id="categoria">
                                    <option value="{{ $categoria_producto->id }}">{{ $categoria_producto->nombre }}</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                    @endforeach
                                </select>
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
    </section>
@endsection



{{-- FOOTER --}}
@section('footer')
    <footer id="footer">
    </footer>
@endsection
