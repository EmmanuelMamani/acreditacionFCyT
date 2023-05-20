<?php

namespace App\Http\Controllers;

use App\Models\archivo;
use App\Models\indicador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class archivoController extends Controller
{
    public function reporte_archivos($id){
        $indicador=indicador::find($id);
        return view('detalle_indicador',['indicador'=>$indicador]);
    }
    
    public function registroFolder(){

    }
    
    public function registroArchivos(){

    }

    public function editarFolder(){

    }

    public function eliminarFolder(){

    }

    public function eliminarArchivo(){

    }
}
