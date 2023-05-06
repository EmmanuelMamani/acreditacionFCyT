<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
