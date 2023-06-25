<?php

namespace App\Http\Controllers;

use App\Http\Requests\folderEditRequest;
use App\Http\Requests\folderRequest;
use App\Models\archivo;
use App\Models\area;
use App\Models\indicador;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\permiso_rol;
use App\Models\permiso;
use Illuminate\Support\Facades\File;

class archivoController extends Controller
{
    public function reporte_archivos($id){
        if(!$this->restriccion('reporte_archivos')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $indicador=indicador::find($id);
        $archivos=archivo::where('folder_id',NULL)->where('indicador_id',$id)->get();
        return view('detalle_indicador',['indicador'=>$indicador,'archivos'=>$archivos]);
    }

    
    public function registro_folder(folderRequest $request,$id){
        if(!$this->restriccion('registro_folder')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $folder=new archivo();
        $folder->nombre=$request->nombre_archivo;
        $folder->carrera_id=Auth::user()->carrera_id;
        $folder->indicador_id=$id;
        $folder->tipo='folder';
        $folder->folder_id=$request->folderId==0?null:$request->folderId;
        $folder->save();


        
        if(Auth::user()->carrera_id==null){
            $indicador=indicador::find($id);
            $ruta='';
            if($request->folderId==0){
                $ruta=storage_path('app/public/files/Area'.$indicador->variable->area->numero_area.'/'.$indicador->variable->numero_variable.'/'.$indicador->numero_indicador.'/'.$folder->nombre);
            }else{
                $recursivo=archivo::find($request->folderId);
                $ruta=storage_path('app/public/files/Area'.$indicador->variable->area->numero_area.'/'.$indicador->variable->numero_variable.'/'.$indicador->numero_indicador);
                $ruta=$this->recursivo($recursivo,$ruta).'/'.$request->nombre_archivo;
            }
            
            File::makeDirectory($ruta,0777,true,true);
        }
        
        return redirect(route('reporte_archivos',['id'=>$id]))->with('registrar','ok');

    }
    
    public function registro_archivos(Request $request,$id){
        if(!$this->restriccion('registro_archivos')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }

        $archivo=$request->file('document');
        $folder=new archivo;
        $folder->nombre=$archivo->getClientOriginalName();
        $folder->carrera_id=Auth::user()->carrera_id;
        $folder->indicador_id=$id;

        if(Auth::user()->carrera_id!=null){
            $rutaCarrera=storage_path('app/public/files/'.Auth::user()->carrera->name);
            if(!File::exists($rutaCarrera)){
                File::makeDirectory($rutaCarrera,0777,true,true);
                $archivo->storeAs('public/files/'.Auth::user()->carrera->name,$folder->nombre);
            }else{
                $archivo->storeAs('public/files/'.Auth::user()->carrera->name,$folder->nombre);
            }
        }else{
            $indicador=indicador::find($id);
            if($request->folderId!=0){
                $pertenece=archivo::find($request->folderId);
                $ruta='public/files/Area'.$indicador->variable->area->numero_area.'/'.$indicador->variable->numero_variable.'/'.$indicador->numero_indicador;
                $ruta=$this->recursivo($pertenece,$ruta);
                $archivo->storeAs($ruta,$folder->nombre);
            }else{
                $archivo->storeAs('public/files/Area'.$indicador->variable->area->numero_area.'/'.$indicador->variable->numero_variable.'/'.$indicador->numero_indicador,$folder->nombre);
            }
            
        }

       // $folder->url=Storage::url($archivo->storeAs('public/files',$folder->nombre)) ;
       $folder->url='';
        $folder->folder_id=$request->folderId==0?null:$request->folderId;
        $folder->tipo='archivo';
        $folder->save();

       
    }

    public function editar_folder(folderEditRequest $request,$id){
        if(!$this->restriccion('editar_folder')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
     $folder=archivo::find($id);
     
     if(Auth::user()->carrera_id==null){
        if($folder->folder==null){
            $eliminar=storage_path('app/public/files/Area'.$folder->indicador->variable->area->numero_area.'/'.$folder->indicador->variable->numero_variable.'/'.$folder->indicador->numero_indicador.'/'.$folder->nombre);
            $ruta=storage_path('app/public/files/Area'.$folder->indicador->variable->area->numero_area.'/'.$folder->indicador->variable->numero_variable.'/'.$folder->indicador->numero_indicador.'/'.$request->editNombre);

            File::makeDirectory($ruta,0777,true,true);
            File::moveDirectory($eliminar,$ruta,true);
            File::delete($eliminar);

        }else{
            $ruta=storage_path('app/public/files/Area'.$folder->indicador->variable->area->numero_area.'/'.$folder->indicador->variable->numero_variable.'/'.$folder->indicador->numero_indicador);
            $rutaAlter=$ruta;
            $ruta=$this->recursivo($folder->folder,$ruta).'/'.$request->editNombre;
           
            if(!File::exists($ruta)){
                File::makeDirectory($ruta,0777,true,true);
               
                $eliminar=$this->recursivo($folder,$rutaAlter);
                //print($eliminar);
                File::moveDirectory($eliminar,$ruta,true);
                File::delete($eliminar);
            }
           
        }
        
     }

     $folder->nombre=$request->editNombre;
     $folder->save();

     return redirect(route('reporte_archivos',['id'=>$folder->indicador->id]))->with('editar', 'ok');
    }

    private function recursivo($folder,$ruta){
        if($folder->folder==null){
            $ruta=$ruta.'/'.$folder->nombre;
            
        }else{
            $ruta=$this->recursivo($folder->folder,$ruta).'/'.$folder->nombre;
        }
        return $ruta;
    }

    public function eliminar_folder($id){
        if(!$this->restriccion('eliminar_folder')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $folder=archivo::find($id);
        $id_indicador=$folder->indicador->id;

        $ruta=storage_path('app/public/files/Area'.$folder->indicador->variable->area->numero_area.'/'.$folder->indicador->variable->numero_variable.'/'.$folder->indicador->numero_indicador);
        $ruta=$this->recursivo($folder,$ruta);

        File::deleteDirectory($ruta);
       
        $folder->delete();

        return redirect(route('reporte_archivos',['id'=>$id_indicador]))->with('eliminar', 'ok');
    }

    public function eliminar_archivo($id){
        if(!$this->restriccion('eliminar_archivo')){
            if(Auth::user()==null){
                return redirect(route('login'));
            }else{
            return redirect('/sin_permiso');
            }
        }
        $archivo=archivo::find($id);
        $id_indicador=$archivo->indicador->id;
       
        $ruta=storage_path('app/public/files/Area'.$archivo->indicador->variable->area->numero_area.'/'.$archivo->indicador->variable->numero_variable.'/'.$archivo->indicador->numero_indicador);
        $ruta=$this->recursivo($archivo,$ruta);

        File::delete($ruta);
      
        //Storage::disk('local')->delete('public/files/'.$archivo->nombre);
        
        $archivo->delete();

        
        return redirect(route('reporte_archivos',['id'=>$id_indicador]))->with('eliminar', 'ok');
    }

    public function reporte_sin_archivos(){
       
       

        $indicadores=indicador::all()->where('activo',1);
       
        $indicadores=$indicadores->reject(function ($value, int $key) {
            $carrera=null;
            if(Auth::user()!=null){
                $carrera=Auth::user()->carrera_id;
            }
            return $this->archivos($value->archivos,$carrera);
        });       
                   
        return view('reporte_archivos_PDF',['indicadores'=>$indicadores]);
    }

    public function archivos($archivos,$carrera){
        $bool=false;
        foreach ($archivos as $archivo) {
           
            if($archivo->tipo =='archivo' && ($archivo->carrera_id==null || $archivo->carrera_id==$carrera)){
                $bool=true;
                break;
               
            }else{ 
                $bool=$this->archivos($archivo->archivos,$carrera);
            }
        }
       // print($bool);
        return $bool;
    }

    public function restriccion($ruta){
        $permitido=true;
        if(Auth::user()!=null){
        $rol_id=Auth::user()->rol_user->last()->rol_id;
        $permiso_id= permiso::all()->where('url',$ruta)->last()->id;
        $restriccion= permiso_rol::all()->where('permiso_id',$permiso_id)->where('rol_id',$rol_id);
        if($restriccion == '[]'){
            $permitido=false; 
        }
        }else{
            $permitido=false;
        }
        return $permitido;
        
       
    }
}
