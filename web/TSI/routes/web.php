<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\BoletaController;





//LOGIN

Route::get('/login',[HomeController::class,'login'])->name('home.login');
Route::get('/register',[HomeController::class,'register'])->name('home.register');

//USUARIOS
//Route::get('/usuarios/register',[HomeController::class,'register'])->name('home.register');
Route::post('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
Route::resource('/usuarios',UsuariosController::class);
//HOME
//Route::view('/', 'home')->name('home');
Route::get('/',[HomeController::class,'index'])->name('home.index');


//SERVICIOS
Route::view('/agregarServicio', 'agregarServicio')->middleware('auth')->name('agregarServicio');
Route::view('/verServicio', 'verServicio')->middleware('auth')->name('verServicio');
//REPARACION
Route::view('/agregarReparacion', 'agregarReparacion')->middleware('auth')->name('agregarReparacion');
Route::view('/verReparacion', 'verReparacion')->middleware('auth')->name('verReparacion');
//DOMICILIO
Route::view('/agregarDomicilio', 'agregarDomicilio')->middleware('auth')->name('agregarDomicilio');
Route::view('/verDomicilio', 'verDomicilio')->middleware('auth')->name('verDomicilio');
//BOLETA
Route::view('/agregarBoleta', 'agregarBoleta')->middleware('auth')->name('agregarBoleta');
Route::view('/verBoleta', 'verBoleta')->middleware('auth')->name('verBoleta');

//PDF
Route::get('/boletas/tabla-boletas',[BoletaController::class,'tablaBoletas'])->name('boletas.tabla-boletas');
Route::get('/boletas/descargar-tabla-boletas',[BoletaController::class,'descargarTablaBoletas'])->name('boletas.descargar-tabla-boletas');

