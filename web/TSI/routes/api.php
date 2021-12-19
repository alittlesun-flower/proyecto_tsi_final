<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
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

Route::get("servicio/get",[ServicioController::class, 'getServicios']);
Route::post("servicio/post",[ServicioController::class, 'crearServicio']);
Route::get("servicio/obtenerPorId",[ServicioController::class, 'obtenerPorId']);
Route::post("servicio/actualizar",[ServicioController::class, 'actualizarServicio']);
Route::post("servicio/eliminar",[ServicioController::class, 'eliminarServicio']);


