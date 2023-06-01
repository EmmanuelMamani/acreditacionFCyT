<?php

namespace App\Http\Controllers;

use App\Http\Requests\variableEditRequest;
use App\Http\Requests\variableRequest;
use App\Models\area;
use App\Models\variable;
use Illuminate\Http\Request;
use App\Models\permiso_rol;
use App\Models\permiso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class variableController extends Controller
{
    
    public function reporte_variables($id)
    {
        if(!$this->restriccion('reporte_variables')){
            return redirect('/sin_permiso');
        }
        $area=area::find($id);
        return view('detalle_area',['area'=>$area]);
    }

    public function registro(variableRequest $request,$id):RedirectResponse
    {
        if(!$this->restriccion('registro_variable')){
            return redirect('/sin_permiso');
        }
        $variable=new variable();
        $variable->numero_variable=$request->numero_variable;
        $variable->name=$request->descripcion;
        $variable->area_id=$id;
        $variable->save();
        
        return redirect(route('reporte_variables',['id'=>$id]))->with('registrar','ok');
    }
    public function editar_variable(variableEditRequest $request,$id){
        if(!$this->restriccion('editar_variable')){
            return redirect('/sin_permiso');
        }
        $variable=variable::find($id);
        $variable->numero_variable=$request->EditNumero_variable;
        $variable->name=$request->EditDescripcion;
        $variable->save();

        return redirect(route('reporte_variables',['id'=>$variable->area->id]))->with('editar', 'ok');
    }

    public function eliminar_variable($id)
    {
        if(!$this->restriccion('eliminar_variable')){
            return redirect('/sin_permiso');
        }
        $variable=variable::find($id);
        $idArea=$variable->area->id;
        $this->eliminar($variable);
        $this->eliminar_indicadores($variable->indicadores);

        return redirect(route('reporte_variables',['id'=>$idArea]))->with('eliminar', 'ok');
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
    public function restriccion($ruta){
        $permitido=true;
        $rol_id=Auth::user()->rol_user->last()->rol_id;
        $permiso_id= permiso::all()->where('url',$ruta)->last()->id;
        $restriccion= permiso_rol::all()->where('permiso_id',$permiso_id)->where('rol_id',$rol_id);
        if($restriccion == '[]'){
            $permitido=false; 
        }
        return $permitido;
    }
}
