@extends('layouts/app')










{{-- CONTENIDO --}}
@section('contenido')
    <section id="login" class="">
        <div class="login-grilla">

            <div class="fondo-mitad-login"></div>


            <div class="caja-formulario">
                <form action="{{ route('register.store') }}" method="POST">

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf

                    <div class="caja-grupo">
                        <label for="nombre" class="">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="caja" placeholder="Nombre"
                            autocomplete="off" value="{{ old('nombre') }}">
                        {{-- VALIDACION CON VALIDATE --}}
                        @error('nombre')
                            <p class="error-registro-usuario">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="caja-grupo">
                        <label for="email" class="">Email</label>
                        <input type="email" id="email" name="email" class="caja"
                            placeholder="Tu Correo Electronico" autocomplete="off" value="{{ old('email') }}">
                        {{-- VALIDACION CON VALIDATE --}}
                        @error('email')
                            <p class="error-registro-usuario">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="caja-grupo">
                        <label for="password" class="">Password</label>
                        <input type="password" name="password" class="caja" placeholder="*************" id="password"
                            autocomplete="off">
                        {{-- VALIDACION CON VALIDATE --}}
                        @error('password')
                            <p class="error-registro-usuario">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="caja-grupo">
                        <label for="password_confirmation" class="">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="caja" placeholder="*************"
                            id="password" autocomplete="off">
                        {{-- VALIDACION CON VALIDATE --}}
                        @error('password_confirmation')
                            <p class="error-registro-usuario">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" name="btn-login" id="" class="boton boton-login">
                            Registrarse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
