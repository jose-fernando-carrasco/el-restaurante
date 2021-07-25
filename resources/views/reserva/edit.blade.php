@extends('layouts.app')

@section('content')
<div class="container">

    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-line-primary">

          <div class="card-header  ">
              <h5>Editar reserva</h5>
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

                    EDITAR RESERVA
                 </li>
	             </ul><br>
	             <form method="POST" action="{{ route('reservas.update', [$reserva->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="input-field col s12 m4">
                            <input id="fecha" type="date" class="validate" name="fecha" value="{{$reserva->fecha}}">
                            <label for="fecha">FECHA A RESERVAR:</label>
                            <br>
                            @error('fecha')
                            <span style="color:red">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="input-field col s12 m4">
                            <input id="hora"type="time"  step="0" class="validate" name="hora" value="{{$reserva->hora}}">
                            <label for="hora">hora :</label>
                            <br>
                            @error('hora')
                            <span style="color:red"> {{ $message }} </span>
                            @enderror
                        </div>


                        <div class="input-field col s12 m4">
                            <input id="cantidad" type="number" class="validate" name="cantidad" value="{{$reserva->cantidad}}">
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
