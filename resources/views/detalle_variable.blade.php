@extends("header")
@section("main")
<div class="grid grid-cols-1 md:grid-cols-3 pb-10">
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$variable->area->numero_area}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-2xl">{{$variable->area->name}}</h1></div>
    </div> 
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$variable->area->numero_area.".".$variable->numero_variable}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full font-thin text-xs md:text-xs lg:text-base">{{$variable->name}}</h1></div>
    </div>
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{($variable->indicadores->where('activo',1))->count()}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-2xl">Indicadores</h1></div>

    </div>
</div>
<div class="bg-slate-200  py-4 shadow shadow-slate-400 mb-10">
    <div class="pl-5"><a href="{{route('reporte_variables',['id'=>$variable->area->id])}}">{{$variable->area->name}} ></a>{{$variable->name}}</div>
</div>

<div class="mt-10 grid grid-cols-10">
    <div class="col-span-6 md:col-span-8 lg:col-span-9">
        <h3 class="cursor-pointer text-xl md:text-3xl justify-self-start">Indicadores</h3>
    </div>
     @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
     <div class="flex justify-center items-center text-white p-2 rounded-xl col-span-4 cursor-pointer md:col-span-2 lg:col-span-1" id="agregar">
        <span class="material-symbols-outlined">add</span>
        <span>Agregar</span>
    </div>
     @endif
</div>
     <div class="flex justify-center">
         <table class="w-5/6 mt-5 border-collapse table-auto">
             <thead class="border-2 border-b-black  border-x-white border-t-white">
                 <tr>
                     <th>#</th>
                     <th class="text-left">Nombre</th>
                     @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
                     <th>Accion</th>  
                     @endif

                 </tr>
             </thead>
             <tbody>
                @foreach ($variable->indicadores as $indicador)
                    @if ($indicador->activo==1)
                    <tr class="border border-y-stone-400 border-x-white">
                        <th class="font-thin text-sm md:text-lg">{{$variable->area->numero_area}}.{{$variable->numero_variable}}.{{$indicador->numero_indicador}}</th>

                        <th class="font-thin text-sm text-left md:text-lg"><a href="{{route('reporte_archivos',['id'=>$indicador->id])}}">{{$indicador->descripcion}}</a></th>

                        @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
                        <th>
                            <div class="grid grid-cols-2">
                                <form action="{{route("eliminar_indicador",['id'=>$indicador->id])}}" method="post" class="Eliminar">
                                    @csrf
                                    <button class="material-symbols-outlined font-extralight text-xl md:text-3xl cursor-pointer">delete</button>
                                </form>
                                
                                <span class="material-symbols-outlined font-extralight text-xl md:text-3xl text-left cursor-pointer" onclick="editar({{$indicador->id}},{{$indicador->numero_indicador}},'{{$indicador->descripcion}}','{{$indicador->tipo}}',{{$indicador->criterios}})">edit_square</span>
                            </div>
                        </th>
                        @endif
                    </tr>
                    @endif
                    
                @endforeach
               
             </tbody>
         </table>
     </div>

     <!----------------------------AGREGAR------------------------------------------------>
    <dialog id="modal" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <form action="{{route('registro_indicador',['id'=>$variable->id])}}" method="post">
            @csrf
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nuevo indicador</h3>

            <label class="font-thin">Número de indicador</label><br>
            <input type="text" name="numero_indicador" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('numero_indicador')}}"><br>
            @if ($errors->has('numero_indicador'))
            <span class="text-red-700"> {{ $errors->first('numero_indicador') }}</span><br>
            @endif

            <label class="font-thin">Descripcion</label><br>
            <input type="text" name="descripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('descripcion')}}"><br>
            @if ($errors->has('descripcion') )
            <span class="text-red-700"> {{ $errors->first('descripcion') }}</span><br>
            @endif
            
            <label class="font-thin">Tipo de indicador</label><br>
            <select name="tipo_indicador" >
                <option value="RMA" @if(old('tipo_indicador') == "RMA") selected @endif>RMA </option>
                <option value="RC" @if(old('tipo_indicador') == "RC") selected @endif >RC </option>
            </select><br>

            <label class="font-thin">Criterios de calificación </label><br>
            @foreach ($criterios as $criterio)
                <label>
                <input type="checkbox" name="criterios[]" value="{{ $criterio->id }}"
                @if (old('criterios')!=null)
                    @foreach (old('criterios') as $item)
                        @if ($criterio->id==$item)
                checked
                        @endif
                    @endforeach
                @endif
                > {{$criterio->nombre}}
               </label><br>
            @endforeach
            @if ($errors->has('criterios') )
            <span class="text-red-700"> {{ $errors->first('criterios') }}</span><br>
            @endif
            

            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg text-center" id="cancelar" href="/reporte_indicadores/{{$variable->id}}">Cancelar</a>
            </div>
        </div>
    </form>
    </dialog>
    <!----------------------------FIN AGREGAR------------------------------------------------>

    <!----------------------------EDITAR------------------------------------------------>
    <dialog id="modal_editar" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <form action="" method="post" id="editar" class="Editar">
            @csrf
            <div>
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar indicador</h3>
    
                <label class="font-thin">Número de indicador</label><br>
                <input type="text" name="EditNumero_indicador"  id="EditNumero_indicador" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditNumero_indicador')}}"><br>
                @if ($errors->has('EditNumero_indicador'))
                <span class="text-red-700"> {{ $errors->first('EditNumero_indicador') }}</span><br>
                @endif
    
                <label class="font-thin">Descripcion</label><br>
                <input type="text" name="EditDescripcion" id="EditDescripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditDescripcion')}}"><br>
                @if ($errors->has('EditDescripcion') )
                <span class="text-red-700"> {{ $errors->first('EditDescripcion') }}</span><br>
                @endif
                
                <label class="font-thin">Tipo de indicador</label><br>
                <select name="EditTipo_indicador" id="EditTipo_indicador">
                    <option value="RMA" @if(old('EditTipo_indicador') == "RMA") selected @endif>RMA</option>
                    <option value="RC"@if(old('EditTipo_indicador') == "RC") selected @endif>RC</option>
                </select><br>
    
                <label class="font-thin">Criterios de calificación</label><br>
                @foreach ($criterios as $criterio)
                <label>
                <input type="checkbox" name="EditCriterios[]" value="{{ $criterio->id }}"
                @if (old('EditCriterios')!=null)
                    @foreach (old('EditCriterios') as $item)
                        @if ($criterio->id==$item)
                checked
                        @endif
                    @endforeach
                @endif
                > {{$criterio->nombre}}
               </label><br>
            @endforeach
                @if ($errors->has('EditCriterios') )
                <span class="text-red-700"> {{ $errors->first('EditCriterios') }}</span><br>
                @endif
               
    
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarE">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg text-center" id="cancelarE" href="/reporte_indicadores/{{$variable->id}}">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>
    <!-------------------------------FIN EDITAR--------------------------------------------->

    <!------------------ABRIR MODAL DE REGISTRO----------------------------------->
    @if ($errors->has('descripcion') || $errors->has('numero_indicador'))
           
            <script>
                var modal=document.getElementById("modal");
                modal.showModal()
                
            </script>
            
    @endif

    <!-----------------------ABRIR MODAL DE EDICION---------------------------->
    @if ($errors->has('EditDescripcion') || $errors->has('EditNumero_indicador') || $errors->has('EditCriterios'))
           
            <script>
                var modal_editar=document.getElementById("modal_editar");
                modal_editar.showModal();
              
                var editar=document.getElementById("editar");
                editar.action="/editar_indicador/"+{{$errors->first('id')}}
                console.log(editar.action);
            </script>
            
    @endif
