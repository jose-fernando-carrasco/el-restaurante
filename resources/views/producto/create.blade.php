@extends('layouts.app')
@section('content')
<div class="container py-3">
    <div class="row">
        @if(Session::has('message'))
        {{Session::get('message')}}
    @endif

        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Registrar Producto</h4>
                </div>
                <div class="card-body">
                <form  method="POST" enctype="multipart/form-data"  action="{{ route('productos.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nombre producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="nombre" type="text" class="validate" name="nombre" value="{{old('nombre')}}" required>
                            </div>
                            <br>
                            @error('nombre')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Precio del producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="cantidad" type="number" class="validate" name="cantidad" value="{{old('cantidad')}}" required>
                            </div>
                            <br>
                            @error('cantidad')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">imagen del producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="imagen" type="file" class="validate" name="imagen" value="{{old('imagen')}}" required>
                            </div>
                            <br>
                            @error('imagen')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">descripcion del producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="descripcion" type="text" class="validate" name="descripcion" value="{{old('descripcion')}}" required>
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
