<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Administración de condominio</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            @csrf
            <div class="container-fluid">
              <a class="navbar-brand" href="{{route('home.index')}}">
                <img class="logo" src="{{asset('img/logo.png')}}">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav w-100 d-flex align-items-center">
                  <i class="fas fa-home fa-1x"></i>
                    <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">Bienvenid@</a>

                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown ms-5">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-cubes fa-1x"></i>
                        Servicios
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('agregarServicio')}}">Agregar Servicio</a></li>
                        <li><a class="dropdown-item" href="{{route('verServicio')}}">Ver Servicios</a></li>
                      </ul>
                    </li>
                    <!-- <li class="nav-item dropdown ms-5">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-id-card-alt fa-1x"></i>
                        Reparación
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('agregarReparacion')}}">Agregar reparación</a></li>
                        <li><a class="dropdown-item" href="{{route('verReparacion')}}">Ver reparaciones</a></li>
                      </ul>
                    </li> -->
                    <li class="nav-item dropdown ms-5">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-pencil-alt fa-1x"></i>
                        Domicilio
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('agregarDomicilio')}}">Agregar domicilio</a></li>
                        <li><a class="dropdown-item" href="{{route('verDomicilio')}}">Ver domicilio</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown ms-5">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-pencil-alt fa-1x"></i>
                        Boleta
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('agregarBoleta')}}">Agregar boleta</a></li>
                        <li><a class="dropdown-item" href="{{route('verBoleta')}}">Ver boletas</a></li>
                      </ul>
                    </li>
                 </ul>
                 <div class="nav-item dropdown ddlBienvenida d-flex justify-content-end align-items-center ">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <p>Bienvenido <b><i class="fas fa-user fa-1x"></i>&nbsp {{Auth::user()->nombre}}</b></p> 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="nav-link dropdown-item" href="{{route('usuarios.logout')}}">Cerrar sesión</a></li>
                    </ul>
                 </div>
                </div>
              </div>
            </div>
          </nav>
    </header>
        <main class="container-fluid">
            @yield("contenido")
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        @yield('javascript')
    </body>
</html>