<?php

namespace App\Http\Controllers;
use App\Models\carrera;
use Illuminate\Http\Request;
use App\Http\Requests\carreraRequest;
class carreraController extends Controller
{
    //
    public function reporte_carreras(){
        $carreras= carrera::all()->where('activo',true);
       return view("reporte_carreras",["carreras"=>$carreras]);
    }
    public function registro(carreraRequest $request){
        $carrera= new carrera();
        $carrera->name= $request->name;
        $carrera->codigo=$request->codigo;
        $carrera->save();
        return redirect('/reporte_carreras');
    }
    public function eliminar_carrera($id){
        $carrera= carrera::find($id);
        $carrera->activo=false;
        $carrera->save();
        return redirect('/reporte_carreras');
    }
    public function editar_carrera($id, Request $request){
        echo $id;
        /*$carrera = carrera::find($id);
        $carrera->name=$request->name;
        $carrera->save();
        return redirect('/reporte_carreras');*/
    }
}
