@extends('layouts.app')
@section('content')
<div class="container">

    <form class="form"  autocomplete="on" method="POST" action="{{ route('alimentomenus.store') }}">
        @csrf

        <div class="form-group">
            <label for="lista">Lista De Menu</label>
            <select class="form-control" name='menu'>
                <option >Comienzo De La Lista</option>
              @foreach($menus as $menu)
              <option value='{{$menu->id}}'>{{$menu->nombre}}</option>
              @endforeach

            </select>
          </div>
    <div class="row">
        <div class="form-group">
            <h2 class="h3">Lista de Alimentos</h2>
            @foreach($alimentos as $alimento)
            <br>
                <div>
                    <label for="{{$alimento->id}}">
                        {!! Form::checkbox('alimento[]',$alimento->id,null,['class'=>'mr-l','id'=>$alimento->id]) !!}
                        {{ $alimento->nombre}}

                        <img src="{{asset($alimento->imagen)}}" width="200px" height="200px" >
                        <br>
                        <br>
                        {!!Form::number('name', 'value');!!}
                    </label>
                    <br>
                </div>
                <br>
                <br>
            @endforeach
          </div>
          <br>
          <br>

    </div>
    <br>
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
@endsection
