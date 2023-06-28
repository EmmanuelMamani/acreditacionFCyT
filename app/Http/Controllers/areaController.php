<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Http\Requests\areaRequest;
use App\Http\Requests\areaEditRequest;
use App\Models\area;
use Illuminate\Http\Request;
use App\Models\permiso_rol;
use App\Models\permiso;
use Illuminate\Support\Facades\Auth;

class areaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporte_areas()
    {
        if(!$this->restriccion('reporte_areas')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $areas=area::where('activo',1)->get();
        return view('reporte_areas',['areas'=>$areas]);
    }

   
    public function registro(areaRequest $request)
    {
        if(!$this->restriccion('registro_area')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $area= new area();
        $area->name=$request->descripcion;
        $area->valor=$request->ponderacion;
        $area->numero_area=$request->numero;
        $area->save();
        
       
        $ruta=storage_path('app/public/files/'.str_replace(' ','_',$area->name));
        File::makeDirectory($ruta,0777,true,true);

        return redirect('reporte_areas')->with('registrar','ok');        
    }

    public function editar_area($id,areaEditRequest $request)
    {
        if(!$this->restriccion('editar_area')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $area=area::find($id);
        $area->name=$request->EditDescripcion;
        $area->valor=$request->EditPonderacion;
        $area->save();

        return redirect('reporte_areas')->with('editar', 'ok');  
    }

    
    public function eliminar_area($id)
    {
        if(!$this->restriccion('eliminar_area')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $area= area::find($id);
        
        $ruta=storage_path('app/public/files/Area'.$area->numero_area);
        File::deleteDirectory($ruta);

        $this->eliminar($area);
        $this->eliminacionCascada($area->variables);

        return redirect('/reporte_areas')->with('eliminar', 'ok');
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
