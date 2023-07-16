@extends("header")
@section("main")
@guest
    <script>
        location.href='{{route("login")}}';
    </script>
@endguest
<div class="grid grid-cols-1 md:grid-cols-3 pb-10">
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$indicador->variable->area->numero_area}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-2xl">{{$indicador->variable->area->name}}</h1></div>
    </div> 
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$indicador->variable->area->numero_area.".".$indicador->variable->numero_variable}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full font-thin text-xs md:text-xs lg:text-base">{{$indicador->variable->name}}</h1></div>
    </div>
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$indicador->variable->area->numero_area.".".$indicador->variable->numero_variable.".".$indicador->numero_indicador}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full font-thin text-xs md:text-xs lg:text-base">{{$indicador->descripcion}}</h1></div>
    </div>
</div>
<div class="bg-slate-200  py-4 shadow shadow-slate-400 mb-10">
    <div class="pl-5"><a href="{{route('reporte_variables',['id'=>$indicador->variable->area->id])}}">{{$indicador->variable->area->name}}</a> > <a href="{{route('reporte_indicadores',['id'=>$indicador->variable->id])}}">{{$indicador->variable->name}}</a> > {{$indicador->descripcion}}</div>
</div>
<div class="mt-10 grid grid-cols-10">
    <div class="col-span-6 md:col-span-8 lg:col-span-9">
        <h3 class="cursor-pointer text-xl md:text-3xl justify-self-start">Archivos</h3>
    </div>
     
     <div class="flex justify-center items-center text-white p-2 rounded-xl col-span-4 cursor-pointer md:col-span-2 lg:col-span-1" id="agregar">
        <span class="material-symbols-outlined">add</span>
        <span>Agregar</span>
    </div>
     
