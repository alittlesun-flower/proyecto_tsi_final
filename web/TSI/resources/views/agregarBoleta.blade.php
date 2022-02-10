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
                        </select> 
                    </div>
                    <div class="mb-3">
                        <label for="anno-cbx" class="form-label">Año</label>
                        <select name="anno-cbx" id="anno-cbx" class="form-control" disabled="true">
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="montototal-num" class="form-label">Monto Total</label>
                        <input type="number" id="montototal-num" class="form-control" disabled="true">
                    </div> 

                    <div class="mb-3">
                        <label for="montoboleta-num" class="form-label">Monto a Pagar</label>
                        <input type="number" id="montoboleta-num" class="form-control" disabled="true">
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