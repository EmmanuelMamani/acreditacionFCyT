<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\area;
use App\Models\gestion;
use App\Models\calificacion;
use App\Models\permiso_rol;
use App\Models\permiso;
class calificarController extends Controller
{
    //
    public function reporte(){
        if(!$this->restriccion('calificacion')){
            return redirect('/sin_permiso');
        }
        $gestion=gestion::all()->where('carrera_id', Auth::user()->carrera_id)->where('activo',true)->last();
        $notas=[];
        $areas=area::all();
        if($gestion != null){
            foreach ($areas as $area){
                $valor_area=$area->valor; //ponderacion de un area
                $ponderacion_indicadores=0;//ponderacion de los indicadores
                $suma_indicadores=0;//suma total de calificaciones
                foreach($area->variables as $variable){
                   // printf($variable->indicadores);
                   // $ponderacion_indicadores=$ponderacion_indicadores+ $variable->indicadores->sum('peso');
                    //printf('<br>');
                    //printf($ponderacion_indicadores.'-'.$variable->name.'-'.$variable->id);
                    foreach($variable->indicadores->where('activo',1) as $indicador){
                       //printf($indicador->peso);
                        $ponderacion_indicadores=$ponderacion_indicadores+$indicador->peso;//sumamos todos los indicadores para sacar su ponderacion
                        //printf($ponderacion_indicadores);
                        $peso_indicador=$indicador->peso;//ponderacion de un indicador
                        //print($indicador->criterios->count().'-'.$indicador->variable);
                       // printf('<br>');
                        $criterios=$indicador->criterios->count();//numero de criterios por indicador
                        $suma_criterios=0;
                       // echo $indicador->descripcion.'<br>';
                       // echo "ponderacion criterios ".$criterios.'<br>';
                        foreach($indicador->criterios_indicadores as $criterio){
                            foreach($criterio->calificaciones as $calificacion){
                                if($calificacion->gestion_id==$gestion->id){
                                    $suma_criterios+=$calificacion->calificacion;
                                }
                            }
                        }
                       // echo "suma criterios ".$suma_criterios.'<br>';
                       if($criterios!=0){
                        $valor=(($suma_criterios/$criterios)/5)*$peso_indicador;
                       } else{
                        $valor=0;
                       }
                        $suma_indicadores+=$valor;
                      //  echo "valor en el indicador ".$valor.'<br>';
                    }
                }
                //printf('<br>');
               // printf($ponderacion_indicadores);
                $nota= ($suma_indicadores/$ponderacion_indicadores)* $valor_area;
               // echo "El valor del area es: ".$nota.'<br>';
                $notas[]=$nota;
            }
        }else{
            for($i=0; $i<$areas->count();$i++){
                $notas[]=0;
            }
        }

        return view('calificar',['areas'=>$areas,'notas'=>$notas,'gestion'=>$gestion]);
    }

    public function ver_calificar_area($id){
        if(!$this->restriccion('ver_calificar_area')){
            return redirect('/sin_permiso');
        }
        $area=area::find($id);
        return view('calificar_area',['area'=>$area]);
    }
    public function calificar($id,$id_area, Request $request){
        if(!$this->restriccion('calificar')){
            return redirect('/sin_permiso');
        }
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