</div>
     <div class="flex justify-center mb-10">
         <table class="w-5/6 mt-5 border-collapse table-auto">
             <thead class="border-2 border-y-black  border-x-white border-t-white">
                 <tr>
                     <th class="text-lg">Tipo</th>
                     <th class="text-left text-lg">Nombre</th>
                     <th class="text-lg">Accion</th>
                 </tr>
             </thead>
             <tbody>
                
                @foreach ($archivos->sortBy('tipo') as $archivo)
               
                @if ($archivo->tipo=='archivo')

                    @if (Auth::user()->carrera_id!= NULL )
                        
                        @if ($archivo->carrera_id==Auth::user()->carrera_id || $archivo->carrera_id==null )
                            <tr class="border border-y-stone-400 border-x-white">
                                @php
                                         $caracteres_noaceptados=array("/","\\",":","*","?",'"',"<",">","|");
                                        
                                    @endphp
                                <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">picture_as_pdf</span></th>
                                @if ($archivo->carrera_id!=null)
                                <th class="font-thin text-lg text-left"><a href="{{ asset('/storage/files/'.str_replace(' ','_',$archivo->carrera->name).'/'.$archivo->nombre)  }}" target="_blank" >{{$archivo->nombre}}</a></th>
                                @else
                                <th class="font-thin text-lg text-left"><a href="{{ asset('/storage/files/'.str_replace(' ','_',$archivo->indicador->variable->area->name).'/'.str_replace(' ','_',$archivo->indicador->variable->name).'/'.str_replace($caracteres_noaceptados,'_',$archivo->indicador->descripcion).'/'.$archivo->nombre)  }}" target="_blank" >{{$archivo->nombre}}</a></th>
                                @endif
                                
                                <th>
                                <div class="grid grid-cols-3">

                                    @if ($archivo->carrera_id!=null)
                                    <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" ><a href="{{ asset('/storage\/'.str_replace(' ','_',$archivo->carrera->name).'/'.$archivo->nombre) }}"> visibility</a></span>
                                    @else
                                    <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" ><a href="{{ asset('/storage/files/'.str_replace(' ','_',$archivo->indicador->variable->area->name).'/'.str_replace(' ','_',$archivo->indicador->variable->name).'/'.str_replace($caracteres_noaceptados,'_',$archivo->indicador->descripcion).'/'.$archivo->nombre)}}"> visibility</a></span>
                                    @endif
                                    
                                    <!--------Boton eliminar para archivos--------->
                                    <form action="{{route("eliminar_archivo",['id'=>$archivo->id])}}" method="post" class="Eliminar">
                                        @csrf
                                        <button class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</button>
                                    </form>
                                    
                                </div>
                                </th>
                            </tr>
                        @endif
                    
                    
                    @else
                        @if ($archivo->carrera_id==null)
                        <tr class="border border-y-stone-400 border-x-white">
                            @php
                                         $caracteres_noaceptados=array("/","\\",":","*","?",'"',"<",">","|");
                                        
                                    @endphp
                            <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">picture_as_pdf</span></th>
                            <th class="font-thin text-lg text-left"><a href="{{asset('/storage/files/'.str_replace(' ','_',$archivo->indicador->variable->area->name).'/'.str_replace(' ','_',$archivo->indicador->variable->name).'/'.str_replace($caracteres_noaceptados,'_',$archivo->indicador->descripcion).'/'.$archivo->nombre)  }}" target="_blank" >{{$archivo->nombre}}</a></th>
                            <th>
                            <div class="grid grid-cols-3">
                               
                                <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" ><a href="{{  asset('/storage/files/'.str_replace(' ','_',$archivo->indicador->variable->area->name).'/'.str_replace(' ','_',$archivo->indicador->variable->name).'/'.str_replace($caracteres_noaceptados,'_',$archivo->indicador->descripcion).'/'.$archivo->nombre)  }}" target="_blank" > visibility</a></span>
                                <!------------Boton para eliminar archivos------------->
                                <form action="{{route("eliminar_archivo",['id'=>$archivo->id])}}" method="post" class="Eliminar">
                                    @csrf
                                    <button class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</button>
                                </form>
                                
                            </div>
                            </th>
                        </tr>  
                        @endif
                              

                    @endif
                
                @else
                  
                    <!---------------FOLDERS--------------->
                    <!---------cuando el ususario esta autenticado de alguna carrera------->
                    @if (Auth::user()->carrera_id!= NULL )
                        
                        @if ($archivo->carrera_id==Auth::user()->carrera_id || $archivo->carrera_id==null)
                            <tr class="border border-y-stone-400 border-x-white">
                                <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-4xl text-right cursor-pointer" onclick="mostrar({{$archivo->id}})">folder</span></th>
                                <th class="font-thin text-lg text-left">{{$archivo->nombre}}</th>
                                <th>
                                <div class="grid grid-cols-3">
                                    <!------------boton añadir------------>
                                    <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" onclick="showModal({{$archivo->id}})">add</span>
                                    <!---------------boton eliminar---------->
                                    <form action="{{route("eliminar_folder",['id'=>$archivo->id])}}" method="post" class="Eliminar">
                                        @csrf
                                        <button class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</button>
                                    </form>
                                    <!-----------------boton editar------------>
                                    <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer" onclick="editar('{{$archivo->nombre}}','{{$archivo->id}}')">edit_square</span>
                                </div>
                                </th>
                            </tr>
                            
                            @includeWhen($archivo->archivos->isNotEmpty(), 'agregarRecursivo', ['archivos' => $archivo->archivos,'id_folder'=>$archivo->id,'ruta'=>'/'.$archivo->nombre])
                            
                        @endif
                    
                   
                    @else
                    <!----------------cuando el usuario es elsuperadmin------------------>
                        
                        @if ($archivo->carrera_id==null)
                        <tr class="border border-y-stone-400 border-x-white">
                            <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-4xl text-right cursor-pointer" onclick="mostrar({{$archivo->id}})">folder</span></th>
                            <th class="font-thin text-lg text-left">{{$archivo->nombre}}</th>
                            <th>
                            <div class="grid grid-cols-3">
                               <!------------boton añadir------------>
                                <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" onclick="showModal({{$archivo->id}})">add</span>
                               <!---------------boton eliminar---------->
                                <form action="{{route("eliminar_folder",['id'=>$archivo->id])}}" method="post" class="Eliminar">
                                    @csrf
                                    <button class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</button>
                                </form>
                                <!-----------------boton editar------------>
                                <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer" onclick="editar('{{$archivo->nombre}}','{{$archivo->id}}')">edit_square</span>
                            </div>
                            </th>
                        </tr>  
                        @endif
                        
                        @includeWhen($archivo->archivos->isNotEmpty(), 'agregarRecursivo', ['archivos' => $archivo->archivos,'id_folder'=>$archivo->id,'ruta'=>'/'.$archivo->nombre])
                        
                        
                    @endif
                    

                @endif
                    
                @endforeach
                
                 
                
             </tbody>
         </table>
     </div>
    <!---------------MODAL de registro de archivos--------------------->
     <dialog id="modal" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <div>
            <form action="{{ route('registro_archivos',['id'=>$indicador->id])}}" method="POST" id="form">
            @csrf
