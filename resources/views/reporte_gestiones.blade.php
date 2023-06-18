@extends("header")
@section("main")
<div class="flex justify-center">
    <div class="w-full lg:w-4/6 mt-10 grid grid-cols-10">
        <div class="col-span-6 md:col-span-8 lg:col-span-8">
            <h3 class="cursor-pointer text-md md:text-3xl justify-self-start">Gestiones</h3>
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
                    <th class="text-lg md:text-2xl">#</th>
                    <th class="text-lg md:text-2xl">Año</th>
                    <th class="text-lg md:text-2xl">Activo</th>
                    <th class="text-lg md:text-2xl">Accciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gestiones as $key=>$gestion)
                <tr class="border border-y-stone-400 border-x-white">
                    <th class="font-thin lg:text-xl">{{$key+1}}</th>
                    <th class="font-thin lg:text-xl">{{$gestion->año}}</th>
                    @if ($gestion->activo==true)
                    <th class="font-thin lg:text-xl">Si</th>
                    @else
                    <th class="font-thin lg:text-xl">No</th>
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


    <dialog id="modal" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
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
                <a href="{{route('reporte_gestiones')}}" class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="modalReporte" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <div>
            <form action="" method="post" id='reporte'>
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Generar Reporte</h3>
                <label class="font-thin">Tabla</label><br>
                <input type="checkbox" name="Tabla" > Tabla <br>
                <input type="radio"  name="Nivel" checked value="1"> Nivel 1: Áreas
                <input type="radio" name="Nivel" value="2"> Nivel 2: Variables
                <input type="radio" name="Nivel" value="3"> Nivel 3: Indicadores
                <br>
                <label class="font-thin" >Gráficos</label><br>
                <input type="checkbox" name="Roseta" > Roseta <br>
                <input type="checkbox" name="Barras" > Barras <br>
               @error('Tabla')
                <span class="text-red-700"> Debe seleccionar al menos un campo</span><br>
               @enderror
                 <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarR">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer" id="cancelarR" href="{{route('reporte_gestiones')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>
    @if ($errors->has('Tabla'))
        <script>
            var modal_reporte=document.getElementById("modalReporte");
            var formulario=document.getElementById("reporte");
            formulario.action="/reporte_gestion_carrera/"+{{$errors->first('id')}};
            modal_reporte.showModal();
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