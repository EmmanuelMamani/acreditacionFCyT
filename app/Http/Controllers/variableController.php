<?php

namespace App\Http\Controllers;

use App\Http\Requests\variableEditRequest;
use App\Http\Requests\variableRequest;
use App\Models\area;
use App\Models\variable;
use Illuminate\Http\Request;

class variableController extends Controller
{
    
    public function reporte_variables($id)
    {
        $area=area::find($id);
        return view('detalle_area',['area'=>$area]);
    }

    public function registro(variableRequest $request,$id)
    {
        $variable=new variable();
        $variable->numero_variable=$request->numero_variable;
        $variable->name=$request->descripcion;
        $variable->area_id=$id;
        $variable->save();

        return redirect(route('reporte_variables',['id'=>$id]));
    }
    public function editar_variable(variableEditRequest $request,$id){

        $variable=variable::find($id);
        $variable->numero_variable=$request->EditNumero_variable;
        $variable->name=$request->EditDescripcion;
        $variable->save();

        return redirect(route('reporte_variables',['id'=>$variable->area->id]));
    }

    public function eliminar_variable($id)
    {
        $variable=variable::find($id);
        $idArea=$variable->area->id;
        $this->eliminar($variable);
        $this->eliminar_indicadores($variable->indicadores);

        return redirect(route('reporte_variables',['id'=>$idArea]));
    }

    
    public function eliminar_indicadores($elementos)
    {
        foreach ($elementos as $elemento) {
            $this->eliminar($elemento);
        }
    }


    private function eliminar($elemento){
            $elemento->activo=0;
            $elemento->save();
    }

}
