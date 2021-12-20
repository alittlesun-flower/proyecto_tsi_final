@extends('layouts.master')
@section('contenido')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-header bg-warning text-black">
                    <span>Añadir domicilio</span>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="numero-num" class="form-label">Número del domicilio</label>
                        <input type="number" id="numero-num" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="correo-txt" class="form-label">Correo</label>
                        <input type="email" id="correo-txt" class="form-control">
                    </div>
                <div class="card-footer d-grid gap-1 ">
                    <button id="domi-btn" class="btn btn-warning">Registrar domicilio</button>
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('javascript')
    <script src="{{asset('js/agregarDomicilio.js')}}"></script>
    <script src="{{asset('js/servicios/domiciliosService.js')}}"></script>
@endsection