<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administación de condominio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container-fluid vh-100 d-flex flex-column justify-content-lg-center">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="row bg-light shadow-lg" style="height: 25rem;">
                    <!--titulo y logo-->
                        <div class="col-lg-4 bg-info d-flex flex-column justify-content-center align-items-center text-center pt-3">
                            <div class="bg-white p-2 mb-3 rounded">
                                <img src="{{ asset('img/condominio.png') }}" width="100">
                            </div>
                            <h4 class="text-light">Sistema de administración</h4>
                            <h6 class="text-light">Ignacio Araya - 300</h6>
                        </div>
                    <!--/titulo y logo-->

                    <!--formulario-->
                        <div class="col-lg-8 bg-white d-flex flex-column justify-content-center py-3">
                            <h4>Registrarse</h4>
                            <small>Proporcione sus datos para el inicio de sesión</small>
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('usuarios.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            <input required type="text" id="nombre" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input required type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña:</label>
                                            <input required type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password2">Repetir Contraseña:</label>
                                            <input required type="password" id="password2" name="password2"
                                                class="form-control @error('password2') is-invalid @enderror"
                                                value="{{ old('password2') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Rol:</label>
                                            <select id="rol" name="rol" class="form-control">
                                                <option value="1">Administrador</option>
                                            </select>
                                        </div>                
                                        <div class="form-group">
                                            <div class="row pt-3">
                                                <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                                                    <button type="reset" class="btn btn-warning btn-block text-white">Cancelar</button>
                                                </div>
                                                <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                                                    <button type="submit" class="btn btn-success btn-block text-white">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{-- validacion --}}
                            @if($errors->any())
                            <div class="alert alert-warning mt-2">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>   
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            {{-- /validacion --}}
                        </div>
                    <!--/formulario-->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>



@section('hojas-estilo')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
@endsection

@section('contenido')
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Usuarios</button>
        </div>
    </div>

    <div class="row">
        <!--formulario-->
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-header">
                    Agregar Usuario
                </div>
                <div class="card-body">
                    <!--errores-->
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            <p>Por favor solucione los siguientes problemas:</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!--/errores-->

                    <form method="POST" action="{{ route('usuarios.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input required type="text" id="nombre" name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input required type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                        </div>
                        <div class="form-group">
                            <label for="password2">Repetir Contraseña:</label>
                            <input required type="password" id="password2" name="password2"
                                class="form-control @error('password2') is-invalid @enderror"
                                value="{{ old('password2') }}">
                        </div>



                        <div class="form-group">
                            <div class="row pt-3">
                                <div class="col-12 col-lg-3 offset-lg-6 pr-lg-0">
                                    <button type="reset" class="btn btn-warning btn-block text-white">Cancelar</button>
                                </div>
                                <div class="col-12 col-lg-3 mt-1 mt-lg-0">
                                    <button type="submit" class="btn btn-success btn-block text-white">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
