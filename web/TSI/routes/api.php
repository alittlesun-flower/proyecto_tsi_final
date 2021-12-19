<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ReparacionController;

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
//SERVICIO
Route::get("servicio/get",[ServicioController::class, 'getServicios']);
Route::post("servicio/post",[ServicioController::class, 'crearServicio']);
Route::get("servicio/obtenerPorId",[ServicioController::class, 'obtenerPorId']);
Route::post("servicio/actualizar",[ServicioController::class, 'actualizarServicio']);
Route::post("servicio/eliminar",[ServicioController::class, 'eliminarServicio']);
//REPARACION
Route::get("reparacion/get",[ReparacionController::class, 'getReparaciones']);
Route::post("reparacion/post",[ReparacionController::class, 'crearReparacion']);
Route::get("reparacion/obtenerPorId",[ReparacionController::class, 'obtenerPorId']);
Route::post("reparacion/actualizar",[ReparacionController::class, 'actualizarReparacion']);
Route::post("reparacion/eliminar",[ReparacionController::class, 'eliminarReparacion']);


