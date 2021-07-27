@extends('layouts.app')
@section('content')
<div class="container py-3">
    <div class="row">


        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Datos alimento</h4>
                </div>
                <div class="card-body">

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nombre alimento</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="nombre" type="text" class="validate" name="nombre" value="{{$alimento->nombre}}" required>
                            </div>
                            <br>
                            @error('nombre')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">precio del alimento</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="precio" type="text" class="validate" name="precio" value="{{$alimento->precio}}" required>
                            </div>
                            <br>
                            @error('precio')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">cantidad del alimento</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="cantidad" type="text" class="validate" name="cantidad" value="{{$alimento->cantidad}}" required>
                            </div>
                            <br>
                            @error('cantidad')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">imagen del alimento</label>
                            <div class="col-lg-9">
                                <img  id="imagen" src="{{asset($alimento->imagen)}}" width="400px" height="400px">
                            </div>
                            <br>
                            @error('imagen')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">descripcion del alimento</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="descripcion" type="text" class="validate" name="descripcion" value="{{$alimento->descripcion}}" required>
                            </div>
                            <br>
                            @error('descripcion')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>





                    <a href="{{ route('alimentos.index') }}" class="btn btn-primary">Atras</a>

                </div>
            </div>
            <!-- /form user info -->
        </div>
    </div>
</div>
@endsection
