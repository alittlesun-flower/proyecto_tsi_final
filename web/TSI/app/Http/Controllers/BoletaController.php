<?php

namespace App\Http\Controllers;
use App\Models\Boleta;
use App\Models\Domicilio;
use PDF;

use Illuminate\Http\Request;

class BoletaController extends Controller
{
    //
    public function getDomicilios(){
        $domicilio = Domicilio::all();
        return $domicilio;
    }
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
                'monto_domicilio' => $boleta->monto_domicilio,
                'monto_iluminacion' => $boleta->monto_iluminacion,
                'monto_regadio' => $boleta->monto_regadio,
                'correo' => $boleta->correo,
                'mes' => $boleta->mes,
                'anno' => $boleta->anno,
                'domicilio_id' => $boleta->domicilio_id,
            ]);
        }

        return $tablaBoletas->values()->all();
    }
    /*private function getColumna(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $boleta = Boleta::findOrFail($id);
        $tablaColumnas = collect();
        
        $tablaColumnas->add([
            'id' => $boleta->id,
            'monto' => $boleta->monto,
            'monto_domicilio' => $boleta->monto_domicilio,
            'monto_iluminacion' => $boleta->monto_iluminacion,
            'monto_regadio' => $boleta->monto_regadio,
            'correo' => $boleta->correo,
            'mes' => $boleta->mes,
            'anno' => $boleta->anno,
            'numero' => $boleta->numero,
        ]);
        

        return $tablaColumnas->values()->all();
    }*/
    public function eliminarBoleta(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $boleta = Boleta::findOrFail($id);
        $boleta->delete();
        return "ok";
    }
    public function obtenerPorIdBoletaExportar(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $boletas = Boleta::where("id","=",$id)->get();
        $pdf = PDF::loadView('boletas.tabla-boletas',compact('boletas'));
        $pdf->setPaper('letter','portrait');
        return $pdf->download('boleta.pdf');
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
        $boleta->monto_domicilio=$input["monto_domicilio"];
        $boleta->monto_iluminacion=$input["monto_iluminacion"];
        $boleta->monto_regadio=$input["monto_regadio"];
        $boleta->correo=$input["correo"];
        $boleta->mes=$input["mes"];
        $boleta->anno=$input["anno"];
        $boleta->numero=$input["numero"];


        $boleta->save();
        return $boleta;
    }
    public function obtenerBoleta(Request $request){
        $input = $request->all();
        $id = $input["numero"];
        $boleta = Boleta::where("numero","=",$id)->get(); 
        return $boleta;
    }
    //filtro
    public function filtrarDomicilios(Request $request){
        $input = $request->all();
        $filtro = $input["filtro"];
        $boleta = Boleta::where("numero","=", $filtro)->get();
        return $boleta;
    }    
}
