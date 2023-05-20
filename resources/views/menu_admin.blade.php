@extends("header")
@section("main")
    <div class="grid grid-cols-3 pb-10 pt-10 pl-20 border-b-2 border-sky-950">
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$areas->count()}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin">Areas</h1></div>
        </div> 
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$variables}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin">Variables</h1></div>
        </div>
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$indicadores}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin pl-5">Indicadores</h1></div>
        </div>
    </div>
    <div class="pl-20 mt-5 flex border-b-2 border-sky-950 pb-5">
        <span class="material-symbols-outlined">bar_chart</span>
        <h1 class="ml-2">Grafico resumen (ultima gestion)</h1>
    </div>
    <div class="ml-20 mt-5 flex">
        <span class="material-symbols-outlined">list</span>
        <h1 class="ml-2">Areas</h1>
    </div>
    <div class="grid grid-cols-2 pl-20 pb-10">
        @foreach ($areas as $area)
        <a href="{{route('reporte_variables',['id'=>$area->id])}}" class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">{{$area->numero_area}}</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">{{$area->name}}</h1></div>
        </a> 
        @endforeach
    </div>
@endsection
