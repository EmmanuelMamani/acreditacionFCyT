<?php

namespace App\Http\Controllers;

use App\Http\Requests\indicadorEditRequest;
use App\Http\Requests\indicadorRequest;
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

  
    public function registro(indicadorRequest $request,$id)
    {
        $indicador=new indicador();
        $indicador->numero_indicador=$request->numero_indicador;
        $indicador->descripcion= $request->descripcion;
        $indicador->variable_id=$id;
        $indicador->tipo=$request->tipo_indicador;
        $indicador->tipo_evaluacion=$request->tipo_calificacion;
        $indicador->peso=$request->tipo_indicador=='RMA'? 2 : 1;
        $indicador->save();
        $indicador->crearEvaluadores();
        
        return redirect(route('reporte_indicadores',['id'=>$id]));

    }

    public function editar_indicador(indicadorEditRequest $request,$id)
    {
        
    }

    public function eliminar_indicador($id)
    {
        //
    }
}
