@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-6">
      <div class="btn-group">


      </div>
    </div>
  <br>
  <div class="row">
      <div class="col-md-12">
      <div class="card card-line-primary">
        <div class="card-header  ">
          <h5>Listado de bitacora</h5>

        </div>

         <!-- /.card-header -->
            <div class="card-body table-responsive">


                <br>
   
                <table id="bitacora" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>usuario</th>
                            <th>tabla</th>
                            <th>descripcion</th>


                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bitacoras as $bitacoras)

                            <tr>
                                <td>{{ $bitacoras->id }}</td>
                                <td>{{ $bitacoras->usuario }}</td>
                                <td>{{ $bitacoras->tabla }}</td>
                                <td>{{ $bitacoras->descripcion }}</td>

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
