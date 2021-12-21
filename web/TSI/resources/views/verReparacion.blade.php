@extends('layouts.master')
@section('contenido')
    <div class="row mt-5">
        <div class="col-12 col-md-12 col-lg-6 mx-auto">
            <table class="table table-hover table-bordered table-striped table-responsive">
                <thead class="bg-info">
                    <tr>
                        <td>Mes</td>
                        <td>Año</td>
                        <td>Tipo de servicio</td>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>Monto total</td>
                        <td>Accion 1</td>
                        <td>Accion 2</td>
                    </tr>
                </thead>
                <tbody id="tbody-reparacion">

                </tbody>
            </table>
        </div>
    </div>
    <div class="d-none">
        <div class="row mt-5 molde-modificar">
            <div class="mb-3">
                <label for="mes-cbx" class="form-label">Mes</label>
                <select class="form-select" id="mes-cbx">
                    <option value="Enero">Enero</option>
                    <option value="Febrero">Febrero</option>
                    <option value="Marzo">Marzo</option>
                    <option value="Abril">Abril</option>
                    <option value="Mayo">Mayo</option>
                    <option value="Junio">Junio</option>
                    <option value="Julio">Julio</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Septiembre">Septiembre</option>
                    <option value="Octubre">Octubre</option>
                    <option value="Noviembre">Noviembre</option>
                    <option value="Diciembre">Diciembre</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="anno-cbx" class="form-label">Año</label>
                <select name="anno-cbx" id="anno-cbx" class="form-select">
                    <option value="2021">2021</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo-cbx" class="form-label">Tipo de reparacion</label>
                <select class="form-select" id="tipo-cbx">
                    <option value="Correctivo">Correctivo</option>
                    <option value="Preventivo">Preventivo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nombrerep-txt" class="form-label">Nombre de la reparación</label>
                <input type="text" id="nombrerep-txt" class="form-control">
            </div>
            <div class="mb-3">
                <label for="descripcion-txt" class="form-label">Descripción de la reparación</label>
                <textarea id ="descripcion-txt" class="form-control">
                </textarea>
            </div> 
            <div class="mb-3">
                <label for="montorep-num" class="form-label">Monto</label>
                <input type="number" id="montorep-num" class="form-control">
            </div>
            <div class="card-footer d-grid gap-1 ">
                <button id="reparacion-btn" class="btn btn-warning">Registrar reparación</button>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/servicios/reparacionesService.js') }}"></script>
    <script src="{{ asset('js/verReparacion.js') }}"></script>
@endsection