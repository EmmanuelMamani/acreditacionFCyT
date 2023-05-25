<?php

namespace App\Http\Controllers;
use App\Models\rol;
use Illuminate\Http\Request;
use App\Http\Requests\rolRequest;
use App\Models\permiso_rol;
use App\Models\permiso;
use Illuminate\Support\Facades\Auth;
class rolController extends Controller
{
    //
    public function reporte(){
        if(!$this->restriccion('reporte_roles')){
            return redirect('/sin_permiso');
        }
        $roles=rol::all()->where('activo',true);
        return view('reporte_roles',['roles'=>$roles]);
    }
    public function registrar( rolRequest $request){
        if(!$this->restriccion('registro_rol')){
            return redirect('/sin_permiso');
        }
        $rol=new rol();
        $rol->name=$request->name;
        $rol->save();
        return redirect('/reporte_roles')->with('registrar','ok');
    }
    public function eliminar($id){
        if(!$this->restriccion('eliminar_rol')){
            return redirect('/sin_permiso');
        }
        $rol= rol::find($id);
        $rol->activo=false;
        $rol->save();
        return redirect('/reporte_roles')->with('eliminar', 'ok');
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
