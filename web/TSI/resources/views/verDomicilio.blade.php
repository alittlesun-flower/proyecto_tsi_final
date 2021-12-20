@extends('layouts.master')
@section('contenido')
    <div class="row mt-5">
        <div class="col-12 col-md-12 col-lg-6 mx-auto">
            <table class="table table-hover table-bordered table-striped table-responsive">
                <thead class="bg-info">
                    <tr>
                        <td>Número del domicilio</td>
                        <td>Correo</td>
                        <td>Accion 1</td>
                        <td>Accion 2</td>
                    </tr>
                </thead>
                <tbody id="tbody-domicilio">
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-none">
        <div class="row mt-5 molde-modificar">
            <div class="mb-3">
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
@endsection
@section('javascript')
    <script src="{{ asset('js/servicios/domiciliosService.js') }}"></script>
    <script src="{{ asset('js/verDomicilio.js') }}"></script>
@endsection