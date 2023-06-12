@extends("header")
@section("main")
<div class="flex justify-center">
    <div class="w-full lg:w-4/6 mt-10 grid grid-cols-10">
        <div class="col-span-6 md:col-span-8 lg:col-span-8">
            <h3 class="cursor-pointer text-md md:text-3xl justify-self-start">Asignacion de permisos</h3>
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
                <tr>
                    <th class="text-sm md:text-xl">#</th>
                    <th class="text-sm md:text-xl">Permiso</th>
                    <th class="text-sm md:text-xl">Rol</th>
                    <th class="text-sm md:text-xl">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permiso_roles as $key=>$permiso_rol )
                <tr class="border border-y-stone-400 border-x-white">
                    <th class="font-thin lg:text-xl">{{$key+1}}</th>
                    <th class="font-thin lg:text-xl">{{$permiso_rol->permiso->url}}</th>
                    <th class="font-thin lg:text-xl">{{$permiso_rol->rol->name}}</th>
                    <th>
                        <form class="Eliminar" action="{{route('eliminar_asignacion',['id'=>$permiso_rol->id])}}" method="post">
                            @csrf
                            <button class="material-symbols-outlined font-extralight text-3xl">delete</button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <div>
            <form action="{{route('asignar_permiso')}}" method="post">
            @csrf
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Asignar permiso a rol</h3>
            <label class="font-thin">Rol</label><br>
            <select name="rol" class="bg-zinc-200 rounded-lg w-full p-2" onchange="cambio()" id="rol">
                @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                @endforeach
            </select><br>
            <label class="font-thin">Permiso</label><br>
            <select name="permiso" class="bg-zinc-200 rounded-lg w-full p-2" id="permiso">
                @foreach ($permisos as $permiso)
                @if ($permiso->roles->where('id',$roles->first()->id)->isEmpty())
                <option value="{{$permiso->id}}">{{$permiso->url}}</option>
                @endif
                @endforeach
            </select><br>
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar">Cancelar</a>
            </div>
            </form>
        </div>
    </dialog>
@endsection
@section("js")
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
        //Cambio de rol
        
        var permiso=document.getElementById('permiso')
        function cambio(){
            var rol=document.getElementById('rol').value
            permiso.innerHTML=""
            @foreach ($permisos as $permiso)
            var encontrado=false
                @foreach ($permiso->roles as $rol)
                    if({{$rol->id}}==rol){
                        encontrado=true
                    }
                @endforeach
                    if(encontrado==false){
                        permiso.innerHTML+='<option value="{{$permiso->id}}">{{$permiso->url}}</option>'
                    }
            @endforeach
        }

         //----------------------Confirmacion Eliminar--------------------
         $('.Eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres eliminar la asignacion?',
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
    </script>
@endsection