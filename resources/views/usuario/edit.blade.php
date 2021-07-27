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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('usuarios.update', [$persona->id]) }}">
                        @csrf
                        @method('PUT')


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
                                <img  id="imagen" src="{{asset($persona->user->imagen)}}" width="100px" height="100px">
                            </div>
                            <br>
                            @error('imagen')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">imagen del producto</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="imagen" type="file" class="validate" name="imagen" value="{{old('imagen')}}">
                            </div>
                            <br>
                            @error('imagen')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">password</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="password" type="password" class="validate" name="password" value="{{$persona->user->password}}" required>
                            </div>
                            <br>
                            @error('password')
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

                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Atras</a>

                </div>
            </div>
            <!-- /form user info -->
        </div>
    </div>
</div>

@endsection
