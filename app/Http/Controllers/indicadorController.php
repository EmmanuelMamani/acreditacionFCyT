<?php

namespace App\Http\Controllers;

use App\Models\indicador;
use App\Models\variable;
use Illuminate\Http\Request;

class indicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporte_indicadores($id)
    {
        $variable=variable::find($id);
        return view('detalle_variable',['variable'=>$variable]);
    }

  
    public function registro(Request $request)
    {
        //
    }

    public function editar_indicador($id)
    {
        //
    }

    public function eliminar_indicador($id)
    {
        //
    }
}
