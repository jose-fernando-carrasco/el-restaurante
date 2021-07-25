<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante El Buen Paladar</title>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bootstrap/css/main.css')}}">

</head>
<!-- Custom styles for this template -->
<link href="offcanvas.css" rel="stylesheet">
<body>

  <div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image">

          <img src="{{asset('bootstrap/img/logo.jpg')}}" alt="logo">
        </div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4" > RESTAURANTE<br> EL BUEN PALADAR </h3>
                            <p class="text-muted mb-4">INICIO DE SESION</p>
                            <form method="POST" action="{{route('login')}}">
                                @csrf

                                <div class="input-field" >
                                    <label for="email">Email: </label>
                                    <input id="email" name="email" type="text" class="validate" value="{{old('email')}}">

                                    {!! $errors->first('email', '<span class="help-block red-text">:message</span>') !!}
                                </div>
                                <div class="input-field">
                                    <label for="password">Contraseña: </label>
                                    <input id="password" name="password" type="password" class="validate">

                                    {!! $errors->first('password', '<span class="help-block red-text">:message</span>') !!}
                                </div>

                                <br><br>
                                <div>
                                    <input class="btn btn-primary" value="Iniciar Sesión" type="submit" onclick="showProgress()">
                                </div>

                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>

<script src="{{asset('bootstrap/js/popper.min.js')}}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>
