<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\area;
use App\Models\gestion;
use App\Models\calificacion;
class calificarController extends Controller
{
    //
    public function reporte(){
        $gestion=gestion::all()->where('carrera_id', Auth::user()->carrera_id)->where('activo',true)->last();
        $notas=[];
        $areas=area::all();
        foreach ($areas as $area){
            $valor_area=$area->valor; //ponderacion de un area
            $ponderacion_indicadores=0;//ponderacion de los indicadores
            $suma_indicadores=0;//suma total de calificaciones
            foreach($area->variables as $variable){
                foreach($variable->indicadores as $indicador){
                    $ponderacion_indicadores+=$indicador->peso;//sumamos todos los indicadores para sacar su ponderacion
                    $peso_indicador=$indicador->peso;//ponderacion de un indicador
                    $criterios=$indicador->criterios->count();//numero de criterios por indicador
                    $suma_criterios=0;
                   // echo $indicador->descripcion.'<br>';
                   // echo "ponderacion criterios ".$criterios.'<br>';
                    foreach($indicador->criterios as $criterio){
                        foreach($criterio->calificaciones as $calificacion){
                            if($calificacion->gestion_id==$gestion->id){
                                $suma_criterios+=$calificacion->calificacion;
                            }
                        }
                    }
                   // echo "suma criterios ".$suma_criterios.'<br>';
                    $valor=(($suma_criterios/$criterios)/5)*$peso_indicador;
                    $suma_indicadores+=$valor;
                  //  echo "valor en el indicador ".$valor.'<br>';
                }
            }
            $nota= ($suma_indicadores/$ponderacion_indicadores)* $valor_area;
           // echo "El valor del area es: ".$nota.'<br>';
            $notas[]=$nota;
        }

        return view('calificar',['areas'=>$areas,'notas'=>$notas]);
    }

    public function ver_calificar_area($id){
        $area=area::find($id);
        return view('calificar_area',['area'=>$area]);
    }
    public function calificar($id,$id_area, Request $request){
        $gestion=gestion::all()->where('carrera_id', Auth::user()->carrera_id)->where('activo',true)->last();
        $calificacion=calificacion::all()->where('indicador_criterio_id',$id)->where('gestion_id',$gestion->id)->last();
        if($calificacion==NULL){
            $calificacion= new calificacion;
            $calificacion->calificacion=$request->valor;
            $calificacion->indicador_criterio_id=$id;
            $calificacion->gestion_id=$gestion->id;
            $calificacion->save();
        }else{
            $calificacion->calificacion=$request->valor;
            $calificacion->save();
        }
        return redirect(route('ver_calificar_area',['id'=>$id_area]));
    }
}
