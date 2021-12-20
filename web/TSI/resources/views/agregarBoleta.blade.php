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
                        <label for="correo-cbx" class="form-label">Correo</label>
                        <select name="correo-cbx" id="correo-cbx" class="form-control">
                            
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
                    <button id="domi-btn" class="btn btn-warning">Envitar boleta</button>
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('javascript')
    <script src="{{asset('js/agregarBoleta.js')}}"></script>
    <script src="{{asset('js/servicios/domiciliosService.js')}}"></script>
@endsection