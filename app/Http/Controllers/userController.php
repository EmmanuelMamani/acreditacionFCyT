<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\carrera;
use App\Models\rol;
use App\Models\User;
use App\Models\rol_user;
use App\Models\area;
use App\Models\variable;
use App\Http\Requests\userRequest;
use App\Http\Requests\userEditRequest;
use App\Models\indicador;
use App\Models\gestion;
use App\Models\permiso_rol;
use App\Models\permiso;
class userController extends Controller
{
    //
    public function menu_admin(){
        if(!$this->restriccion('menu_admin')){
            return redirect('/sin_permiso');
        }
        $areas=area::all()->where('activo',1);
        $variables=variable::all()->where('activo',1)->count();
        $indicadores=indicador::all()->where('activo',1)->count();
        $gestion=gestion::all()->where('carrera_id', Auth::user()->carrera_id)->where('activo',true)->last();
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
        return view('menu_admin',['areas'=>$areas,'variables'=>$variables,'indicadores'=>$indicadores,'notas'=>$notas,'notasP'=>$notasP]);
    }
    public function menu_superadmin(){
        if(!$this->restriccion('menu_superadmin')){
            return redirect('/sin_permiso');
        }
        $areas=area::all()->where('activo',1);
        $carreras=carrera::all()->where('activo',1);
        $variables=variable::all()->where('activo',1)->count();
        return view('menu_superadmin',['areas'=>$areas,'carreras'=>$carreras,'variables'=>$variables]);
    }

    public function autentificacion(Request $request){
        $credentials=request()->only('email','password');
        if(Auth::attempt($credentials)){
            request()->session()->regenerate();
            if(Auth::user()->rol_user->last()->rol->name=="superadmin"){
                return redirect('/menu_superadmin');
            }
            if(Auth::user()->rol_user->last()->rol->name=="administrador"){
                return redirect()->intended('/menu_admin');
            }
        }else{
            return "incorrecto";
        }

    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
    public function reporte_usuarios(){
        if(!$this->restriccion('reporte_usuarios')){
            return redirect('/sin_permiso');
        }
        $usuarios=User::all()->where('activo',true);
        $carreras=carrera::all()->where('activo',true);
        $roles= rol::all()->where('activo',true)->where('name','!=',1);
        return view('reporte_usuarios',['usuarios'=>$usuarios,'carreras'=>$carreras,'roles'=>$roles]);
    }
    public function reporte_usuarios_carrera(){
        if(!$this->restriccion('reporte_usuarios_carrera')){
            return redirect('/sin_permiso');
        }
        $usuarios=User::all()->where('activo',true)->where('carrera_id',Auth::user()->carrera_id);
        $roles= rol::all()->where('activo',true)->where('name','!=',"superadmin");
        return view('reporte_usuarios_carrera',['usuarios'=>$usuarios,'roles'=>$roles]);
    }
    public function registrar(userRequest $request){
        if(!$this->restriccion('registro_usuario')){
            return redirect('/sin_permiso');
        }
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        if($request->carrera!='null'){
            $user->carrera_id=$request->carrera;
        }
        $user->save();
        $rol=new rol_user();
        $rol->user_id= User::all()->last()->id;
        $rol->rol_id= $request->rol;
        $rol->save();
        if(Auth::user()->carrera_id!=null){
            return redirect('/reporte_usuarios_carrera')->with('registrar', 'ok');
        }else{
            return redirect('/reporte_usuarios')->with('registrar', 'ok');
        }
    }
    public function eliminar($id){
        if(!$this->restriccion('eliminar_usuario')){
            return redirect('/sin_permiso');
        }
        $user=User::find($id);
        $user->activo=false;
        $user->save();
        if(Auth::user()->carrera_id!=null){
            return redirect('/reporte_usuarios_carrera')->with('eliminar', 'ok');
        }else{
            return redirect('/reporte_usuarios')->with('eliminar', 'ok');
        }
    }
    public function editar($id, userEditRequest $request){
        if(!$this->restriccion('editar_usuario')){
            return redirect('/sin_permiso');
        }
        $user=User::find($id);
        $user->name=$request->nameE;
        $user->password=bcrypt($request->passwordE);
        $user->carrera_id=$request->carrera;
        $user->save();
        $rol= rol_user::find($user->rol_user->last()->id);
        $rol->rol_id=$request->rol;
        $rol->save();
        if(Auth::user()->carrera_id!=null){
            return redirect('/reporte_usuarios_carrera')->with('editar', 'ok');
        }else{
            return redirect('/reporte_usuarios')->with('editar', 'ok');
        }
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
