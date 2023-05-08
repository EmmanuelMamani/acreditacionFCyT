<?php

namespace App\Http\Controllers;

use App\Http\Requests\areaRequest;
use App\Http\Requests\areaEditRequest;
use App\Models\area;
use Illuminate\Http\Request;

class areaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporte_areas()
    {
        $areas=area::where('activo',1)->get();
        return view('reporte_areas',['areas'=>$areas]);
    }

   
    public function registro(areaRequest $request)
    {
        $area= new area();
        $area->name=$request->descripcion;
        $area->valor=$request->ponderacion;
        $area->save();

        return redirect('reporte_areas');        
    }

    public function editar_area($id,areaEditRequest $request)
    {
        $area=area::find($id);
        $area->name=$request->EditDescripcion;
        $area->valor=$request->EditPonderacion;
        $area->save();

        return redirect('reporte_areas');  
    }

    
    public function eliminar_area($id)
    {
        $area= area::find($id);
        $this->eliminar($area);
        $this->eliminacionCascada($area->variables);
        
        return redirect('/reporte_areas');
    }

    private function eliminacionCascada($elementos){
        foreach ($elementos as $elemento) {
            $this->eliminar($elemento);
            $elementos2=$elemento->indicadores;
            foreach ($elementos2 as $elemento2) {
                $this->eliminar($elemento2);
            }
        }
    }

    private function eliminar($elemento){
            $elemento->activo=0;
            $elemento->save();
    }
}
