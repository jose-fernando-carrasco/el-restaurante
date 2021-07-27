@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-6">
        <a class="btn btn-primary"  href="{{ route('pedidos.create') }}" role="button">
            REGISTRAR
          </a>
    </div>
  <br>
  <div class="row">
      <div class="col-md-12">
      <div class="card card-line-primary">
        <div class="card-header  ">
          <h5>Listado de pedidos</h5>

        </div>
         <!-- /.card-header -->
            <div class="card-body table-responsive">


                <table id="reserva" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>ID</th>
                        <th>Nombre</th>
                        <th>fecha</th>


                        <th>cantidad de su pedido</th>

                        <th>Nombre de sus pedido</th>




                        <th>Acciones</th>

                        </tr>
                    </thead>
                    @foreach($alimentos as $pedido)
                            <tr>

                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->persona->nombre}}</td>
                                <td>{{ $pedido->fecha }}</td>
                                <td>{{ $pedido->cantidad }}</td>
                                <td>
                                <table class="table table-hover">
                                    <tr>

                                @foreach ($pedido->alimentos  as $alimento )

                                <td><img src="{{asset($alimento->imagen)}} " width="100px" height="100px" ></td>
                                 </tr>
                                @endforeach

                            </table>
                                </td>

                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                      </svg>
                                    <a  href="{{ route('pedidos.show', [ $pedido->id]) }}">ver</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                      </svg>
                                    <a href="{{ route('pedidos.edit', [ $pedido->id]) }}">editar</span></a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                      </svg>
                                    <a href="{{ route('pedidos.destroy', [ $pedido->id]) }}">eliminar</span></a>

                                </td>




                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

  </div>

</div>
@endsection
