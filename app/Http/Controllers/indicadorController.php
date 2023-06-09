<?php

namespace App\Http\Controllers;

use App\Http\Requests\indicadorEditRequest;
use App\Http\Requests\indicadorRequest;
use App\Models\criterio;
use App\Models\indicador;
use App\Models\indicador_criterio;
use App\Models\variable;
use Illuminate\Http\Request;
use App\Models\permiso_rol;
use App\Models\permiso;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class indicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporte_indicadores($id)
    {
        if(!$this->restriccion('reporte_indicadores')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $variable=variable::find($id);
        $criterios=criterio::where('activo',1)->get();
        return view('detalle_variable',['variable'=>$variable,'criterios'=>$criterios]);
    }

  
    public function registro(indicadorRequest $request,$id)
    {
        if(!$this->restriccion('registro_indicador')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $indicador=new indicador();
        $indicador->numero_indicador=$request->numero_indicador;
        $indicador->descripcion= $request->descripcion;
        $indicador->variable_id=$id;
        $indicador->tipo=$request->tipo_indicador;
        $indicador->peso=$request->tipo_indicador=='RMA'? 2 : 1;
        $indicador->save();

        $this->asignarCriterios($request->criterios,$indicador->id);
        

        
        return redirect(route('reporte_indicadores',['id'=>$id]))->with('registrar','ok');

    }

    private function asignarCriterios($criterios,$id){
        foreach ($criterios as $criterio) {
            $indicador_criterio=indicador_criterio::where('criterio_id',$criterio)->where('indicador_id',$id)->get();
            if(isEmpty($indicador_criterio)){
                $indicador_criterio=new indicador_criterio();
                $indicador_criterio->indicador_id=$id;
                $indicador_criterio->criterio_id=$criterio;
                $indicador_criterio->save();
            }else{
                $indicador_criterio[0]->activo=0;
                $indicador_criterio[0]->save();
            }
            
        }
    }

    private function eliminarCriterios($criterios,$id){
        foreach ($criterios as $criterio) {
            $indicador_criterio=indicador_criterio::where('criterio_id',$criterio)->where('indicador_id',$id)->get();
            $indicador_criterio[0]->activo=0;
            $indicador_criterio[0]->save();
        }
    }

    public function editar_indicador(indicadorEditRequest $request,$id)
    {
        if(!$this->restriccion('editar_indicador')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $indicador=indicador::find($id);
        $indicador->numero_indicador=$request->EditNumero_indicador;
        $indicador->descripcion= $request->EditDescripcion;
        $indicador->tipo=$request->EditTipo_indicador;
        $indicador->peso=$request->EditTipo_indicador=='RMA'? 2 : 1;
        $indicador->save();

        $criteriosActuales=$indicador->criterios;
        $criteriosActuales=$criteriosActuales->keyBy("id")->keys();
   
       
        $this->asignarCriterios(collect($request->EditCriterios)->diff($criteriosActuales),$id);
        $this->eliminarCriterios($criteriosActuales->diff($request->EditCriterios),$id);

        return redirect(route('reporte_indicadores',['id'=>$indicador->variable->id]))->with('editar', 'ok');
    }

    public function eliminar_indicador($id)
    {
        if(!$this->restriccion('eliminar_indicador')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $indicador=indicador::find($id);
        $indicador->activo=0;
        $indicador->save();
       
        $this->eliminarCascada($indicador->criterios);
        return redirect(route('reporte_indicadores',['id'=>$indicador->variable->id]))->with('eliminar', 'ok');
    }

    private function eliminarCascada($criterios){
        foreach ($criterios as $criterio) {
            $indicador_criterio=indicador_criterio::find($criterio->pivot->id);
            $indicador_criterio->activo=0;      
            $indicador_criterio->save();     
        }
    }
    public function restriccion($ruta){
        $permitido=true;
        if(Auth::user()!=null){
        $rol_id=Auth::user()->rol_user->last()->rol_id;
        $permiso_id= permiso::all()->where('url',$ruta)->last()->id;
        $restriccion= permiso_rol::all()->where('permiso_id',$permiso_id)->where('rol_id',$rol_id);
        if($restriccion == '[]'){
            $permitido=false; 
        }
    }else{
        $permitido=false;
    }
        return $permitido;
      
    }
   
}
