@extends('layouts.app')
@section('content')
<div class="container py-3">
    @if (session('status'))

    <div class="alert alert-Success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            <h6 >{{session('status')}}</h6>
        </div>
      </div>
    @endif
    <div class="row">
        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Registrar Cajero</h4>
                </div>
                <div class="card-body">
                <form class="form"  autocomplete="on" method="POST" action="{{ route('cajeros.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Nombre cajero</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="nombre" type="text" class="validate" name="nombre" value="{{old('nombre')}}" required>
                            </div>
                            <br>
                            @error('nombre')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Apellido cajero</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="Apellido" type="text" class="validate" name="Apellido" value="{{old('Apellido')}}" required>
                            </div>
                            <br>
                            @error('Apellido')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">fecha nacimiento cajero</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="fecha_nacimiento" type="date" class="validate" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" required>
                            </div>
                            <br>
                            @error('fecha_nacimiento')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">carnet identidad cajero</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="carnet_identidad" type="text" class="validate" name="carnet_identidad" value="{{old('carnet_identidad')}}" required>
                            </div>
                            <br>
                            @error('carnet_identidad')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">profesion cajero</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="profesion" type="text" class="validate" name="profesion" value="{{old('profesion')}}" required>
                            </div>
                            <br>
                            @error('profesion')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <br>



                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="submit" class="btn btn-primary"  onclick="showProgress()" value="Registrar">
                                <input type="reset" class="btn btn-secondary" value="Limpar">
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('cajeros.index') }}" class="btn btn-primary">Atras</a>

                </div>
            </div>
            <!-- /form user info -->
        </div>
    </div>
</div>
@endsection
