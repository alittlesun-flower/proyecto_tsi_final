@extends('layouts.master')
@section('contenido')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header bg-warning text-black">
                    <span>Añadir reparación</span>
                </div>
                <div class="card-body">
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
                        <label for="anno-txt" class="form-label">Año</label>
                        <input type="text" id="anno-txt" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="tipo-cbx" class="form-label">Tipo de reparación</label>
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
                </div>
                <div class="card-footer d-grid gap-1 ">
                    <button id="repa-btn" class="btn btn-warning">Registrar reparación</button>
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('javascript')
    <script src="{{asset('js/agregarReparacion.js')}}"></script>
    <script src="{{asset('js/servicios/reparacionesService.js')}}"></script>
@endsection