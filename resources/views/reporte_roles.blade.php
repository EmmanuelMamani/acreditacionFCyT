@extends("header")
@section("main")
<div class="flex justify-center">
    <div class="w-full lg:w-4/6 mt-10 grid grid-cols-10">
        <div class="col-span-6 md:col-span-8 lg:col-span-8">
            <h3 class="cursor-pointer text-xl md:text-3xl justify-self-start">Roles</h3>
        </div>
         <div class="flex justify-center items-center text-white p-2 rounded-xl col-span-4 cursor-pointer md:col-span-2 lg:col-span-2" id="agregar">
            <span class="material-symbols-outlined">add</span>
            <span>Agregar</span>
        </div>
    </div>
<<<<<<< HEAD
</div>
<div class="overflow-x-auto">
    <table class=" w-full lg:w-4/6 mt-5 border-collapse table-auto" id='tabla'>
            <thead class="border-2 border-b-black  border-x-white border-t-white">
=======
    <div class="flex justify-center">
        <table class="w-4/6 mt-5 border-collapse table-auto">
            <thead class="border-4 border-b-black  border-x-white border-t-white">
>>>>>>> f3e4efaf6976b7dc9ca3ccebd61fa765576af7cc
                <tr>
                    <th class="text-lg lg:text-2xl">#</th>
                    <th class="text-lg lg:text-2xl">Nombre</th>
                    <th class="text-lg lg:text-2xl">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key=>$rol)
                <tr class="border border-y-stone-400 border-x-white">
                    <th class="font-thin lg:text-xl">{{$key+1}}</th>
                    <th class="font-thin lg:text-xl">{{$rol->name}}</th>
                    <th>
                        <div class="grid grid-cols-1">
                            <form class="Eliminar" action="{{route('eliminar_rol',['id'=>$rol->id])}}" method="post"> @csrf
                                <button class="material-symbols-outlined font-extralight text-3xl">delete</button>
                            </form>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <div>
            <form action="{{route('registro_rol')}}" method="post">
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nuevo rol</h3>
                <label class="font-thin">Nombre del rol</label><br>
                <input type="text" name="name" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('name')}}"><br>
                @if ($errors->has('name'))
                <span class="text-red-700">{{ $errors->first('name') }}</span>
                @endif <br>
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelar" href="{{route('reporte_roles')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>

@if ($errors->has('name'))
    <script>
        abrir=document.getElementById("modal");
        abrir.showModal();
    </script>
@endif
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

            //Confirmacion de eliminacion
            $('.Eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres eliminar el rol?',
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