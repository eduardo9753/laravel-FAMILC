@extends('layouts/app')










{{-- CONTENIDO --}}
@section('contenido')
    <section id="login" class="">
        <div class="login-grilla">

            <div class="fondo-mitad-login"></div>


            <div class="caja-formulario">
                <form action="{{ route('login.store') }}" method="POST">

                    {{-- TOKEN DE SEGURIDAD --}}
                    @csrf

                    {{-- MENSAJE SI ESTAN MAL LAS CREDENCIALES --}}
                    @if (session('mensaje'))
                        <p class="error-registro-usuario">{{ session('mensaje') }}</p>
                    @endif

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
                        <input type="checkbox" name="remenber" class=""
                            id="mantenerSession">
                        <label class="form-check-label" for="mantenerSession">Mantener mi Session</label>
                    </div>

                    <div>
                        <button type="submit" name="btn-login" id="" class="boton boton-login">
                            Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
