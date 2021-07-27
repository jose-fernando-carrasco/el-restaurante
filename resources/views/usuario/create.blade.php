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
                <form class="form" enctype="multipart/form-data"  autocomplete="on" method="POST" action="{{ route('usuarios.store') }}">

                                @csrf

                                <div class="form-group">
                                    <label for="lista">Lista De Personas Sin Cuenta</label>
                                    <select class="form-control" name='cajeros'>
                                        <option >Comienzo De La Lista</option>
                                      @foreach($cajeros as $cajero)
                                      <option value='{{$cajero->id}}'>{{$cajero->nombre}}</option>
                                      @endforeach

                                    </select>
                                  </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" id="nombre" type="text" class="validate" name="nombre" value="{{old('nombre')}}" required>
                                    </div>
                                    <br>
                                    @error('nombre')
                                    <span style="color:red">{{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Correo</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" id="Correo" type="email" class="validate" name="Correo" value="{{old('Correo')}}" required>
                                    </div>
                                    <br>
                                    @error('Correo')
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
                                    <label class="col-lg-3 col-form-label form-control-label">contraseña</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" id="contraseña" type="password" class="validate" name="contraseña" value="{{old('contraseña')}}" required>
                                    </div>
                                    <br>
                                    @error('contraseña')
                                    <span style="color:red">{{ $message }} </span>
                                    @enderror
                                </div>
                               {!!Form::select('role_id', [$roles], null, ['placeholder' => 'Roles ']);!!}



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
