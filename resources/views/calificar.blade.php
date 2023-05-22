@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10 grid grid-cols-10">
            <h3 class="p-2 ">Areas</h3>
       </div>
    </div>
    <div class="flex justify-center">
        <table class="w-4/6 mt-5 border-collapse table-auto">
            <thead class="border-4 border-b-black  border-x-white border-t-white">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Porcentaje Area</th>
                    <th>Ponderación</th>
                    <th>Nota Area</th>
                    @if ($gestion != null)
                        <th>Accion</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($areas as $area )
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">{{$area->numero_area}}</th>
                    <th class="font-thin text-xl">{{$area->name}}</th>
                    <th class="font-thin text-xl">{{$notas[$loop->index]/$area->valor}}%</th>
                    <th class="font-thin text-xl">{{$area->valor}}</th>
                    <th class="font-thin text-xl">{{$notas[$loop->index]}}</th>
                    <th>
                            @if ($gestion != null)
                            <a href="{{route('ver_calificar_area',['id'=>$area->id])}}" class="material-symbols-outlined font-extralight text-3xl cursor-pointer">check_circle</a>
                            @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection<span