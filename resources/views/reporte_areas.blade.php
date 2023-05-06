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
                    <th class="font-thin text-xl">{{$loop->index+1}}</th>
                    <th class="font-thin text-xl">{{$area->name}}</th>
                    <th class="font-thin text-xl">{{$area->valor}}</th>
                    <th>
                        <div class="grid grid-cols-3">
                            <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">description</span>
                            <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer" >delete</span>
                            <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer" onclick="editar()">edit_square</span>
                        </div>
                    </th>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <form action="{{route('registro_area')}}" method="post">
            @csrf
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nueva area</h3>
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
    <dialog id="modal_editar" class="w-1/3 rounded-lg px-20">
        <form action="" method="post" id="editar">
            @csrf
            <div>
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar área</h3>
                <label class="font-thin">Descripción</label><br>
                <input type="text" name="EditDescripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditDescripcion')}}"><br>
                @if ($errors->has('EditDescripcion') )
                <span class="error text-danger"> {{ $errors->first('EditDescripcion') }}</span>
                @endif
                <label class="font-thin">Ponderación</label><br>
                <input type="text" name="EditPonderacion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditPonderacion')}}"><br>
                @if ($errors->has('EditPonderacion'))
                <span class="error text-danger"> {{ $errors->first('EditPponderacion') }}</span>
                @endif
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarE">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelarE" href="reporte_areas">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>
    @if ($errors->has('descripcion' || $errors->has('ponderacion')))
           
            <script>
                var modal=document.getElementById("modal");
                modal.showModal()
            </script>
            
    @endif
    @if ($errors->has('EditDescripcion' || $errors->has('EditPonderacion')))
           
            <script>
                var modal_editar=document.getElementById("modal_editar");
                modal_editar.showModal()
            </script>
            
    @endif
@endsection
@section("js")
    <script>
        //Modal registrar
        var agregar=document.getElementById("agregar");
        var modal=document.getElementById("modal");
        agregar.onclick=function(){modal.showModal()}
        var guardar=document.getElementById("guardar");
        var cancelar=document.getElementById("cancelar");
        guardar.onclick=function(){

            modal.close()
        }
        cancelar.onclick=function(){
            
            modal.close()
        }
         //Modal editar 
         var modal_editar=document.getElementById("modal_editar");
        var nameE=document.getElementById("nameE");
            function editar(id,name){
                modal_editar.showModal();
                var editar=document.getElementById("editar");
                nameE.value=name;
                var ruta="{{route('editar_carrera',['id'=>"+id+"])}}"
                console.log(ruta);
            }
        guardarE.onclick=function(){
            modal_editar.close()
        }
        cancelarE.onclick=function(){
            modal_editar.close()
        }
    </script>
@endsection