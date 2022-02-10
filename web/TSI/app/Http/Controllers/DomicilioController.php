<?php

namespace App\Http\Controllers;
use App\Models\Domicilio;
use Illuminate\Http\Request;

class DomicilioController extends Controller
{
    //
    public function getDomicilios(){
        $domicilio = Domicilio::all();
        return $domicilio;
    }
    public function crearDomicilio(Request $request){
        $input = $request->all();
        $domicilio = new Domicilio();
        $domicilio->numero=$input["numero"];
        $domicilio->correo=$input["correo"];
        // $domicilio->metros=$input["metros"];

        $domicilio->save();
        return $domicilio;
    }
    public function eliminarDomicilio(Request $request){
        $input = $request->all();
        $id = $input["numero"];
        $domicilio = Domicilio::findOrFail($id);
        $domicilio->delete();
        return "ok";
    }
    public function obtenerPorId(Request $request){
        $input = $request->all();
        $id = $input["numero"];
        $domicilio = Domicilio::findOrFail($id); 
        return $domicilio;
    }
    public function actualizarDomicilio(Request $request){
        $input = $request->all();
        $id = $input["numero"];
        $domicilio = Domicilio::findOrFail($id);
        $domicilio->numero=$input["numero"];
        $domicilio->correo=$input["correo"];
        // $domicilio->metros=$input["metros"];

        $domicilio->save();
        return $domicilio;
    }    

    public function findById(Request $request){
        $input = $request->all();
        $id = $input["numero"];
        $domicilio = Domicilio::where("numero","=",$id)->get();
        return $domicilio;
    }
    public function getWithInfo(Request $request){
        $input = $request->all();
        $id = $input["numero"];
        $domicilio = Domicilio::where("numero","=",$id)->get();
        $domicilio->load('gastos');
        return $domicilio;
    }
    public function filtrarDomicilios(Request $request){
        $input = $request->all();
        $filtro = $input["filtro"];
        $domicilio = Domicilio::where("numero", $filtro)->get();
        return $domicilio;
    }    
}

