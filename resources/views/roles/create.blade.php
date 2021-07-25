@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'roles.store']) !!}

            @include('roles.partials._form')

            {!! Form::submit('Crear rol',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

    @endsection
