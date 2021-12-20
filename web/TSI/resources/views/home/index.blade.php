@extends("layouts.master")

@section('title', 'Home')

@section("contenido")
    <div class="row mt-5">
        <div class="col-12 col-md-6 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-address-book fa-2x"></i>
                    <span>Bienvenido <b></i> {{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <small>Último inicio de sesión: {{date('d-m-Y',strtotime(Auth::user()->ultimo_login))}} a las {{date('H:i:s',strtotime(Auth::user()->ultimo_login))}}</b></small>
                            <p>Te encuentras en el inicio de la aplicación, a continuación, avanza con lo siguiente:</p>
                            <img class="img-fluid" src="{{asset('img/portada.jpg')}}" alt="" srcset="">
                            <p>Para comenzar a utilizar la aplicación, debes añadir:
                                <ul>
                                    <li>1) Servicios</li>
                                    <li>2) Reparación (en caso de ser necesaria)</li>
                                    <li>3) Domicilios</li>
                                    <li>4) Y por último, enviar boleta</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <span>Sistema hecho por: Ignacio Araya</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("javascript")

@endsection
