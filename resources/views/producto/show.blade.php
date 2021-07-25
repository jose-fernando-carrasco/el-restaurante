@extends('layouts.app')
@section('content')
<div class="container py-3">
    <div class="row">


        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Datos Producto</h4>
                </div>
                <div class="card-body">

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nombre producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="nombre" type="text" class="validate" name="nombre" value="{{$producto->nombre}}" required>
                            </div>
                            <br>
                            @error('nombre')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">cantidad del producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="cantidad" type="number" class="validate" name="cantidad" value="{{$producto->cantidad}}" required>
                            </div>
                            <br>
                            @error('cantidad')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">imagen del producto</label>
                            <div class="col-lg-9">
                                <img  id="imagen" src="{{asset($producto->imagen)}}" width="400px" height="400px">
                            </div>
                            <br>
                            @error('imagen')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">descripcion del producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="descripcion" type="text" class="validate" name="descripcion" value="{{$producto->descripcion}}" required>
                            </div>
                            <br>
                            @error('descripcion')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>





                    <a href="{{ route('productos.index') }}" class="btn btn-primary">Atras</a>

                </div>
            </div>
            <!-- /form user info -->
        </div>
    </div>
</div>
@endsection
