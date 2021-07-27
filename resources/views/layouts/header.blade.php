@auth
<header class="p-3 mb-3 border-bottom">

    @include('layouts.menu-sidenav')


    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-10 col-lg-auto me-lg-auto mb-1 justify-content-center mb-md-0">
          <li><a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            menu
          </a></li>
          <li>

            </li>


          <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>
        </ul>



        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ auth()->user()->imagen}}" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Salir</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  @endauth
