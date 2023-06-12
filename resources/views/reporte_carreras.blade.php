@extends("header")
@section("main")
<<<<<<< HEAD
<div class="flex justify-center">
    <div class="w-full lg:w-4/6 mt-10 grid grid-cols-10">
        <div class="col-span-6 md:col-span-8 lg:col-span-8">
            <h3 class="cursor-pointer text-xl md:text-3xl justify-self-start">Carreras</h3>
        </div>
         <div class="flex justify-center items-center text-white p-2 rounded-xl col-span-4 cursor-pointer md:col-span-2 lg:col-span-2" id="agregar">
            <span class="material-symbols-outlined">add</span>
            <span>Agregar</span>
        </div>
    </div>
</div>
    <div class="overflow-x-auto">
        <table class=" w-full lg:w-4/6 mt-5 border-collapse table-auto" id='tabla'>
            <thead class="border-2 border-b-black  border-x-white border-t-white">
=======
    <div class="flex justify-center">
       <div class="w-4/6 mt-10 grid grid-cols-10 gap-1">
            <h3 class="p-2 ">Carreras</h3>
            <a href="{{route('reporte_carreras_PDF')}}" id="descargar" class="flex justify-center items-center bg-sky-950 text-white p-2 col-span-2 col-start-7 rounded-xl cursor-pointer">
                <span class="material-symbols-outlined icono">download_for_offline</span>
                <span>Reporte</span>
            </a>
            <div class="flex justify-center items-center bg-sky-950 text-white p-2 rounded-xl col-start-9 cursor-pointer col-span-2 " id="agregar">
                <span class="material-symbols-outlined icono">add</span>
                <span>Agregar</span>
            </div>
       </div>
    </div>
    <div class="flex justify-center">
        <table class="w-4/6 mt-5 border-collapse table-auto">
            <thead class="border-4 border-b-black  border-x-white border-t-white">
>>>>>>> f3e4efaf6976b7dc9ca3ccebd61fa765576af7cc
                <tr>
                    <th>#</th>
                    <th>Codigo</th>
                    <th>Carrera</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $key=>$carrera )
                <tr class="border border-y-stone-400 border-x-white">
                    <th class="font-thin text-sm lg:text-xl">{{$key+1}}</th>
                    <th class="font-thin text-sm lg:text-xl">{{$carrera->codigo}}</th>
                    <th class="font-thin text-sm lg:text-xl">{{$carrera->name}}</th>
                    <th>
                        <div class="grid grid-cols-3">
                            <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" onclick="report({{$carrera->gestiones}})">description</span>
                            <form class="Eliminar" action="{{route("eliminar_carrera",['id'=>$carrera->id])}}" method="post">
                                @csrf<button class="material-symbols-outlined font-extralight lg:text-3xl cursor-pointer">delete</button>
                            </form>
                            <span class="material-symbols-outlined font-extralight lg:text-3xl text-left cursor-pointer" onclick="editar({{$carrera->id}},'{{$carrera->name}}')">edit_square</span>
                        </div>
                    </th>
                </tr> 
                @endforeach

            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <form action="{{route('registro_carrera')}}" method="post">
            @csrf
            <div>
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nueva carrera</h3>
                <label class="font-thin">Nombre</label><br>
                <input type="text" name="name" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('name')}}"><br>
                @if ($errors->has('name'))
                <span class="text-red-700">{{ $errors->first('name') }}</span>
                @endif <br>
                <label class="font-thin">Codigo</label><br>
                <input type="text" name="codigo" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('codigo')}}"><br>
                @if ($errors->has('codigo'))
                <span class="text-red-700">{{ $errors->first('codigo') }}</span>
                @endif <br>
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelar" href="{{route('reporte_carreras')}}">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>

    <dialog id="modal_editar" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <form action="" method="post" id="editar" class="Editar">
            @csrf
            <div>
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar carrera</h3>
                <label class="font-thin">Nombre</label><br>
                <input type="text" name="nameE" class="bg-zinc-200 rounded-lg w-full p-2" id="nameE" value="{{old('nameE')}}"><br>
                @if ($errors->has('nameE'))
                <span class="text-red-700">{{ $errors->first('nameE') }}</span>
                @endif <br>
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarE">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelarE" href="{{route('reporte_carreras')}}">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>

    <dialog id="modalReporte" class="w-1/3 rounded-lg px-20">
        <div>
            <form action="{{route('reporte_carrera')}}" method="post" id='reporte'>
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Generar Reporte</h3>
            
                <label class="font-thin">Gestión</label><br>
                <select name="gestion" id="gestion">
                    <option value="">No hay gestiones</option>
                </select><br>
                @error('gestion')
                <span class="text-red-700"> Debe seleccionar una gestión</span><br>
               @enderror
                <label class="font-thin">Tabla  {{old('Tabla')}}</label><br>
                <input type="checkbox" name="Tabla" @if (old('Tabla')=='on')
                    checked
                @endif> Tabla<br>
                <input type="radio"  name="Nivel" checked value="1"> Nivel 1  
                <input type="radio" name="Nivel" value="2" @if (old('Nivel')=='2')
                    checked
                @endif> Nivel 2
                <input type="radio" name="Nivel" value="3" @if (old('Nivel')=='3')
                    
                @endif> Nivel 3
                <br>
                <label class="font-thin" >Gráficos</label><br>
                <input type="checkbox" name="Roseta" @if (old('Roseta')=='on')
                    checked
                @endif> Roseta <br>
                <input type="checkbox" name="Barras" @if (old('Barras')=='on')
                    checked
                @endif> Barras <br>
               @error('Tabla')
                <span class="text-red-700"> Debe seleccionar al menos un campo</span><br>
               @enderror
                 <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarR">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelarR" href="{{route('reporte_carreras')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>


    @if ($errors->has('name') || $errors->has('codigo'))
        <script>
            agregar=document.getElementById("modal");
            agregar.showModal();
        </script>
    @endif
    @if ($errors->has('nameE'))
        <script>
            var modal_editar=document.getElementById('modal_editar');
            modal_editar.showModal();
            
            var editar=document.getElementById('editar');
            editar.action="/editar_carrera/"+{{$errors->first('id')}};
        </script>
    @endif

    @if ($errors->has('Tabla') || $errors->has('gestion'))
    <script>
        
        var gestiones=localStorage.getItem('gestiones');
        var select=document.getElementById("gestion");
        
        gestiones=JSON.parse(gestiones);
        console.log(gestiones);
        if(gestiones!=null){
            select.innerHTML="";
            gestiones.forEach(element => {
            select.innerHTML+="<option value='"+element['id']+"'>"+element['año']+"</option>";
        });
        }
        
        var modalReporte=document.getElementById("modalReporte");
        modalReporte.showModal();
    </script>
