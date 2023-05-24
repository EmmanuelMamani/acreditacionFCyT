@extends("header")
@section("main")
    <div class="grid grid-cols-3 pb-10 pt-10 pl-20">
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$area->numero_area}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-xl font-thin pl-10">{{$area->name}}</h1></div>
        </div> 
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$area->variables->count()}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin">Variables</h1></div>
        </div>
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$area->variables->sum(function ($product) {
                return count($product->indicadores);
            });}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin pl-5">Indicadores</h1></div>
        </div>
    </div>
    <div class="bg-slate-200 grid grid-cols-12 py-4 shadow shadow-slate-400 mb-10">
        <div class="col-start-2 col-span-3">{{$area->name}}</div>
    </div>


    <div class="flex justify-center">
        <div class="w-5/6 mt-10 grid grid-cols-10">
             <h3 class="p-2 cursor-pointer">Variables</h3>
             @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
             <div class="flex justify-center items-center bg-sky-950 text-white p-2 rounded-xl col-start-10 cursor-pointer" id="agregar">
                <span class="material-symbols-outlined">add</span>
                <span>Agregar</span>
            </div>
             @endif
        </div>
     </div>
     <div class="flex justify-center">
         <table class="w-5/6 mt-5 border-collapse table-auto">
             <thead class="border-4 border-b-black  border-x-white border-t-white">
                 <tr>
                     <th>#</th>
                     <th class="text-left">Nombre</th>
                     @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
                     <th>Accion</th>
                     @endif
                 </tr>
             </thead>
             <tbody>
                @foreach ($area->variables as $variable)
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">{{$area->numero_area.'.'.$variable->numero_variable}}</th>
                    <th class="font-thin text-xl text-left"><a href="{{route('reporte_indicadores',['id'=>$variable->id])}}">{{$variable->name}}</a></th>
                    @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
                    <th>
                        <div class="grid grid-cols-3">
                            
                            <form action="{{route("eliminar_variable",['id'=>$variable->id])}}" method="post" class="Eliminar">
                                @csrf
                                <button class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</button>
                            </form>
       
                            <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer" onclick="editar2({{$variable->id}},'{{$variable->name}}',{{$variable->numero_variable}})">edit_square</span>
                        </div>
                    </th>
                    @endif
                </tr>
                @endforeach
             </tbody>
         </table>
     </div>

     <!----------------------------AGREGAR------------------------------------------------>
    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <form action="{{route('registro_variable',['id'=>$area->id])}}" method="post">
            @csrf
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nueva variable</h3>

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
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar" href="/reporte_variables/{{$area->id}}">Cancelar</a>
            </div>
        </div>
    </form>
    </dialog>
    <!----------------------------FIN AGREGAR------------------------------------------------>

    <!----------------------------EDITAR------------------------------------------------>
    <dialog id="modal_editar" class="w-1/3 rounded-lg px-20">
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
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelarE" href="/reporte_variables/{{$area->id}}">Cancelar</a>
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

@endsection