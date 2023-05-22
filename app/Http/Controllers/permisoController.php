<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permiso;
use App\Http\Requests\permisoRequest;
use App\Models\permiso_rol;
use App\Models\rol;

class permisoController extends Controller
{
    //
    public function reporte(){
        $permisos= permiso::all();
        return view('permisos',['permisos'=>$permisos]);
    }
    public function registrar(permisoRequest $request){
        $permiso=new permiso();
        $permiso->url=$request->url;
        $permiso->save();
        return redirect('/reporte_permisos');
    }
    public function reporte_permiso_rol(){
        $permiso_roles=permiso_rol::all();
        $permisos=permiso::all();
        $roles=rol::all();
        return view('reporte_permiso_rol',['permiso_roles'=>$permiso_roles,'permisos'=>$permisos,'roles'=>$roles]);
    }
    public function asignar_permiso(Request $request){
        $asignacion = new permiso_rol();
        $asignacion->permiso_id=$request->permiso;
        $asignacion->rol_id=$request->rol;
        $asignacion->save();
        return redirect('/reporte_permiso_rol');
    }
    public function eliminar_asignacion($id){
        $asignacion= permiso_rol::find($id);
        $asignacion->delete();
        return redirect('/reporte_permiso_rol');
    }
    public function eliminar_permiso($id){
        $permiso=permiso::find($id);
        $asignaciones=permiso_rol::all()->where('permiso_id',$permiso->id);
        foreach ($asignaciones as $asignacion){
            $asignacion->delete();
        }
        $permiso->delete();
        return redirect('/reporte_permisos');
    }
}
