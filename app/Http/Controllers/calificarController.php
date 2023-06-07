<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\area;
use App\Models\gestion;
use App\Models\calificacion;
use App\Models\permiso_rol;
use App\Models\permiso;
use App\Models\carrera;
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
                $notas[]=round($nota,4);
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
        
        $gestion=gestion::where('carrera_id',Auth::user()->carrera_id)->where('activo',1)->get();
        $calificaciones=calificacion::where('gestion_id',$gestion[0]->id)->get();

       
        return view('calificar_area',['area'=>$area,'calificaciones'=>$calificaciones,'gestion'=>$gestion[0]->id]);
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
        return redirect(route('ver_calificar_area',['id'=>$id_area]))->with('registrar','ok');
    }
    public function reportePDF(){
        $areas=area::all();
        $gestion=gestion::all()->where('carrera_id', Auth::user()->carrera_id)->where('activo',true)->last();
        $calificaciones=calificacion::where('gestion_id',$gestion->id)->get();
        $notas=[];
        $notasP=[];
        if($gestion != null){
            foreach ($areas as $area){
                $valor_area=$area->valor; //ponderacion de un area
                $ponderacion_indicadores=0;//ponderacion de los indicadores
                $suma_indicadores=0;//suma total de calificaciones
                foreach($area->variables as $variable){
                    foreach($variable->indicadores->where('activo',1) as $indicador){
                        $ponderacion_indicadores+=$indicador->peso;//sumamos todos los indicadores para sacar su ponderacion
                        $peso_indicador=$indicador->peso;//ponderacion de un indicador
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
                $nota= ($suma_indicadores/$ponderacion_indicadores)* $valor_area;
               // echo "El valor del area es: ".$nota.'<br>';
                $notas[]=$nota;
                $notasP[]=($nota/$valor_area)*5;
            }
        }else{
            for($i=0; $i<$areas->count();$i++){
                $notas[]=0;
                $notasP[]=0;
            }
        }
        return view('reportePDF',['gestion'=>$gestion,'areas'=>$areas,'notas'=>$notas,'notasP'=>$notasP,'calificaciones'=>$calificaciones]);
    }
    public function reporte_area_PDF($id){
        $gestion=gestion::all()->where('carrera_id', Auth::user()->carrera_id)->where('activo',true)->last();
        
        $calificaciones=calificacion::all()->where('gestion_id',$gestion->id);
        $area=area::find($id);
        $notasP=[];
        $notas=[];
        $roseta=[];
        foreach($area->variables as $variable){
            $sum_ponderacion=0;
            $sum_calificacion=0;
            foreach ($variable->indicadores as $indicador) {
                $sum_ponderacion+=$indicador->peso * 5;
                $sum_calificacion+=$indicador->peso*($indicador->calificacion($gestion->id,$indicador->id))[0]->promedio;
            }
            $notasP[]=$sum_ponderacion;
            $notas[]=$sum_calificacion;
            $roseta[]=($sum_calificacion/$sum_ponderacion)*5;
        }
        return view('reporte_area_PDF',['gestion'=>$gestion,'area'=>$area,'notasP'=>$notasP,'notas'=>$notas,'roseta'=>$roseta,'calificaciones'=>$calificaciones]);
    return $calificaciones;
    }

    
    public function reporte_carreras_PDF(){
        $carreras=carrera::all();
        $notasC=[];
        $areas=area::all();
        foreach ($carreras as $carrera){
                $gestion= gestion::all()->where('carrera_id',$carrera->id)->where('activo',1)->last();
                $notas=[];
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
                        $notas[]=round($nota,4);
                    }
                }else{
                    for($i=0; $i<$areas->count();$i++){
                        $notas[]=0;
                    }
                }
                $notasC[]= (collect($notas)->sum()/$areas->sum('valor'))*100;
        }
        return view('reporte_carreras_PDF',['notasC'=>$notasC,'carreras'=>$carreras]);
        
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
