<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gestion;
use Illuminate\Support\Facades\Auth;
use App\Models\permiso_rol;
use App\Models\permiso;

class gestionController extends Controller
{
    public function reporte(){
        if(!$this->restriccion('reporte_gestiones')){
            return redirect('/sin_permiso');
        }
        $años=[];
        $gestiones=gestion::all()->where("carrera_id",Auth::user()->carrera_id);
        for($i=2020; $i<2070 ; $i++){
            $alerta=false;
            foreach ($gestiones as $gestion){
                if($gestion->año == $i){
                    $alerta=true;
                }
            }
            if($alerta==false){
                $años[]=$i;
            }
        }
        return view('reporte_gestiones',['gestiones'=>$gestiones,'años'=>$años]);
    }
    public function registrar(Request $request){
        if(!$this->restriccion('registro_gestion')){
            return redirect('/sin_permiso');
        }
        $gestion = new gestion();
        $gestion->año=$request->gestion;
        $gestion->activo=false;
        $gestion->carrera_id=Auth::user()->carrera->id;
        $gestion->save();
        return redirect('/reporte_gestiones')->with('registrar','ok');
    }
    public function activar($id){
        if(!$this->restriccion('activar_gestion')){
            return redirect('/sin_permiso');
        }
        $gestiones=gestion::all()->where("carrera_id",Auth::user()->carrera_id);
        foreach($gestiones as $gestion){
            $gestion->activo=false;
            $gestion->save();
        }
        $gestion=gestion::find($id);
        $gestion->activo=true;
        $gestion->save();
        return redirect('/reporte_gestiones')->with('editar', 'ok');
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
