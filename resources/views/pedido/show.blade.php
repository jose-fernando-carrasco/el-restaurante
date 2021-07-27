@extends('layouts.app')
@section('content')
<div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-6">
            <!-- form user info -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Datos De pedido</h4>
                </div>
                <div class="card-body">


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">fecha del pedido</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="fecha" type="date" class="validate" name="fecha" value="{{$pedido->fecha}}" required>
                            </div>
                            <br>
                            @error('fecha')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">cantidad de platos</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="cantidad" type="text" class="validate" name="cantidad" value="{{$pedido->cantidad}}" required>
                            </div>
                            <br>
                            @error('cantidad')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>


                            <a href="{{ route('pedidos.index') }}" class="btn btn-primary">Atras</a>

                </div>

            </div>
            <!-- /form user info -->
        </div>
    </div>

</div>

@endsection
