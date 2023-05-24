@extends("header")
@section("main")
    <div class="grid grid-cols-3 pb-10 pt-10 pl-20">
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$indicador->variable->area->numero_area}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-xl font-thin pl-10">{{$indicador->variable->area->name}}</h1></div>
        </div> 
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$indicador->variable->numero_variable}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-sm font-thin pl-12">{{$indicador->variable->name}}</h1></div>
        </div>
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$indicador->numero_indicador}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-sm font-thin pl-12">{{$indicador->descripcion}}</h1></div>
        </div>
    </div>
    <div class="bg-slate-200 grid grid-cols-12 py-4 shadow shadow-slate-400 mb-5">
        <div class="col-start-2 col-span-6"><a href="">{{$indicador->variable->area->name}}</a> > <a href="">{{$indicador->variable->name}}</a> > {{$indicador->descripcion}}</div>
    </div>


    <div class="flex justify-center">
        <div class="w-5/6 mt-5 grid grid-cols-10">
             <h3 class="p-2 cursor-pointer">Archivos</h3>
             <div class="flex justify-center items-center bg-sky-950 text-white p-2 rounded-xl col-start-10 cursor-pointer" id="agregar">
                 <span class="material-symbols-outlined">add</span>
                 <span>Agregar</span>
             </div>
        </div>
     </div>
     <div class="flex justify-center">
         <table class="w-5/6 mt-5 border-collapse table-auto">
             <thead class="border-4 border-b-black  border-x-white border-t-white">
                 <tr>
                     <th>Tipo</th>
                     <th class="text-left">Nombre</th>
                     <th>Accion</th>
                 </tr>
             </thead>
             <tbody>
                
                @foreach ($archivos->sortBy('tipo') as $archivo)
               
                @if ($archivo->tipo=='archivo')

                    @if (Auth::user()->carrera_id!= NULL )
                        
                        @if ($archivo->carrera_id==Auth::user()->carrera_id || $archivo->carrera_id==null )
                            <tr class="border-2 border-y-black border-x-white">
                                <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">picture_as_pdf</span></th>
                                <th class="font-thin text-xl text-left"><a href="{{ asset($archivo->url) }}" target="_blank" >{{$archivo->nombre}}</a></th>
                                <th>
                                <div class="grid grid-cols-3">
                                    <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" ><a href="{{ asset($archivo->url) }}"> visibility</a></span>
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
                        <tr class="border-2 border-y-black border-x-white">
                            <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">picture_as_pdf</span></th>
                            <th class="font-thin text-xl text-left"><a href="{{ asset($archivo->url) }}" target="_blank" >{{$archivo->nombre}}</a></th>
                            <th>
                            <div class="grid grid-cols-3">
                                <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" ><a href="{{ asset($archivo->url) }}" target="_blank" > visibility</a></span>
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
                            <tr class="border-2 border-y-black border-x-white">
                                <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" onclick="mostrar({{$archivo->id}})">folder</span></th>
                                <th class="font-thin text-xl text-left">{{$archivo->nombre}}</th>
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
                            
                            @includeWhen($archivo->archivos->isNotEmpty(), 'agregarRecursivo', ['archivos' => $archivo->archivos,'id_folder'=>$archivo->id])
                            
                        @endif
                    
                   
                    @else
                    <!----------------cuando el usuario es elsuperadmin------------------>
                        
                        @if ($archivo->carrera_id==null)
                        <tr class="border-2 border-y-black border-x-white">
                            <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" onclick="mostrar({{$archivo->id}})">folder</span></th>
                            <th class="font-thin text-xl text-left">{{$archivo->nombre}}</th>
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
                        
                        @includeWhen($archivo->archivos->isNotEmpty(), 'agregarRecursivo', ['archivos' => $archivo->archivos,'id_folder'=>$archivo->id])
                        
                        
                    @endif
                    

                @endif
                    
                @endforeach
                
                 
                
             </tbody>
         </table>
     </div>
    <!---------------MODAL de registro de archivos--------------------->
     <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <div>
            <form action="{{ route('registro_archivos',['id'=>$indicador->id])}}" method="POST" id="form">
            @csrf
<!---id del folder al que pertenece---->
            <input type="hidden" id="folderId" name='folderId' value="@if (old('nombre_archivo')!='') {{old('nombre_archivo')}}@else 0 @endif">
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
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar" href="/reporte_archivos/{{$indicador->id}}">Cancelar</a>
            </div>
            </form>
        </div>
    </dialog>

<!-------------dialog editar nombre folder---------------->
    <dialog id="folder" class="w-1/3 rounded-lg px-20" >
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
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelarC" href="/reporte_archivos/{{$indicador->id}}">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>

<!---------------abrir modal de edicion cuando se envien errores-------------->
@if ($errors->has('editNombre'))
    <script>
        folder=document.getElementById('formEdit');
        folder.action='/editar_folder/'+{{$errors->first('id')}};
         $dialog=document.getElementById('folder');
         $dialog.showModal();
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
        var folder=document.getElementById("folder");

        guardarC.onclick=function(){
            folder.close()
        }

        cancelar.onclick=function(){
            modal.close()
        }

        
        cancelarC.onclick=function(){
            folder.close()
        }

//----------------Abrir modal Editar------------------
        function editar(nombre, id){
            folder=document.getElementById('formEdit');
            folder.action='/editar_folder/'+id;
            editNombre=document.getElementById('editNombre');
            editNombre.value=nombre;
            dialog=document.getElementById('folder');
            dialog.showModal();
        }
//-------------------------Abrir modal para agregar a otras carpetas---------------------
        function showModal(id){
            folderId=document.getElementById('folderId');
            folderId.value=id;
           
            modal.showModal()
        }
//-----------------Despliegue de folders----------------------
        function mostrar(id){   
            filas=document.getElementsByClassName(id);
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
            filas=document.getElementsByClassName(id);
            
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
            select=document.getElementById('tipo');

            folder=document.getElementById('inputFolder');
            archivos=document.getElementById('inputFile');
            guardarBoton=document.getElementById("guardar");
            form=document.getElementById("form");


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
      /*
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
                modalE.showModal();
            }
            })
      });*/
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