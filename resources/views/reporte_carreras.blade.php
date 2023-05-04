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
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">1</th>
                    <th class="font-thin text-xl">411702</th>
                    <th class="font-thin text-xl">Ingenieria en sistemas</th>
                    <th>
                        <div class="grid grid-cols-3">
                            <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">description</span>
                            <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</span>
                            <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer">edit_square</span>
                        </div>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nueva carrera</h3>
            <label class="font-thin">Nombre</label><br>
            <input type="text" name="descripcion" class="bg-zinc-200 rounded-lg w-full p-2"><br>
            <label class="font-thin">Codigo</label><br>
            <input type="text" name="ponderacion" class="bg-zinc-200 rounded-lg w-full p-2"><br>
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <button class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar">Cancelar</button>
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
        guardar.onclick=function(){
            modal.close()
        }
        cancelar.onclick=function(){
            modal.close()
        }
    </script>
@endsection