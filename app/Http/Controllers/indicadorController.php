<?php

namespace App\Http\Controllers;

use App\Http\Requests\indicadorEditRequest;
use App\Http\Requests\indicadorRequest;
use App\Models\criterio;
use App\Models\indicador;
use App\Models\indicador_criterio;
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
        $criterios=criterio::where('activo',1)->get();
        return view('detalle_variable',['variable'=>$variable,'criterios'=>$criterios]);
    }

  
    public function registro(indicadorRequest $request,$id)
    {
        $indicador=new indicador();
        $indicador->numero_indicador=$request->numero_indicador;
        $indicador->descripcion= $request->descripcion;
        $indicador->variable_id=$id;
        $indicador->tipo=$request->tipo_indicador;
        $indicador->peso=$request->tipo_indicador=='RMA'? 2 : 1;
        $indicador->save();

        $this->asignarCriterios($request->criterios,$indicador->id);
        

        
        return redirect(route('reporte_indicadores',['id'=>$id]));

    }

    private function asignarCriterios($criterios,$id){
        foreach ($criterios as $criterio) {
            $indicador_criterio=new indicador_criterio();
            $indicador_criterio->indicador_id=$id;
            $indicador_criterio->criterio_id=$criterio;
            $indicador_criterio->save();
        }
    }
    public function editar_indicador(indicadorEditRequest $request,$id)
    {
        $indicador=indicador::find($id);
        $indicador->numero_indicador=$request->numero_indicador;
        $indicador->descripcion= $request->descripcion;
        $indicador->tipo_evaluacion=$request->tipo_calificacion;
        $indicador->peso=$request->tipo_indicador=='RMA'? 2 : 1;

        

        $indicador->save();
    }

    public function eliminar_indicador($id)
    {
        //
    }
}
