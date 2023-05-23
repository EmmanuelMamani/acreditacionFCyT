@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10 grid grid-cols-10">
            <h3 class="p-2 ">Permisos</h3>
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
                    <th>URL</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permisos as $key=>$permiso )
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">{{$key+1}}</th>
                    <th class="font-thin text-xl">{{$permiso->url}}</th>
                    <th>
                        <form class="Eliminar" action="{{route('eliminar_permiso',['id'=>$permiso->id])}}" method="post">
                            @csrf
                            <button class="material-symbols-outlined font-extralight text-3xl">delete</button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <div>
            <form action="{{route('registrar_permiso')}}" method="post">
            @csrf
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nuevo permiso</h3>
            <label class="font-thin">URL</label><br>
            <input type="text" name="url" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('url')}}"><br>
            @error('url')
            <span class="text-red-700">{{ $message }}</span>
            @enderror
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar" href="{{route('reporte_permisos')}}">Cancelar</a>
            </div>
            </form>
        </div>
    </dialog>

    @if ($errors->has('url'))
    
    <script>
        modalPermisos=document.getElementById('modal');
        modalPermisos.showModal();
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

        //----------------------Confirmacion Eliminar--------------------
        $('.Eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres eliminar el permiso?',
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