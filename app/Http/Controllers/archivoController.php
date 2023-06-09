<?php

namespace App\Http\Controllers;

use App\Http\Requests\folderEditRequest;
use App\Http\Requests\folderRequest;
use App\Models\archivo;
use App\Models\indicador;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\permiso_rol;
use App\Models\permiso;

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
        $folder->url=Storage::url($archivo->storeAs('public/files',$folder->nombre)) ;
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
     $folder->nombre=$request->editNombre;
     $folder->save();

     return redirect(route('reporte_archivos',['id'=>$folder->indicador->id]))->with('editar', 'ok');
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
       

      
        Storage::disk('local')->delete('public/files/'.$archivo->nombre);
        
        $archivo->delete();

        
        return redirect(route('reporte_archivos',['id'=>$id_indicador]))->with('eliminar', 'ok');
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
