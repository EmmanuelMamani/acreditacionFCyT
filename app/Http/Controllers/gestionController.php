<?php

namespace App\Http\Controllers;

use App\Http\Requests\reporteRequest;
use App\Models\area;
use App\Models\calificacion;
use Illuminate\Http\Request;
use App\Models\gestion;
use Illuminate\Support\Facades\Auth;
use App\Models\permiso_rol;
use App\Models\permiso;
use PDF;

class gestionController extends Controller
{
    public function reporte(){
        if(!$this->restriccion('reporte_gestiones')){
            return redirect('/sin_permiso');
        }
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
        if(!$this->restriccion('registro_gestion')){
            return redirect('/sin_permiso');
        }
        $gestion = new gestion();
        $gestion->año=$request->gestion;
        $gestion->activo=false;
        $gestion->carrera_id=Auth::user()->carrera->id;
        $gestion->save();
        return redirect('/reporte_gestiones')->with('registrar','ok');
    }
    public function activar($id){
        if(!$this->restriccion('activar_gestion')){
            return redirect('/sin_permiso');
        }
        $gestiones=gestion::all()->where("carrera_id",Auth::user()->carrera_id);
        foreach($gestiones as $gestion){
            $gestion->activo=false;
            $gestion->save();
        }
        $gestion=gestion::find($id);
        $gestion->activo=true;
        $gestion->save();
        return redirect('/reporte_gestiones')->with('editar', 'ok');
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

    public function reporte_carrera(reporteRequest $request,$id){
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
 
       //$enlaceFuente="https://fonts.googleapis.com/css2?family=Gruppo&family=Raleway:wght@100&family=Space+Grotesk:wght@300&display=swap";
       //return PDF::setOption('isRemoteEnabled', true)->loadView('reportePDF',['gestion'=>$gestion,'areas'=>$areas,'notas'=>$notas,'notasP'=>$notasP,'calificaciones'=>$calificaciones])->download('sin_permiso.pdf');
       //return PDF::setOptions(['dpi' => 96])->loadView('sin_permiso',['a'=>'holi'])->download('sin_permiso.pdf');
       return view('reportePDF',['gestion'=>$gestion,'areas'=>$areas,'notas'=>$notas,'notasP'=>$notasP,'calificaciones'=>$calificaciones]);
    }
}
