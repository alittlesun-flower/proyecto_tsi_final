<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\BoletaController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//LOGIN
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//SERVICIO
Route::get("servicio/get",[ServicioController::class, 'getServicios']);
Route::post("servicio/post",[ServicioController::class, 'crearServicio']);
Route::get("servicio/obtenerPorId",[ServicioController::class, 'obtenerPorId']);
Route::post("servicio/actualizar",[ServicioController::class, 'actualizarServicio']);
Route::post("servicio/eliminar",[ServicioController::class, 'eliminarServicio']);
Route::get("servicio/obtenerPorMes",[ServicioController::class, 'obtenerPorMes']);
//REPARACION
Route::get("reparacion/get",[ReparacionController::class, 'getReparaciones']);
Route::post("reparacion/post",[ReparacionController::class, 'crearReparacion']);
Route::get("reparacion/obtenerPorId",[ReparacionController::class, 'obtenerPorId']);
Route::post("reparacion/actualizar",[ReparacionController::class, 'actualizarReparacion']);
Route::post("reparacion/eliminar",[ReparacionController::class, 'eliminarReparacion']);
//DOMICILIO
Route::get("domicilio/get",[DomicilioController::class, 'getDomicilios']);

//Route::get("domicilio/getNumeros",[DomicilioController::class, 'getNumeros']);
Route::post("domicilio/post",[DomicilioController::class, 'crearDomicilio']);
Route::get("domicilio/obtenerPorId",[DomicilioController::class, 'obtenerPorId']);
Route::post("domicilio/actualizar",[DomicilioController::class, 'actualizarDomicilio']);
Route::post("domicilio/eliminar",[DomicilioController::class, 'eliminarDomicilio']);
Route::get("domicilio/findById",[DomicilioController::class, 'findById']);
Route::get("domicilio/getWithInfo",[DomicilioController::class, 'getWithInfo']);
Route::get("domicilio/filtrar",[DomicilioController::class, 'filtrarDomicilios']);

//BOLETA
Route::get("boleta/get",[BoletaController::class, 'getBoletas']);
Route::post("boleta/post",[BoletaController::class, 'crearBoleta']);
Route::get("boleta/obtenerPorId",[BoletaController::class, 'obtenerPorId']);
Route::get("boleta/obtenerPorIdBoletaExportar",[BoletaController::class, 'obtenerPorIdBoletaExportar']);

Route::post("boleta/eliminar",[BoletaController::class, 'eliminarBoleta']);
Route::get("boleta/obtenerBoleta",[BoletaController::class,'obtenerBoleta']);
//Route::get("boleta/getDomicilios",[BoletaController::class, 'getDomicilios']);
Route::get("boleta/filtrar",[BoletaController::class, 'filtrarDomicilios']);




