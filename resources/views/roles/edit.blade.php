@extends('layouts.app')
@section('content')
<div class="container">  @if(session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($role,['route'=>['roles.update',$role],'method'=>'put']) !!}

        @include('roles.partials._form')
        <br>
         {!! Form::submit('Actualizar rol',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
</div>
    @endsection
