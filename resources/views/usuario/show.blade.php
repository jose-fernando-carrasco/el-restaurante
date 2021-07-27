@extends('layouts.app')
@section('content')
<div class="container py-3">
    <div class="row">


        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Datos Del Usuario</h4>
                </div>
                <div class="card-body">

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="nombre" type="text" class="validate" name="nombre" value="{{$persona->user->name}}" required>
                            </div>
                            <br>
                            @error('nombre')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">correo</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="correo" type="email" class="validate" name="correo" value="{{$persona->user->email}}" required>
                            </div>
                            <br>
                            @error('correo')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">imagen del usuario</label>
                            <div class="col-lg-9">
                                <img  id="imagen" src="{{asset($persona->user->imagen)}}" width="100px" height="150px">
                            </div>
                            <br>
                            @error('imagen')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <br>






                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Atras</a>

                </div>
            </div>
            <!-- /form user info -->
        </div>
    </div>
</div>
@endsection
