@extends('layouts.master')
@section('contenido')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header bg-warning text-black">
                    <span>Añadir servicio</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="mes-cbx" class="form-label">Mes</label>
                        <select class="form-select" id="mes-cbx">
                            <option value="septiembre">Enero</option>
                            <option value="septiembre">Febrero</option>
                            <option value="septiembre">Marzo</option>
                            <option value="septiembre">Abril</option>
                            <option value="septiembre">Mayo</option>
                            <option value="septiembre">Junio</option>
                            <option value="septiembre">Julio</option>
                            <option value="septiembre">Agosto</option>
                            <option value="septiembre">Septiembre</option>
                            <option value="septiembre">Octubre</option>
                            <option value="septiembre">Noviembre</option>
                            <option value="septiembre">Diciembre</option>
                        </select> 
                    </div>
                    <div class="mb-3">
                        <label for="anno-txt" class="form-label">Año</label>
                        <input type="text" id="anno-txt" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="servicios-cbx" class="form-label">Servicio</label>
                        <select class="form-select" id="servicios-cbx">
                            <option value="jardines">Regadio de jardines</option>
                            <option value="iluminacion">Iluminación</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="consumo-num" class="form-label">Cantidad de consumo</label>
                        <input type="number" id="consumo-num" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="monto-num" class="form-label">Monto</label>
                        <input type="number" id="monto-num" class="form-control">
                    </div>  
                </div>
                <div class="card-footer d-grid gap-1 ">
                    <button id="servi-btn" class="btn btn-warning">Registrar servicio</button>
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('javascript')
    <script src="{{asset('js/agregarServicio.js')}}"></script>
    <script src="{{asset('js/servicios/serviciosService.js')}}"></script>
@endsection