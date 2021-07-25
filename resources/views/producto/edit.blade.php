@extends('layouts.app')
@section('content')
<div class="container py-3">
    <div class="row">


        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Editar Producto</h4>
                </div>
                <div class="card-body">
                <form  method="POST" enctype="multipart/form-data"  action="{{ route('productos.update', [$producto->id]) }}">
                    @csrf
                    @method('PUT')

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
                                <img  id="imagen2" src="{{asset($producto->imagen)}}" width="400px" height="400px" name="imagen2">

                            </div>
                            <br>
                            @error('imagen2')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">imagen del producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="imagen" type="file" class="validate" name="imagen" value="{{$producto->imagen}}">
                            </div>

                        </div>
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



                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="submit" class="btn btn-primary"  onclick="showProgress()" value="Registrar">
                                <input type="reset" class="btn btn-secondary" value="Limpar">
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('productos.index') }}" class="btn btn-primary">Atras</a>

                </div>
            </div>
            <!-- /form user info -->
        </div>
    </div>
</div>
@endsection
