@extends('layouts.app')
@section('content')
<div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Datos administrador</h4>
                </div>
                <div class="card-body">


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nombre administrador</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="nombre" type="text" class="validate" name="nombre" value="{{$persona->nombre}}" required>
                            </div>
                            <br>
                            @error('nombre')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Apellido administrador</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="Apellido" type="text" class="validate" name="Apellido" value="{{$persona->apellido}}" required>
                            </div>
                            <br>
                            @error('Apellido')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">fecha nacimiento administrador</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="fecha_nacimiento" type="date" class="validate" name="fecha_nacimiento" value="{{$persona->fecha_nacimiento}}" required>
                            </div>
                            <br>
                            @error('fecha_nacimiento')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"> profesion administrador</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="profesion" type="text" class="validate" name="profesion" value="{{$persona->administrador->profesion}}" required>
                            </div>
                            <br>
                            @error('profesion')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>


                            <a href="{{ route('administradores.index') }}" class="btn btn-primary">Atras</a>

                </div>

            </div>
            <!-- /form user info -->
        </div>
    </div>

</div>

@endsection

