@extends('layouts.app')
@section('content')
<div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Datos menu</h4>
                </div>
                <div class="card-body">


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">DIA DEL MENU</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="dia" type="text" class="validate" name="dia" value="{{$menu->dia}}" required>
                            </div>
                            <br>
                            @error('dia')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">nombre menu</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="nombre" type="text" class="validate" name="nombre" value="{{$menu->nombre}}" required>
                            </div>
                            <br>
                            @error('nombre')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>


                            <a href="{{ route('menus.index') }}" class="btn btn-primary">Atras</a>

                </div>
            </div>
            <!-- /form user info -->
        </div>
    </div>
</div>
@endsection
