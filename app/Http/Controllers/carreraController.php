<?php

namespace App\Http\Controllers;
use App\Models\carrera;
use Illuminate\Http\Request;
use App\Http\Requests\carreraRequest;
use App\Http\Requests\carreraEditRequest;
use App\Models\permiso_rol;
use App\Models\permiso;
use Illuminate\Support\Facades\Auth;
class carreraController extends Controller
{
    //
    public function reporte_carreras(){
        if(!$this->restriccion('reporte_carreras')){
            return redirect('/sin_permiso');
        }
        $carreras= carrera::all()->where('activo',true);
       return view("reporte_carreras",["carreras"=>$carreras]);
    }
    public function registro(carreraRequest $request){
        if(!$this->restriccion('registro_carrera')){
            return redirect('/sin_permiso');
        }
        $carrera= new carrera();
        $carrera->name= $request->name;
        $carrera->codigo=$request->codigo;
        $carrera->save();
        return redirect('/reporte_carreras');
    }
    public function eliminar_carrera($id){
        if(!$this->restriccion('eliminar_carrera')){
            return redirect('/sin_permiso');
        }
        $carrera= carrera::find($id);
        $carrera->activo=false;
        $carrera->save();
        return redirect('/reporte_carreras');
    }
    public function editar_carrera($id, carreraEditRequest $request){
        if(!$this->restriccion('editar_carrera')){
            return redirect('/sin_permiso');
        }
        $carrera = carrera::find($id);
        $carrera->name=$request->nameE;
        $carrera->save();
        return redirect('/reporte_carreras');
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
