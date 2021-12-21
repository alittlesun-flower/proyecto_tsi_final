@extends('layouts.master')
@section('contenido')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header bg-warning text-black">
                    <span>Añadir boleta</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="numero-cbx" class="form-label">Número del domicilio</label>
                        <select name="numero-cbx" id="numero-cbx" class="form-control">

                        </select>
                    </div>
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
                        <select name="anno-cbx" id="anno-cbx" class="form-control">
                            <option value="2021">2021</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="montorep-num" class="form-label">Monto</label>
                        <input type="number" id="montorep-num" class="form-control">
                    </div> 
                    
                <div class="card-footer d-grid gap-1 ">
                    <button id="boleta-btn" class="btn btn-warning">Enviar boleta</button>
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('javascript')
    <script src="{{asset('js/agregarBoleta.js')}}"></script>
    <script src="{{asset('js/servicios/boletasService.js')}}"></script>
@endsection