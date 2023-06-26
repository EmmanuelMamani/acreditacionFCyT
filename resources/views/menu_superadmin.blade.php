@extends("header")
@section("main")
<div class="grid grid-cols-1 md:grid-cols-3" id="cont-info">
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl  lg:w-20 lg:h-20 lg:text-4xl">{{$areas->count()}}</div>
        <div class="opt-main flex items-center  w-5/6 text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-3xl">Áreas</h1></div>
    </div> 
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl  lg:w-20 lg:h-20 lg:text-4xl">{{$variables}}</div>
        <div class="opt-main flex items-center   w-5/6 text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-3xl">Variables</h1></div>
    </div>
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl  lg:w-20 lg:h-20 lg:text-4xl">{{$indicadores}}</div>
        <div class="opt-main flex items-center   w-5/6 text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-3xl">Indicadores</h1></div>
    </div>
</div>
<div class="mt-5 flex">
    <span class="material-symbols-outlined">list</span>
    <h1 class="text-xl ml-5">Áreas</h1>
</div>
 <div class="grid grid-cols-1 lg:grid-cols-2 pb-10" id="cont-areas">
        @foreach ($areas as $area)
        <a href="{{route('reporte_variables',['id'=>$area->id])}}" class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl">{{$area->numero_area}}</div>
            <div class="flex items-center  w-2/3 h-16"><h1 class="text-left w-full text-xl  pl-3 text-stone-800">{{$area->name}}</h1></div>
        </a> 
        @endforeach
    </div>
    <a href="{{route('descargarZip')}}" class="w-1/12 my-10  flex justify-center items-center text-white p-2 rounded-xl col-span-4 cursor-pointer md:col-span-2 lg:col-span-2" id="agregar">
        <span class="material-symbols-outlined icono">download_for_offline</span>
        <span>Descargar</span>
    </a>
@endsection
