<?php

namespace App\Http\Controllers;
use App\Models\rol;
use Illuminate\Http\Request;
use App\Http\Requests\rolRequest;
class rolController extends Controller
{
    //
    public function reporte(){
        $roles=rol::all()->where('activo',true);
        return view('reporte_roles',['roles'=>$roles]);
    }
    public function registrar( rolRequest $request){
        $rol=new rol();
        $rol->name=$request->name;
        $rol->save();
        return redirect('/reporte_roles');
    }
    public function eliminar($id){
        $rol= rol::find($id);
        $rol->activo=false;
        $rol->save();
        return redirect('/reporte_roles');
    }
}
