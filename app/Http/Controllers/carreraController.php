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
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $carreras= carrera::all()->where('activo',true);
       return view("reporte_carreras",["carreras"=>$carreras]);
    }
    public function registro(carreraRequest $request){
        if(!$this->restriccion('registro_carrera')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $carrera= new carrera();
        $carrera->name= $request->name;
        $carrera->codigo=$request->codigo;
        $carrera->save();
        return redirect('/reporte_carreras')->with('registrar','ok');
    }
    public function eliminar_carrera($id){
        if(!$this->restriccion('eliminar_carrera')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $carrera= carrera::find($id);
        $carrera->activo=false;
        $carrera->save();
        return redirect('/reporte_carreras')->with('eliminar', 'ok');
    }
    public function editar_carrera($id, carreraEditRequest $request){
        if(!$this->restriccion('editar_carrera')){
             if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $carrera = carrera::find($id);
        $carrera->name=$request->nameE;
        $carrera->save();
        return redirect('/reporte_carreras')->with('editar', 'ok');
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
