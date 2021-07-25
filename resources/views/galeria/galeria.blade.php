@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($producto as $galeria  )
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">

            <div class="card" >
                <br>
                <div class="card-header  ">
                    <h5>{{$galeria->nombre}}</h5>

                  </div>
                  <div class="card-body">
                <img src="{{asset($galeria->imagen)}}" class="card-body-img-top" alt="..." style="width: 18rem;">
                 
                  </div>
                  <div class="card-footer">
                    <h5>{{$galeria->descripcion}}</h5>
                  </div>
              </div>
              <br>

        </div>
        @endforeach

    </div>
</div>
@endsection


