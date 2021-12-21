@extends('layouts.master')
@section('contenido')
    <div class="row mt-5">
        <div class="col-12 col-md-12 col-lg-6 mx-auto">
            <table class="table table-hover table-bordered table-striped table-responsive">
                <thead class="bg-info">
                    <tr>
                        <td>Monto</td>
                        <td>Mes</td>
                        <td>Año</td>
                        <td>Domicilio</td>
                        <td>Accion 1</td>
                    </tr>
                </thead>
                <tbody id="tbody-boleta">
                </tbody>
            </table>
            <div class="pt-5" aria-labelledby="navbarDropdown">
                <button><a class="dropdown-item" href="{{route('boletas.descargar-tabla-boletas')}}">Exportar PDF</a></button>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/servicios/boletasService.js') }}"></script>
    <script src="{{ asset('js/verBoleta.js') }}"></script>
@endsection