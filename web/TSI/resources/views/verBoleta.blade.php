@extends('layouts.master')
@section('contenido')
    <div class="row mt-5">
        <div class="col-12 col-md-6 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <span>Filtrar</span>
                </div>
                <div class="card-body">
                    <select class="form-select" id="filtro-cbx">
                        <option value="todos">Todos</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 mx-auto">
            <table class="table table-hover table-bordered table-striped table-responsive">
                <thead class="bg-info">
                    <tr>
                        <td>Monto Total</td>
                        <td>Monto Domicilio</td>
                        <td>Monto Regadio</td>
                        <td>Monto Iluminacion</td>
                        <td>Correo </td>
                        <td>Mes</td>
                        <td>Año</td>
                        <td>Domicilio</td>
                        <td>Accion 1</td>
                        <td>Accion 2</td>
                    </tr>
                </thead>
                <tbody id="tbody-boleta">
                </tbody>
            </table>
           
        </div>
    </div>  
@endsection
@section('javascript')
    <script src="{{ asset('js/servicios/boletasService.js') }}"></script>
    <script src="{{ asset('js/verBoleta.js') }}"></script>
@endsection