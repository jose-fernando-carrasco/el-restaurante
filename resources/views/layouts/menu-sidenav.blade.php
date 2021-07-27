


  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 400px;">
        <div class="user-view dark-primary-color">
            <a href="#user"><img class="circle" src="{{asset('bootstrap/img/usuario.png')}}"></a>
            <br>

            <a href="#name"><span class="white-text name">{{ auth()->user()->persona->nombre }}</span></a>
<br>
               <a href="#email"><span class="white-text email">{{ auth()->user()->email }}</span></a>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
              MENU DEL RESTAURANTE
            </a>
          </li>


          <li>
            <a href="{{ route('reservas.index') }}" class="nav-link link-dark">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Gestionar reserva
            </a>
          </li>

          <li>
            <a href="{{ route('pedidos.index') }}" class="nav-link link-dark">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Gestionar pedidos
            </a>
          </li>

@role('administrador')
          <li>
            <i class="bi bi-card-list"></i>
            <a href="{{ route('usuarios.index') }}" class="nav-link link-dark">

              <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
              Gestionar Usuarios
            </a>
          </li>
          <li>
            <a href="{{ route('clientes.index') }}" class="nav-link link-dark">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
              Gestionar CLIENTES
            </a>
          </li>
          <li>
            <a href="{{ route('cajeros.index') }}" class="nav-link link-dark">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Gestionar CAJEROS
            </a>
          </li>
          <li>
            <a href="{{ route('administradores.index') }}" class="nav-link link-dark">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Gestionar Administradores
            </a>
          </li>


          <li>
            <a href="{{ route('menus.index') }}" class="nav-link link-dark">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Gestionar menu
            </a>
          </li>
          <li>
            <a href="{{ route('alimentos.index') }}" class="nav-link link-dark">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
              Gestionar alimentos
            </a>
          </li>

          <li>
            <i class="bi bi-card-list"></i>
            <a href="{{ route('roles.index') }}" class="nav-link link-dark">

              <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
              Gestionar roles
            </a>
          </li>
          <li>
            <i class="bi bi-card-list"></i>
            <a href="{{ route('bitacoras.index') }}" class="nav-link link-dark">

              <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
              Bitacora
            </a>
          </li>
          @endrole
@role('cajero')
<li>
    <i class="bi bi-card-list"></i>
    <a href="{{ route('usuarios.index') }}" class="nav-link link-dark">

      <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
      Gestionar Usuarios
    </a>
  </li>
  <li>
    <a href="{{ route('clientes.index') }}" class="nav-link link-dark">
      <svg class="bi me-2" width="16" height="16"><use xlink:href="#"/></svg>
      Gestionar CLIENTES
    </a>
  </li>
   <li>
    <a href="{{ route('alimentos.index') }}" class="nav-link link-dark">
      <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
      Gestionar alimentos
    </a>
  </li>

@endrole
        </div>
      </div>

  </div>
