@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10 grid grid-cols-10">
            <h3 class="p-2 ">Gestiones</h3>
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
                    <th>Año</th>
                    <th>Activo</th>
                    <th>Accciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gestiones as $key=>$gestion)
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">{{$key+1}}</th>
                    <th class="font-thin text-xl">{{$gestion->año}}</th>
                    @if ($gestion->activo==true)
                    <th class="font-thin text-xl">Si</th>
                    @else
                    <th class="font-thin text-xl">No</th>
                    @endif
                    <th>
                        <div class="grid grid-cols-3">
                            <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" onclick="abrirModal({{$gestion->id}})">description</span>
                            <form class="Activar" action="{{route('activar_gestion',['id'=>$gestion->id])}}" method="post">
                                @csrf
                                <button class="material-symbols-outlined font-extralight text-3xl cursor-pointer">check_circle</button>
                            </form>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <div>
            <form action="{{route("registro_gestion")}}" method="post">
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nueva gestion</h3>
                <label class="font-thin">Gestion</label><br>
                <select name="gestion" class="bg-zinc-200 rounded-lg w-full p-2">
                    @foreach ($años as $año )
                        <option value="{{$año}}">{{$año}}</option>
                    @endforeach
                </select><br>
                 <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="modalReporte" class="w-1/3 rounded-lg px-20">
        <div>
            <form action="" method="post" id='reporte'>
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Generar Reporte</h3>
                <label class="font-thin">Tabla</label><br>
                <input type="checkbox" name="Tabla" > Tabla <br>
                <input type="radio" name="Nivel" checked> Nivel 1
                <input type="radio" name="Nivel"> Nivel 2
                <input type="radio" name="Nivel"> Nivel 3
                <br>
                <label class="font-thin" >Gráficos</label><br>
                <input type="checkbox" name="Roseta" > Roseta <br>
                <input type="checkbox" name="Barras" > Barras <br>
               @error('Tabla')
                <span class="text-red-700"> Debe seleccionar al menos un campo</span><br>
               @enderror
                 <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelar">Cancelar</a>
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

        function abrirModal(id){
           var  reporteModal=document.getElementById('modalReporte');
            reporteModal.showModal();
           var  form=document.getElementById('reporte');
            form.action="/reporte_gestion_carrera/"+id;
        }
    
          //Confirmacion de activacion
          $('.Activar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: '¿Estás seguro que quieres activar la gestion?',
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