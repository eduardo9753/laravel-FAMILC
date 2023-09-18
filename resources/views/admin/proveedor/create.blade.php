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
                            <h1 class="lead">Proveedor</h1>
                        </div>
                        <div class="card-body">
                            {{-- OBJETO DE DATOS POR ESO LE ASIGNAMOS COMO PARAMETRO TODO EL MODELO --}}
                            <form action="{{ route('admin.provider.store') }}" method="POST" enctype="multipart/form-data">

                                {{-- TOKEN DE SEGURIDAD --}}
                                @csrf

                                <div class="form-group">
                                    <label for="nombres" class="">Nombres</label>
                                    <input type="text" id="nombres" name="nombres" class="form-control espacio-abajo"
                                        placeholder="Nombres" autocomplete="off" value="{{ old('nombres') }}">
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('nombres')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_documento" class="">Tipo Documento</label>
                                            <select name="tipo_documento" class="form-select espacio-abajo"
                                                id="tipo_documento">
                                                <option value="RUC">RUC</option>
                                                <option value="DNI">DNI</option>
                                                <option value="CE">CE</option>
                                                <option value="ID-CARD">ID-CARD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="numero_documento" class=""># de Documento</label>
                                            <input type="text" id="numero_documento" name="numero_documento"
                                                class="form-control espacio-abajo" placeholder="Numero Documento"
                                                autocomplete="off" value="{{ old('numero_documento') }}">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('numero_documento')
                                                <p class="error-registro-usuario">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="direccion" class="">Direccion</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control espacio-abajo"
                                        placeholder="direccion" autocomplete="off" value="{{ old('direccion') }}">
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('direccion')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="telefono" class="">Telefono</label>
                                    <input type="number" id="telefono" name="telefono" class="form-control espacio-abajo"
                                        placeholder="telefono" autocomplete="off" value="{{ old('telefono') }}">
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('telefono')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="email" class="">Correo</label>
                                    <input type="email" id="email" name="email" class="form-control espacio-abajo"
                                        placeholder="email" autocomplete="off" value="{{ old('email') }}">
                                    {{-- VALIDACION CON VALIDATE --}}
                                    @error('email')
                                        <p class="error-registro-usuario">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" name="btn-login" id="" class="boton boton-color">
                                        Guardar Proveedor
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