<!---id del folder al que pertenece---->
            <input type="hidden" id="folderId" name='folderId' value="@if (old('folderId')!='') {{old('folderId')}}@else 0 @endif">
<!-----select de tipo-------------------->
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar</h3>
            <label class="font-thin">Tipo</label><br>
            <select name="archivo" class="bg-zinc-200 rounded-lg w-full p-2" id="tipo" onchange="cambiar()">
            <option value="Archivo">Archivo</option>
            <option value="Carpeta">Carpeta</option>
            </select><br>
            
<!-----------input de nombre de archivo------------->
            
            <div id='inputFolder' hidden>
                <label class="font-thin" for="inputFolder" >Nombre </label><br>
                <input type="text" name="nombre_archivo" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('nombre_archivo')}}"><br>
                @error('nombre_archivo')
                <span class="text-red-700"> {{ $message }}</span><br>
                @enderror
            </div><br>
<!----------input de archivos------------------->
            <input type="file" id="inputFile">
            
            
<!---------botones guardar/cancelar---------------->
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button  type="submit"  class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar" style="display: none">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg text-center" id="cancelar" href="/reporte_archivos/{{$indicador->id}}">Cancelar</a>
            </div>
            </form>
        </div>
    </dialog>

<!-------------dialog editar nombre folder---------------->
    <dialog id="folderE" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3" >
        <div>
            <form action="" method="POST" id="formEdit" class="Editar">
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar Carpeta</h3>
                <label class="font-thin">Nombre de la carpeta</label><br>
                <input type="text" name="editNombre" id="editNombre" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('editNombre')}}"><br>
                @error('editNombre')
                <span class="text-red-700"> {{ $message }}</span><br>
                @enderror
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarC">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg text-center" id="cancelarC" href="/reporte_archivos/{{$indicador->id}}">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>

<!---------------abrir modal de edicion cuando se envien errores-------------->
@if ($errors->has('editNombre'))
    <script>
       var formEdit=document.getElementById('formEdit');
        formEdit.action='/editar_folder/'+{{$errors->first('id')}};
        var dialog=document.getElementById('folderE');
         dialog.showModal();
    </script>
@endif
    

@endsection
<!--------------js section---------------->
@section("js")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        var agregar=document.getElementById("agregar");
        var modal=document.getElementById("modal");
        agregar.onclick=function(){modal.showModal()}


        var guardarC=document.getElementById("guardarC");
        var cancelar=document.getElementById("cancelar");
        
       
        var cancelarC=document.getElementById("cancelarC");
        
        var archivo=document.getElementById("archivo");
        var folder1=document.getElementById("folderE");

        guardarC.onclick=function(){
            folder1.close()
        }

        cancelar.onclick=function(){
            modal.close()
        }

        
        cancelarC.onclick=function(){
            folder1.close()
        }

//----------------Abrir modal Editar------------------
        function editar(nombre, id){
          var  folder=document.getElementById('formEdit');
            folder.action='/editar_folder/'+id;
           var editNombre=document.getElementById('editNombre');
            editNombre.value=nombre;
          // var dialogEditar=document.getElementById('folder');
          //console.log(folder1);
           folder1.showModal();
        }
//-------------------------Abrir modal para agregar a otras carpetas---------------------
        function showModal(id){
          var folderId=document.getElementById('folderId');
            folderId.value=id;
           
            modal.showModal()
        }
//-----------------Despliegue de folders----------------------
        function mostrar(id){   
           var filas=document.getElementsByClassName(id);
            for (let index = 0; index < filas.length; index++) {
                if(filas[index].style.display=='none'){
                    filas[index].style.display='table-row';
                }else{
                    
                    if(filas[index].classList.contains('folder')){
                        filas[index].style.display='none';
                        deshabilitar(filas[index].id);
                    }else{
                        filas[index].style.display='none';
                    }
                   
                }
                
            }
        
        }
