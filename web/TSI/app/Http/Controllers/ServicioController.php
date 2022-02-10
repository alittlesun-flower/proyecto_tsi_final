<?php

namespace App\Http\Controllers;
use App\Models\Servicio;

use Illuminate\Http\Request;

class ServicioController extends Controller
{
    //
    public function getServicios(){
        $servicio = Servicio::all();
        return $servicio;
    }
    public function crearServicio(Request $request){
        $input = $request->all();
        $servicio = new Servicio();
        $servicio->estado=$input["estado"];
        $servicio->mes=$input["mes"];
        $servicio->anno=$input["anno"];
        $servicio->tipo=$input["tipo"];
        $servicio->consumo=$input["consumo"];
        $servicio->monto=$input["monto"];
        $servicio->save();
        return $servicio;
    }
    public function eliminarServicio(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return "ok";
    }
    public function obtenerPorId(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $servicio = Servicio::findOrFail($id); 
        return $servicio;
    }
    public function actualizarServicio(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $servicio = Servicio::findOrFail($id);
        $servicio->mes=$input["mes"];
        $servicio->anno=$input["anno"];
        $servicio->tipo=$input["tipo"];
        $servicio->consumo=$input["consumo"];
        $servicio->monto=$input["monto"];
        $servicio->estado=$input["estado"];
        $servicio->save();
        return $servicio;
    }    
    public function obtenerPorMes(Request $request){
        $input = $request->all();
        $mes = $input["mes"];
        $servicios = Servicio::where('mes','=',$mes)->get();
        return $servicios;
    }
}
