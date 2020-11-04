<?php

namespace App\Http\Controllers;

use App\Services\ConexionService;
use App\Services\GameService;
use Illuminate\Http\Request;
use mysql_xdevapi\Result;

class ConexionController extends Controller
{
    public function conexionTabla() {
        $caminos = ConexionService::conexiontablaService();
        $mensaje="Seleccione Ciudad Origen y Destino";
        return view('conexion')->with(compact('caminos'))->with("mensaje", $mensaje);
    }

    public function buscarCaminos(Request $request) {

        $origen=$request->input('origen');
        $destino=$request->input('destino');
        $caminos=ConexionService::devolverTablaConexion();
        if(!isset($destino))
        {
            $mensajes=ConexionService::caminoEntreOrigenYTodosService($origen);
            //dd($mensajes);
            return view('conexion')->with(compact('caminos'))->with("mensajes", $mensajes);
        }
        else
        {
            $result=ConexionService::buscarCaminoService($origen,$destino);
            $mensaje=$result["mensaje"];
            return view('conexion')->with(compact('caminos'))->with("mensaje", $mensaje);
        }

    }

}