@endsection
@section("js")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        //Modal registrar-----------------------------------------
        var agregar=document.getElementById("agregar");
        var modal=document.getElementById("modal");
        agregar.onclick=function(){modal.showModal()}
        
        
         //Modal editar ------------------------------------------
        var modal_editar=document.getElementById("modal_editar");
        var EditNumero_indicador=document.getElementById("EditNumero_indicador");
        var EditDescripcion=document.getElementById("EditDescripcion");
        var EditTipo_indicador=document.getElementById("EditTipo_indicador");
        var guardarE=document.getElementById("guardarE");   
        guardarE.onclick=function(){
            modal_editar.close()
        }
        var EditCriterios=document.getElementsByName("EditCriterios[]");
            function editar(id,numero_indicador,descripcion,tipo,criterios){
                modal_editar.showModal();


                EditDescripcion.value=descripcion;
                EditNumero_indicador.value=numero_indicador;

                
                EditTipo_indicador.innerHTML='';

                if(tipo=='RMA'){
                    EditTipo_indicador.innerHTML="<option value='RMA' @selected(old('EditTipo_indicador') == 'RMA') selected>RMA</option> <option value='RC'@selected(old('EditTipo_indicador') == 'RC')>RC</option>";
                }else{
                    EditTipo_indicador.innerHTML="<option value='RMA' @selected(old('EditTipo_indicador') == 'RMA')>RMA</option> <option value='RC'@selected(old('EditTipo_indicador') == 'RC') selected>RC</option>";
                }
                
                console.log(criterios);
                EditCriterios.forEach(element => {
                    
                    criterios.forEach(element1 => {
                        
                        if(element.value==element1.id && element1.pivot.activo==1){
                            element.checked=true;
                        }
                    });
                });
                var editar=document.getElementById("editar");
                editar.action="/editar_indicador/"+id
            }
        
//Confirmacion de eliminacion
$('.Eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres eliminar la variable?',
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