<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home')->name('home');
//SERVICIOS
Route::view('/agregarServicio', 'agregarServicio')->name('agregarServicio');
Route::view('/verServicio', 'verServicio')->name('verServicio');
//REPARACION
Route::view('/agregarReparacion', 'agregarReparacion')->name('agregarReparacion');
Route::view('/verReparacion', 'verReparacion')->name('verReparacion');
//DOMICILIO
Route::view('/agregarDomicilio', 'agregarDomicilio')->name('agregarDomicilio');
Route::view('/verDomicilio', 'verDomicilio')->name('verDomicilio');

