<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gestion;
use Illuminate\Support\Facades\Auth;

class gestionController extends Controller
{
    public function reporte(){
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
        $gestion = new gestion();
        $gestion->año=$request->gestion;
        $gestion->activo=false;
        $gestion->carrera_id=Auth::user()->carrera->id;
        $gestion->save();
        return redirect('/reporte_gestiones');
    }
    public function activar($id){
        $gestiones=gestion::all()->where("carrera_id",Auth::user()->carrera_id);
        foreach($gestiones as $gestion){
            $gestion->activo=false;
            $gestion->save();
        }
        $gestion=gestion::find($id);
        $gestion->activo=true;
        $gestion->save();
        return redirect('/reporte_gestiones');
    }
}
