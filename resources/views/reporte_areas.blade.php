@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10 grid grid-cols-10">
            <h3 class="p-2 ">Areas</h3>
            <div class="flex justify-center items-center bg-sky-950 text-white p-2 rounded-xl col-start-10 cursor-pointer" id="agregar">
                <span class="material-symbols-outlined">add</span>
                <span>Agregar</span>
            </div>
       </div>
    </div>
    <div class="flex justify-center">
        <table class="w-4/6 mt-5 border-collapse table-auto">
            <thead class="border-4 border-b-black  border-x-white border-t-white">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Ponderacion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area)
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl"></th>
                    <th class="font-thin text-xl">{{$area->name}}</th>
                    <th class="font-thin text-xl">{{$area->valor}}</th>
                    <th>
                        <div class="grid grid-cols-3">
                            <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" >description</span>
                            <form class="Eliminar" action="{{route("eliminar_area",['id'=>$area->id])}}" method="post" >
                                @csrf<button class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</button>
                            </form>
                            <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer" onclick="editar({{$area->id}},'{{$area->name}}',{{$area->valor}})">edit_square</span>
                        </div>
                    </th>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

<!----------------------------AGREGAR------------------------------------------------>
    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <form action="{{route('registro_area')}}" method="post">
            @csrf
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nueva area</h3>
            <label class="font-thin">Numero de area</label><br>
            <input type="number" name="numero" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('numero')}}"><br>
            @if ($errors->has('numero') )
            <span class="error text-danger"> {{ $errors->first('numero') }}</span>
            @endif
            <label class="font-thin">Descripcion</label><br>
            <input type="text" name="descripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('descripcion')}}"><br>
            @if ($errors->has('descripcion') )
            <span class="error text-danger"> {{ $errors->first('descripcion') }}</span>
            @endif
            <label class="font-thin">Ponderacion</label><br>
            <input type="text" name="ponderacion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('ponderacion')}}"><br>
            @if ($errors->has('ponderacion'))
            <span class="error text-danger"> {{ $errors->first('ponderacion') }}</span>
            @endif
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar" href="reporte_areas">Cancelar</a>
            </div>
        </div>
    </form>
    </dialog>
    <!----------------------------FIN AGREGAR------------------------------------------------>

<!----------------------------EDITAR------------------------------------------------>
    <dialog id="modal_editar" class="w-1/3 rounded-lg px-20">
        <form class="Editar" action="" method="post" id="editar">
            @csrf
            <div>
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar área</h3>
                <label class="font-thin">Descripción</label><br>
                <input type="text" name="EditDescripcion" id="EditDescripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditDescripcion')}}"><br>
                @if ($errors->has('EditDescripcion') )
                <span class="error text-danger"> {{ $errors->first('EditDescripcion') }}</span><br>
                @endif
                <label class="font-thin">Ponderación</label><br>
                <input type="text" name="EditPonderacion" id="EditPonderacion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditPonderacion')}}"><br>
                @if ($errors->has('EditPonderacion'))
                <span class="error text-danger"> {{ $errors->first('EditPonderacion') }}</span><br>
                @endif
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarE">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelarE" href="reporte_areas">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>
    <!-------------------------------FIN EDITAR--------------------------------------------->

    <!------------------ABRIR MODAL DE REGISTRO----------------------------------->
    @if ($errors->has('descripcion') || $errors->has('ponderacion'))
           
            <script>
                var modal=document.getElementById("modal");
                modal.showModal()
            </script>
            
    @endif

    <!-----------------------ABRIR MODAL DE EDICION---------------------------->
    @if ($errors->has('EditDescripcion') || $errors->has('EditPonderacion'))
           
            <script>
                var modal_editar=document.getElementById("modal_editar");
                modal_editar.showModal()

                var editar=document.getElementById("editar");
                editar.action="/editar_area/"+{{$errors->first('id')}}
            </script>
            
    @endif
@endsection
@section("js")
    <script>
        //Modal registrar-----------------------------------------
        var agregar=document.getElementById("agregar");
        var modal=document.getElementById("modal");
        agregar.onclick=function(){modal.showModal()}
        var guardar=document.getElementById("guardar");
        var cancelar=document.getElementById("cancelar");
        
        cancelar.onclick=function(){
            
            modal.close()
        }
         //Modal editar ------------------------------------------
         var modal_editar=document.getElementById("modal_editar");
        var descripcionE=document.getElementById("EditDescripcion");
        var ponderacionE=document.getElementById("EditPonderacion");
            function editar(id,name,ponderacion){
                modal_editar.showModal();

                descripcionE.value=name;
                ponderacionE.value=ponderacion;

                var editar=document.getElementById("editar");
                editar.action="/editar_area/"+id
            }
            var guardarE=document.getElementById("guardarE");   
        guardarE.onclick=function(){
            modal_editar.close()
        }
        //Confirmar Eliminacion-----------------------------------
        $('.Eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres eliminar el area?',
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
      //Confirmacion de editar
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