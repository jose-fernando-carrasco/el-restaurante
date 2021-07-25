@extends('layouts.app')
@section('content')
    <div class="row">
        <form method="POST" action="{{ route('usuarios.store') }}">
            @csrf

            <div class="col s12 m10 offset-m1 l6 offset-l3 xl6 offset-xl3">
                <div id="panel-left" class="card">

                    <div class="card-content">
                        <span class="card-title primary-text-color primary-text-style">
                            Formulario de Registro
                            </span>
                        <div class="row">
                            <div class="col s12 divider"></div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input id="nombre" type="text" class="validate" name="nombre" value="{{old('nombre')}}">
                                <label for="nombre">Nombre Completo:</label>
                                @error('nombre')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="apellido" type="text" class="validate" name="apellido" value="{{old('apellido')}}">
                                <label for="apellido">Apellido:</label>
                                @error('apellido')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>






                            <div class="input-field col s8">
                                <input id="correo" type="email" class="validate" name="correo" value="{{old('correo')}}">
                                <label for="correo">Correo:</label>
                                @error('correo')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>



                            <div class="input-field col s12 m4">
                                <input id="fecha_nacimiento" type="text" class="datepicker" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
                                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                                @error('fecha_nacimiento')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>




                            <div class="input-field col s12 ">
                                <textarea id="direccion" class="validate materialize-textarea" name="direccion">{{old('direccion')}}</textarea>
                                <label for="direccion">Dirección:</label>
                                @error('direccion')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>

                        

                            <div class="input-field col s12 m6">
                                <input id="password" type="password" class="validate" name="password">
                                <label for="password">Contraseña:</label>
                                @error('password')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="password_confirmation" type="password" class="validate" name="password_confirmation">
                                <label for="password_confirmation">Repetir Contraseña:</label>

                            </div>
                        </div>
                        <div class="card-action right-align">
                            <button type="submit" class="waves-effect waves-brown btn-flat red-text bold" onclick="showProgress()">Guardar</button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>

@endsection
