@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10 grid grid-cols-10">
            <h3 class="p-2 ">Usuarios</h3>
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
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Carrera</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $key=>$usuario)
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">{{$key+1}}</th>
                    <th class="font-thin text-xl">{{$usuario->name}}</th>
                    <th class="font-thin text-xl">{{$usuario->email}}</th>
                    <th class="font-thin text-xl">{{$usuario->rol_user->last()->rol->name}}</th>
                    @if ($usuario->carrera_id==NULL)
                    <th class="font-thin text-xl">Sin carrera</th>
                    @else
                    <th class="font-thin text-xl">{{$usuario->carrera->name}}</th>
                    @endif
                    <th>
                        <div class="grid grid-cols-2">
                            <form class="Eliminar" action="{{route('eliminar_usuario',['id'=>$usuario->id])}}" method="post">
                                @csrf
                                <button class="material-symbols-outlined font-extralight text-3xl">delete</button>
                            </form>
                            <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer" onclick="editar({{$usuario->id}},'{{$usuario->name}}')">edit_square</span>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <div>
            <form action="{{route('registro_usuario')}}" method="post">
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nuevo usuario</h3>
                <label class="font-thin">Nombre de usuario</label><br>
                <input type="text" name="name" class="bg-zinc-200 rounded-lg w-full p-2"><br>
                @if ($errors->has('name'))
                <span class="text-red-700">{{ $errors->first('name') }}</span>
                @endif <br>
                <label class="font-thin">Correo Electronico</label><br>
                <input type="text" class="bg-zinc-200 rounded-lg w-full p-2" name="email"><br>
                @if ($errors->has('email'))
                <span class="text-red-700">{{ $errors->first('email') }}</span>
                @endif <br>
                <label class="font-thin">Contraseña</label><br>
                <input type="password" name="password" class="bg-zinc-200 rounded-lg w-full p-2"><br>
                @if ($errors->has('password'))
                <span class="text-red-700">{{ $errors->first('password') }}</span>
                @endif <br>
                <label class="font-thin">Confirmar contraseña</label><br>
                <input type="password" name="confirmacion" class="bg-zinc-200 rounded-lg w-full p-2"><br>
                <label class="font-thin">Lista de roles</label><br>
                <select name="rol" class="bg-zinc-200 rounded-lg w-full p-2">
                    @foreach ($roles as $rol)
                        <option value="{{$rol->id}}">{{$rol->name}}</option>
                    @endforeach
                </select><br>
                <label class="font-thin">Lista de carreras</label><br>
                <select name="carrera" class="bg-zinc-200 rounded-lg w-full p-2">
                    @foreach ($carreras as $carrera)
                        <option value="{{$carrera->id}}">{{$carrera->name}}</option>
                    @endforeach
                </select><br>
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="modalE" class="w-1/3 rounded-lg px-20">
        <div>
            <form action="" method="post" id="editar" class="Editar">
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar usuario</h3>
                <label class="font-thin">Nombre de usuario</label><br>
                <input type="text" name="name" class="bg-zinc-200 rounded-lg w-full p-2" id="nameE"><br>
                @if ($errors->has('name'))
                <span class="text-red-700">{{ $errors->first('name') }}</span>
                @endif <br>
                
                <label class="font-thin">Contraseña</label><br>
                <input type="password" name="password" class="bg-zinc-200 rounded-lg w-full p-2"><br>
                @if ($errors->has('password'))
                <span class="text-red-700">{{ $errors->first('password') }}</span>
                @endif <br>
                <label class="font-thin">Lista de roles</label><br>
                <select name="rol" class="bg-zinc-200 rounded-lg w-full p-2">
                    @foreach ($roles as $rol)
                        <option value="{{$rol->id}}">{{$rol->name}}</option>
                    @endforeach
                </select><br>
                <label class="font-thin">Lista de carreras</label><br>
                <select name="carrera" class="bg-zinc-200 rounded-lg w-full p-2">
                    @foreach ($carreras as $carrera)
                        <option value="{{$carrera->id}}">{{$carrera->name}}</option>
                    @endforeach
                </select><br>
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarE">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelarE">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>
@endsection
@section("js")
    <script>
        /*****Registrar usuario******/
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

        /*********Editar usuario***********************/
        var modalE=document.getElementById("modalE");
        var cancelarE=document.getElementById("cancelarE");
        function editar(id,name){
                modalE.showModal();
                var nameE=document.getElementById("nameE");
                var editar=document.getElementById("editar");
                nameE.value=name;
                editar.action="/editar_usuario/"+id
                console.log(editar.action);
            }
        var guardarE=document.getElementById("guardarE");   
        guardarE.onclick=function(){
            modalE.close()
        }
        cancelarE.onclick=function(){
            modalE.close()
        }
                //Confirmacion de eliminacion
                $('.Eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres eliminar el usuario?',
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
                modalE.showModal();
            }
            })
      });
    </script>

@endsection