@extends("header")
@section("main")
<div class="flex justify-center">
    <div class="w-full lg:w-4/6 mt-10 grid grid-cols-10">
        <div class="col-span-6 md:col-span-8 lg:col-span-8">
            <h3 class="cursor-pointer text-md md:text-3xl justify-self-start">Calificacion de areas</h3>
        </div>
         <div class="flex justify-center items-center text-white p-2 rounded-xl col-span-4 cursor-pointer md:col-span-2 lg:col-span-2" id="agregar" onclick="abrirModal({{$gestion->id}})">
            <span class="material-symbols-outlined icono">download_for_offline</span>
            <span>Reporte</span>
        </div>
    </div>
</div>

<div class="overflow-x-auto">
    <table class=" w-full lg:w-4/6 mt-5 border-collapse table-auto" id='tabla'>
            <thead class="border-2 border-b-black  border-x-white border-t-white">
                <tr>
                    <th class="text-lg lg:text-2xl">#</th>
                    <th class="text-lg lg:text-2xl">Descripcion</th>
                    <th class="text-lg lg:text-2xl">Porcentaje Area</th>
                    <th class="text-lg lg:text-2xl">Ponderación</th>
                    <th class="text-lg lg:text-2xl">Nota Area</th>
                    @if ($gestion != null)
                        <th class="text-lg lg:text-2xl">Accion</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area )
                <tr class="border border-y-stone-400 border-x-white">
                    <th class="font-thin lg:text-xl">{{$area->numero_area}}</th>
                    <th class="font-thin lg:text-xl">{{$area->name}}</th>
                    <th class="font-thin lg:text-xl">{{($notas[$loop->index]/$area->valor)*100}}%</th>
                    <th class="font-thin lg:text-xl">{{$area->valor}}</th>
                    <th class="font-thin lg:text-xl">{{$notas[$loop->index]}}</th>
                    <th>
                            @if ($gestion != null)
                            <a class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" href="{{route('reporte_area_PDF',['id'=>$area->id])}}">description</a>
                            <a href="{{route('ver_calificar_area',['id'=>$area->id])}}" class="material-symbols-outlined font-extralight text-3xl cursor-pointer">check_circle</a>
                           
                            @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <dialog id="modalReporte" class="w-5/6 sm:w-2/3 md:w-1/3 rounded-lg px-3">
        <div>
            <form action="" method="post" id='reporte'>
                @csrf
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Generar Reporte</h3>
                <label class="font-thin">Tabla</label><br>
                <input type="checkbox" name="Tabla" > Tabla <br>
                <input type="radio" name="Nivel" checked value="1"> Nivel 1
                <input type="radio" name="Nivel" value="2"> Nivel 2
                <input type="radio" name="Nivel" value="3"> Nivel 3
                <br>
                <label class="font-thin" >Gráficos</label><br>
                <input type="checkbox" name="Roseta" > Roseta <br>
                <input type="checkbox" name="Barras" > Barras <br>
               @error('Tabla')
                <span class="text-red-700"> Debe seleccionar al menos un campo</span><br>
               @enderror
                 <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a href="{{route('calificacion')}}" class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg cursor-pointer text-center" id="cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </dialog>

    @if ($errors->has('Tabla'))
        <script>
           
        reporte=document.getElementById('modalReporte');
        reporte.showModal();
        form=document.getElementById('reporte');
        form.action="/reporte_gestion_carrera/"+{{$errors->first('id')}};
        
</script>
    @endif

    <script>
                function abrirModal(id){
            reporte=document.getElementById('modalReporte');
            reporte.showModal();
            form=document.getElementById('reporte');
            form.action="/reporte_gestion_carrera/"+id;
        }
    </script>
@endsection