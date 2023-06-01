@extends("header")
@section("main")
<div class="grid grid-cols-1 md:grid-cols-3 pb-10">
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$area->numero_area}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-2xl">{{$area->name}}</h1></div>
    </div> 
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$area->variables->count()}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-2xl">Variables</h1></div>
    </div>
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$area->variables->sum(function ($product) {return count($product->indicadores);});}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-2xl">Indicadores</h1></div>
    </div>
</div>
    <div class="bg-slate-200  py-4 shadow shadow-slate-400 mb-10">
        <div class="pl-5">{{$area->name}}</div>
    </div>

        <div class="mt-10 grid grid-cols-10">
            <div class="col-span-6 md:col-span-8 lg:col-span-9">
                <h3 class="cursor-pointer text-3xl justify-self-start">Variables</h3>
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
             <thead class="border-4 border-b-black  border-x-white border-t-white">
                 <tr>
                     <th class="text-xl">#</th>
                     <th class="text-left text-xl">Nombre</th>
                     @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
                     <th class="text-xl">Accion</th>
                     @endif
                 </tr>
             </thead>
             <tbody>
                @foreach ($area->variables as $variable)
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-sm lg:text-lg">{{$area->numero_area.'.'.$variable->numero_variable}}</th>
                    <th class="font-thin text-sm text-left lg:text-lg"><a href="{{route('reporte_indicadores',['id'=>$variable->id])}}">{{$variable->name}}</a></th>
                    @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
                    <th>
                        <div class="grid grid-cols-3">
                            
                            <form action="{{route("eliminar_variable",['id'=>$variable->id])}}" method="post" class="Eliminar">
                                @csrf
                                <button class="material-symbols-outlined font-extralight text-2xl cursor-pointer">delete</button>
                            </form>
       
                            <span class="material-symbols-outlined font-extralight text-2xl text-left cursor-pointer" onclick="editar2({{$variable->id}},'{{$variable->name}}',{{$variable->numero_variable}})">edit_square</span>
                        </div>
                    </th>
                    @endif
                </tr>
                @endforeach
             </tbody>
         </table>
     </div>

     <!----------------------------AGREGAR------------------------------------------------>
    <dialog id="modal" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <form action="{{route('registro_variable',['id'=>$area->id])}}" method="post">
            @csrf
        <div>
            <h3 class="text-center font-thin text-gray-500  text-xl">Agregar nueva variable</h3>

            <label class="font-thin">Número de variable</label><br>
            <input type="text" name="numero_variable" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('numero_variable')}}"><br>
            @if ($errors->has('numero_variable'))
            <span class="text-red-700"> {{ $errors->first('numero_variable') }}</span><br>
            @endif

            <label class="font-thin">Descripcion</label><br>
            <input type="text" name="descripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('descripcion')}}"><br>
            @if ($errors->has('descripcion') )
            <span class="text-red-700"> {{ $errors->first('descripcion') }}</span><br>
            @endif
            
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg text-center" id="cancelar" href="/reporte_variables/{{$area->id}}">Cancelar</a>
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
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar variable</h3>
                <label class="font-thin">Descripción</label><br>
                <input type="text" name="EditDescripcion" id="EditDescripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditDescripcion')}}"><br>
                @if ($errors->has('EditDescripcion') )
                <span class="text-red-700"> {{ $errors->first('EditDescripcion') }}</span><br>
                @endif
                <label class="font-thin">Número de variable</label><br>
                <input type="text" name="EditNumero_variable" id="EditNumero_variable" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditNumero_variable')}}"><br>
                @if ($errors->has('EditNumero_variable'))
                <span class="text-red-700"> {{ $errors->first('EditNumero_variable') }}</span><br>
                @endif
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarE">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg text-center" id="cancelarE" href="/reporte_variables/{{$area->id}}">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>
    <!-------------------------------FIN EDITAR--------------------------------------------->

    <!------------------ABRIR MODAL DE REGISTRO----------------------------------->
    @if ($errors->has('descripcion') || $errors->has('numero_variable'))
           
            <script>
                var modal=document.getElementById("modal");
                modal.showModal()
                
            </script>
            
    @endif

    <!-----------------------ABRIR MODAL DE EDICION---------------------------->
    @if ($errors->has('EditDescripcion') || $errors->has('EditNumero_variable'))
           
            <script>
                var modal_editar=document.getElementById("modal_editar");
                modal_editar.showModal();
              
                var editar=document.getElementById("editar");
                editar.action="/editar_variable/"+{{$errors->first('id')}}
                
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
        var guardar=document.getElementById("guardar");
        var cancelar=document.getElementById("cancelar");
        
        
         //Modal editar ------------------------------------------
        var modal_editar=document.getElementById("modal_editar");
        var descripcionE=document.getElementById("EditDescripcion");
        var numero_variableE=document.getElementById("EditNumero_variable");
            function editar2(id,name,numero){
                modal_editar.showModal();

                descripcionE.value=name;
                numero_variableE.value=numero;

                var editar=document.getElementById("editar");
                editar.action="/editar_variable/"+id
            }
            var guardarE=document.getElementById("guardarE");   
        guardarE.onclick=function(){
            modal_editar.close()
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