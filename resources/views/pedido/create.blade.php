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
              <h5>Registrar menu</h5>
            </div>
          <div class="card-body">
            <ul class="list-inline">
               <li class="list-inline-item">
                  <a href="{{ route('pedidos.index') }}" class="link_ruta">
                    Inicio
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                </li>

               <li class="list-inline-item">

                    Nueva menu
                 </li>
	             </ul><br>
	             <form method="POST" action="{{ route('pedidos.store')}}" >
                       @csrf
                       <div class="form-group">
                        <h2 class="h3">Lista de Alimentos</h2>
                        @foreach($alimentos as $alimento)

                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="myCheck" value="{{$alimento->id}}"name="alimento[]">
                            <label class="form-check-label" for="flexCheckDefault">
                             {{$alimento->nombre}}
                             <br>
                             <img src="{{asset($alimento->imagen)}} " width="100px" height="100px" >
                             <br>
                             hay
                             {{$alimento->cantidad}}
                             platos
                             <br>
                             cuantos quiere??
                             <br>
                             <label class="checkbox-inline">
                                <input type="checkbox" value="1" name="cantidad[]"> 1
                                <input type="checkbox" value="2" name="cantidad[]">2
                                <input type="checkbox" value="3" name="cantidad[]">3
                                <input type="checkbox" value="4" name="cantidad[]">4
                                <input type="checkbox" value="5" name="cantidad[]">5
                                <input type="checkbox" value="6" name="cantidad[]">6
                                <input type="checkbox" value="7" name="cantidad[]">7
                                <input type="checkbox" value="8" name="cantidad[]">8
                                <input type="checkbox" value="9" name="cantidad[]">9
                               <input type="checkbox" value="10" name="cantidad[]">10
                               <input type="checkbox" value="11" name="cantidad[]">11
                               <input type="checkbox" value="12" name="cantidad[]">12
                               <input type="checkbox" value="13" name="cantidad[]">13

                            </label>
                             <br>
                            </label>
                            <br>
                          </div>


                        @endforeach

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

	     </div>
	 </div>
</div>
</div>


@endsection
