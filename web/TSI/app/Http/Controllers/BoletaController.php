<?php

namespace App\Http\Controllers;
use App\Models\Boleta;
use App\Models\Domicilio;
use PDF;

use Illuminate\Http\Request;

class BoletaController extends Controller
{
    //
    public function getBoletas(){
        $boleta = Boleta::all();
        return $boleta;
    }
    public function buscarMetros(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $domicilio = Domicilio::findOrFail($id); 
        return $domicilio["metros"];
    }
    private function getTabla(){
        $tablaBoletas = collect();
        foreach(Boleta::all() as $boleta){
            $tablaBoletas->add([
                'id' => $boleta->id,
                'monto' => $boleta->monto,
                'mes' => $boleta->mes,
                'anno' => $boleta->anno,
                'domicilio_id' => $boleta->domicilio_id,
            ]);
        }

        return $tablaBoletas->values()->all();
    }
    public function eliminarBoleta(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $boleta = Boleta::findOrFail($id);
        $boleta->delete();
        return "ok";
    }
    public function obtenerPorId(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $boleta = Boleta::findOrFail($id); 
        return $boleta;
    }
    public function tablaBoletas(){
        $tablaBoletas = $this->getTabla();
        return view('boletas.tabla-boletas',compact('tablaBoletas'));
    }
    public function descargarTablaBoletas(){
        $tablaBoletas = Boleta::all();
        $pdf = PDF::loadView('boletas.tabla-boletas',compact('tablaBoletas'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('tabla-boletas.pdf');
    }
    public function crearBoleta(Request $request){
        $input = $request->all();
        $boleta = new Boleta();
        $boleta->monto=$input["monto"];
        $boleta->mes=$input["mes"];
        $boleta->anno=$input["anno"];
        $boleta->domicilio_id=$input["domicilio_id"];


        $boleta->save();
        return $boleta;
    }
        
}
