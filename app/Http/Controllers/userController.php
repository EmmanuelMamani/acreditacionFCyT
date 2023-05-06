<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\carrera;
use App\Models\rol;
use App\Models\User;
use App\Models\rol_user;
use App\Http\Requests\userRequest;
use App\Http\Requests\userEditRequest;
class userController extends Controller
{
    //
    public function autentificacion(Request $request){
        $credentials=request()->only('email','password');
        if(Auth::attempt($credentials)){
            request()->session()->regenerate();
            if(Auth::user()->rol_user->last()->rol->name=="superadmin"){
                return redirect()->intended('/menu_superadmin');
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
        $usuarios=User::all()->where('activo',true);
        $carreras=carrera::all()->where('activo',true);
        $roles= rol::all()->where('activo',true)->where('name','!=',1);
        return view('reporte_usuarios',['usuarios'=>$usuarios,'carreras'=>$carreras,'roles'=>$roles]);
    }
    public function reporte_usuarios_carrera(){
        $usuarios=User::all()->where('activo',true)->where('carrera_id',Auth::user()->carrera_id);
        $roles= rol::all()->where('activo',true)->where('name','!=',"superadmin");
        return view('reporte_usuarios_carrera',['usuarios'=>$usuarios,'roles'=>$roles]);
    }
    public function registrar(userRequest $request){
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->carrera_id=$request->carrera;
        $user->save();
        $rol=new rol_user();
        $rol->user_id= User::all()->last()->id;
        $rol->rol_id= $request->rol;
        $rol->save();
        return redirect('/reporte_usuarios');
    }
    public function eliminar($id){
        $user=User::find($id);
        $user->activo=false;
        $user->save();
        return redirect('/reporte_usuarios');
    }
    public function editar($id, userEditRequest $request){
        $user=User::find($id);
        $user->name=$request->nameE;
        $user->password=$request->passwordE;
        $user->carrera_id=$request->carrera;
        $user->save();
        $rol= rol_user::find($user->rol_user->last()->id);
        $rol->rol_id=$request->rol;
        $rol->save();
        return redirect('/reporte_usuarios');
    }
}
