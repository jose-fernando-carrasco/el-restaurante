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
              <h5>Registrar reserva</h5>
            </div>
          <div class="card-body">
            <ul class="list-inline">
               <li class="list-inline-item">
                  <a href="{{ route('reservas.index') }}" class="link_ruta">
                    Inicio
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                </li>

               <li class="list-inline-item">

                    Nueva reserva
                 </li>
	             </ul><br>
	             <form method="POST" action="{{ route('reservas.store') }}">
                       @csrf
                    <div class="row">
                        <div class="input-field col s12 m4">
                            <input id="fecha" type="date" class="validate" name="fecha" value="{{old('fecha')}}">
                            <label for="fecha">FECHA A RESERVAR:</label>
                            <br>
                            @error('fecha')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="input-field col s12 m4">
                            <input id="hora"type="time"  step="0" class="validate" name="hora" value="{{old('hora')}}">
                            <label for="hora">hora :</label>
                            <br>
                            @error('hora')
                            <span style="color:red"> {{ $message }} </span>
                            @enderror
                        </div>


                        <div class="input-field col s12 m4">
                            <input id="cantidad" type="number" class="validate" name="cantidad" value="{{old('cantidad')}}">
                            <label for="cantidad">cantidad:</label>
                            <br>
                            @error('cantidad')
                            <span style="color:red"> {{ $message }} </span>
                            @enderror
                        </div>

                    </div>
                    <div class="card-action right-align">
                        <button type="submit" class="waves-effect waves-brown btn-flat red-text bold" onclick="showProgress()">Guardar</button>
                    </div>
            </form>

	     </div>
	 </div>
</div>
</div>


@endsection
