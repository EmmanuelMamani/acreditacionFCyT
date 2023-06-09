<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permiso;
use App\Http\Requests\permisoRequest;
use App\Models\permiso_rol;
use App\Models\rol;
use Illuminate\Support\Facades\Auth;

class permisoController extends Controller
{
    //
    public function reporte(){
        if(!$this->restriccion('reporte_permisos')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $permisos= permiso::all();
        return view('permisos',['permisos'=>$permisos]);
    }
    public function registrar(permisoRequest $request){
        if(!$this->restriccion('registrar_permiso')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $permiso=new permiso();
        $permiso->url=$request->url;
        $permiso->save();
        return redirect('/reporte_permisos')->with('registrar','ok');
    }
    public function reporte_permiso_rol(){
        if(!$this->restriccion('reporte_permiso_rol')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $permiso_roles=permiso_rol::all();
        $permisos=permiso::all();
        $roles=rol::all();
        return view('reporte_permiso_rol',['permiso_roles'=>$permiso_roles,'permisos'=>$permisos,'roles'=>$roles]);
    }
    public function asignar_permiso(Request $request){
        if(!$this->restriccion('asignar_permiso')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $asignacion = new permiso_rol();
        $asignacion->permiso_id=$request->permiso;
        $asignacion->rol_id=$request->rol;
        $asignacion->save();
        return redirect('/reporte_permiso_rol')->with('registrar','ok');
    }
    public function eliminar_asignacion($id){
        if(!$this->restriccion('eliminar_asignacion')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $asignacion= permiso_rol::find($id);
        $asignacion->delete();
        return redirect('/reporte_permiso_rol')->with('eliminar', 'ok');
    }
    public function eliminar_permiso($id){
        if(!$this->restriccion('reliminar_permiso')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }

        $permiso=permiso::find($id);
        $asignaciones=permiso_rol::all()->where('permiso_id',$permiso->id);
        foreach ($asignaciones as $asignacion){
            $asignacion->delete();
        }
        $permiso->delete();
        return redirect('/reporte_permisos')->with('eliminar', 'ok');
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
