<?php

namespace App\Http\Controllers;
use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionController extends Controller
{
    //
    public function getReparaciones(){
        $reparacion = Reparacion::all();
        return $reparacion;
    }
    public function crearReparacion(Request $request){
        $input = $request->all();
        $reparacion = new Reparacion();
        $reparacion->mes=$input["mes"];
        $reparacion->anno=$input["anno"];
        $reparacion->tipo=$input["tipo"];
        $reparacion->nombre=$input["nombre"];
        $reparacion->descripcion=$input["descripcion"];
        $reparacion->monto=$input["monto"];
        $reparacion->save();
        return $reparacion;
    }
    public function eliminarReparacion(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $reparacion = Reparacion::findOrFail($id);
        $reparacion->delete();
        return "ok";
    }
    public function obtenerPorId(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $reparacion = Reparacion::findOrFail($id); 
        return $reparacion;
    }
    public function actualizarReparacion(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $reparacion = Reparacion::findOrFail($id);
        $reparacion->mes=$input["mes"];
        $reparacion->anno=$input["anno"];
        $reparacion->tipo=$input["tipo"];
        $reparacion->nombre=$input["nombre"];
        $reparacion->descripcion=$input["descripcion"];
        $reparacion->monto=$input["monto"];
        $reparacion->save();
        return $reparacion;
    }    
    
}