//---------------Repliegue de folders-------------------------------------
        function deshabilitar(id){
           var filas=document.getElementsByClassName(id);
            
            for (let index = 0; index < filas.length; index++) {
                
                if(filas[index].classList.contains('folder')){
                        filas[index].style.display='none';
                        deshabilitar(filas[index].id);
                    }else{
                        filas[index].style.display='none';
                    }
                   
            }
        }
//----------------------Cambiar tipo archivo para añadir--------------------------
        function cambiar(){
          var  select=document.getElementById('tipo');

           var folder=document.getElementById('inputFolder');
           var archivos=document.getElementById('inputFile');
          var  guardarBoton=document.getElementById("guardar");
          var  form=document.getElementById("form");


            select=select.options[select.selectedIndex].text;
            console.log(select);
            if(select=="Archivo"){
                folder.style.display='none';
                archivos.style.display='block';
                guardarBoton.style.display='none';
                form.action="{{ route('registro_archivos',['id'=>$indicador->id])}}";
            }else{
                folder.style.display='block';
                archivos.style.display='none';
                guardarBoton.style.display='inline';
                form.action="{{ route('registro_folder',['id'=>$indicador->id])}}";

            }
        }

        //Confirmacion de eliminacion
    $('.Eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres eliminar el archivo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
            }).then((result) => {
                  if (result.isConfirmed) {
                  this.submit();
            }
            })
      });
      /******************************************************************/
      //Confirmacion de edicion
      
      $('.Editar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres guardar los cambios?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
            }).then((result) => {
                  if (result.isConfirmed) {
                  this.submit();
            }else{
                folder1.showModal();
            }
            })
      });
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>


<script>
    const LABELS = {
        title: `
          <span class="text-uppercase text-bold text-navy">Arrastre y suelte sus archivos</span>
          <span class="filepond--label-action text-uppercase text-navy">aqui</span>
      `,
        invalid: 'el campo contiene archivos no válidos',
        done: 'carga completa'
    };
</script>

<script>
    FilePond.registerPlugin(FilePondPluginFileValidateType);
   $('#inputFile').filepond({
       
       name: 'document',
       instantUpload: false,
       allowMultiple: true,
       maxFiles: 10,
       acceptedFileTypes: ['application/pdf'],
       server: {
           url: "{{ route('registro_archivos',['id'=>$indicador->id])}}",
           process: {
               headers: {
                   'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
               onload: (response) => {
                   console.log(response, 'ONLOAD');
                   // window.location.reload(true)
               },
               ondata: (formData) => {
                   formData.append('token', "{{ csrf_token() }}");
                   formData.append('tipo', $('#archivo').val());
                   formData.append('folderId',$('#folderId').val());

                   return formData;
               }
           },
           fetch: null,
           revert: null
       },
       labelIdle: LABELS.title,
       labelInvalidField: LABELS.invalid,
       labelFileTypeNotAllowed: LABELS.invalid,
       labelFileProcessingComplete: LABELS.done,
       onprocessfiles: function() {
          // console.log(this);
         //  console.log('todos los files han sido cargados');
           location.reload();
       },
       onwarning: function(error, file, status) {
           //console.log('WARNING...', error, status);
       },
       onerror: function(error, file, status) {
          // console.log('ERROR...', error, status, file);
       },
       onprocessfile: function(error, file) {
          // console.log(this);
          // console.log('UN ARCHIVO PROCESASO', error, file);
       }
   });

</script>

@if ($errors->has('nombre_archivo'))
           
    <script>
        document.getElementById("tipo").options.item(1).selected = 'selected';
        
           console.log("{{old('archivo')}}");

            folder=document.getElementById('inputFolder');
            archivos=document.getElementById('inputFile');
            guardarBoton=document.getElementById("guardar");
            form=document.getElementById("form");
            

           
                folder.style.display='block';
                archivos.style.display='none';
                guardarBoton.style.display='inline';
                form.action="{{ route('registro_folder',['id'=>$indicador->id])}}";
           
            
        
        var modal=document.getElementById("modal");
        modal.showModal()

    </script>
    
    @endif



@endsection