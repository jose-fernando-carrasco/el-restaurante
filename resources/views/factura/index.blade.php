@extends('layouts.app')

@section('content')

<div class="container">

  <br>
  <div class="row">
      <div class="col-md-12">
      <div class="card card-line-primary">
        <div class="card-header  ">
          <h5>Listado de menu</h5>

        </div>
         <!-- /.card-header -->
            <div class="card-body table-responsive">

            <table id="reserva" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nombre del cliente</th>
                        <th>fecha</th>
                        <th>monto</th>
                        <th>cantidad de pedido</th>
                        <th>acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->persona->nombre }}</td>
                            <td>{{ $factura->fecha }}</td>
                            <td>{{$menu->admin_id}}</td>

                          

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
