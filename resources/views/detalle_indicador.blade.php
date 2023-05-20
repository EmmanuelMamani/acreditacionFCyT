@extends("header")
@section("main")
    <div class="grid grid-cols-3 pb-10 pt-10 pl-20">
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$indicador->variable->area->numero_area}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-xl font-thin pl-10">{{$indicador->variable->area->name}}</h1></div>
        </div> 
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$indicador->variable->numero_variable}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-sm font-thin pl-10">{{$indicador->variable->name}}</h1></div>
        </div>
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$indicador->numero_indicador}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin pl-5">{{$indicador->descripcion}}</h1></div>
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
                 <tr class="border-2 border-y-black border-x-white">
                     <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">picture_as_pdf</span></th>
                     <th class="font-thin text-xl text-left">Resolucion creacion sis</th>
                     <th>
                        <div class="grid grid-cols-3">
                            <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">visibility</span>
                            <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</span>
                            <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer">edit_square</span>
                        </div>
                     </th>
                 </tr>
                 <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">folder</span></th>
                    <th class="font-thin text-xl text-left">Resoluciones honorable consejo de carreras</th>
                    <th>
                       <div class="grid grid-cols-3">
                           <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">add</span>
                           <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</span>
                           <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer">edit_square</span>
                       </div>
                    </th>
                </tr>
                </tr>
             </tbody>
         </table>
     </div>

     <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar</h3>
            <label class="font-thin">Gestion</label><br>
            <select name="archivo" class="bg-zinc-200 rounded-lg w-full p-2" id="archivo">
            <option value="">Archivo</option>
            <option value="">Carpeta</option>
            </select><br>
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <button class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar">Cancelar</button>
            </div>
        </div>
    </dialog>


    <dialog id="folder" class="w-1/3 rounded-lg px-20">
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar Carpeta</h3>
            <label class="font-thin">Nombre de la carpeta</label><br>
            <input type="text" name="nombre" class="bg-zinc-200 rounded-lg w-full p-2"><br>
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarC">Guardar</button>
                <button class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelarC">Cancelar</button>
            </div>
        </div>
    </dialog>
@endsection
@section("js")
    <script>
        var agregar=document.getElementById("agregar");
        var modal=document.getElementById("modal");
        agregar.onclick=function(){modal.showModal()}
        var guardar=document.getElementById("guardar");
        var cancelar=document.getElementById("cancelar");
        
        var guardarC=document.getElementById("guardarC");
        var cancelarC=document.getElementById("cancelarC");
        
        var archivo=document.getElementById("archivo");
        var folder=document.getElementById("folder");
        guardar.onclick=function(){
            modal.close()
            if(archivo.options[archivo.selectedIndex].text == "Carpeta"){
                folder.showModal()
            }
        }
        cancelar.onclick=function(){
            modal.close()
        }

        guardarC.onclick=function(){
            folder.close()
        }
        cancelarC.onclick=function(){
            folder.close()
        }
    </script>
@endsection