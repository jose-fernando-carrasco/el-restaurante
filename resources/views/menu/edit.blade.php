@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))

    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            <h6 >{{session('status')}}</h6>
        </div>
      </div>
    @endif
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-line-primary">

          <div class="card-header  ">
              <h5>actualizar menu</h5>
            </div>
          <div class="card-body">
            <ul class="list-inline">
               <li class="list-inline-item">
                  <a href="{{ route('menus.index') }}" class="link_ruta">
                    Inicio
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                </li>

               <li class="list-inline-item">

                    Nueva menu
                 </li>
	             </ul>
                 <br>
	             <form method="POST" action="{{ route('menus.update',[$menu->id])}}" >
                       @csrf
                       @method('PUT')

                        <div class="input-field col s12 m4">
                            <label for="dia">DIA DEL MENU:</label>
                            <input id="dia" type="text" class="validate" name="dia" value="{{$menu->dia}}" required>
                            <br>
                            @error('dia')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>
                        <br>

                        <div class="input-field col s12 m4">
                            <label for="nombre">nombre del menu :</label>
                            <input id="nombre"type="text"  class="validate" name="nombre" value="{{$menu->nombre}}" required>
                            <br>
                            @error('nombre')
                            <span style="color:red"> {{ $message }} </span>
                            @enderror
                        </div>

                        <br>

                          <br>
                          <div class="form-group">
                            <h2 class="h3">Lista de Alimentos</h2>
                            @foreach($alimentos as $alimento)

                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="myCheck" onclick="myFunction()" value="{{$alimento->id}}"name="alimento[]" >
                                <label class="form-check-label" for="flexCheckDefault">
                                 {{$alimento->nombre}}
                                </label>
                                <br>


                              </div>


                            @endforeach

                        </div>
                    <br>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <input type="submit" class="btn btn-primary"  onclick="showProgress()" value="actualizar">
                            <input type="reset" class="btn btn-secondary" value="Limpar">
                        </div>
                    </div>
            </form>

	     </div>
	 </div>
</div>
</div>


@endsection
