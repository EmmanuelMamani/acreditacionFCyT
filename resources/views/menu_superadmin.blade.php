@extends("header")
@section("main")
<div class="grid grid-cols-1 md:grid-cols-3" id="cont-info">
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$areas->count()}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-3xl">Areas</h1></div>
    </div> 
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$variables}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-3xl">Variables</h1></div>
    </div>
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl font-thin lg:w-20 lg:h-20 lg:text-4xl">{{$indicadores}}</div>
        <div class="opt-main flex items-center  w-full text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-3xl">Indicadores</h1></div>
    </div>
</div>
<div class="mt-5 flex">
    <span class="material-symbols-outlined">list</span>
    <h1 class="text-xl ml-5">Areas</h1>
</div>
 <div class="grid grid-cols-1 lg:grid-cols-2 pb-10" id="cont-areas">
        @foreach ($areas as $area)
        <a href="{{route('reporte_variables',['id'=>$area->id])}}" class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">{{$area->numero_area}}</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">{{$area->name}}</h1></div>
        </a> 
        @endforeach
    </div>
@endsection