@endif
@endsection
@section("js")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        //Modal registrar carrera
        var agregar=document.getElementById("agregar");
        var modal=document.getElementById("modal");
        agregar.onclick=function(){modal.showModal()}
        var guardar=document.getElementById("guardar");
        var cancelar=document.getElementById("cancelar");
        var cancelarR=document.getElementById("cancelarR");
        cancelarR.onclick=function(){
            localStorage.removeItem('gestiones');
        }

        guardar.onclick=function(){
            modal.close()
        }
        cancelar.onclick=function(){
            modal.close()
        }
        /*************************************************/
        //Modal editar carrera
        var modal_editar=document.getElementById("modal_editar");
        var nameE=document.getElementById("nameE");
            function editar(id,name){
                modal_editar.showModal();
                var editar=document.getElementById("editar");
                nameE.value=name;
                editar.action="/editar_carrera/"+id
                console.log(editar.action);
            }
        var guardar=document.getElementById("guardarE"); 
        guardarE.onclick=function(){
            modal_editar.close()
        }
        cancelarE.onclick=function(){
            modal_editar.close()
        }
 /*************************************************/
        //Modal reporte carrera
        var modalR=document.getElementById("modalReporte");
        function report(gestiones){
            var select=document.getElementById("gestion");
            select.innerHTML="";
            if(gestiones.length!=0){
               //console.log(gestiones.length);
                localStorage.setItem('gestiones',JSON.stringify(gestiones));
                gestiones.forEach(element => {
                    select.innerHTML+="<option value='"+element['id']+"'>"+element['año']+"</option>";
                   // console.log(element);
                });
            }else{
               
                select.innerHTML+="<option value=''>No hay gestiones</option>";
            }
            modalR.showModal();
        }
        /**********************************************************/
        //Confirmacion de eliminacion
        $('.Eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres eliminar la carrera?',
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
                modal_editar.showModal();
            }
            })
      });
    </script>
@endsection