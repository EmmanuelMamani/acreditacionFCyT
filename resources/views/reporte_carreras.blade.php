@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10 grid grid-cols-10">
            <h3 class="p-2 ">Carreras</h3>
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
                    <th>Codigo</th>
                    <th>Carrera</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $key=>$carrera )
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">{{$key+1}}</th>
                    <th class="font-thin text-xl">{{$carrera->codigo}}</th>
                    <th class="font-thin text-xl">{{$carrera->name}}</th>
                    <th>
                        <div class="grid grid-cols-3">
                            <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">description</span>
                            <form action="{{route("eliminar_carrera",['id'=>$carrera->id])}}" method="post">
                                @csrf<button class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</button>
                            </form>
                            <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer" onclick="editar({{$carrera->id}},'{{$carrera->name}}')">edit_square</span>
                        </div>
                    </th>
                </tr> 
                @endforeach

            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <form action="{{route('registro_carrera')}}" method="post">
            @csrf
            <div>
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nueva carrera</h3>
                <label class="font-thin">Nombre</label><br>
                <input type="text" name="name" class="bg-zinc-200 rounded-lg w-full p-2"><br>
                <label class="font-thin">Codigo</label><br>
                <input type="text" name="codigo" class="bg-zinc-200 rounded-lg w-full p-2"><br>
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelar">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>

    <dialog id="modal_editar" class="w-1/3 rounded-lg px-20">
        <form action="" method="post" id="editar">
            @csrf
            <div>
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar carrera</h3>
                <label class="font-thin">Nombre</label><br>
                <input type="text" name="name" class="bg-zinc-200 rounded-lg w-full p-2" id="nameE"><br>
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarE">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelarE">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>
@endsection
@section("js")
    <script>
        //Modal registrar carrera
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
        cancelarE.onclick=function(){
            modal_editar.close()
        }
    </script>
@endsection