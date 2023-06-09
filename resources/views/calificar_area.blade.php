@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10">
            <h3 class="p-2 ">{{"Area #".$area->numero_area." > ".$area->name}}</h3>
       </div>
    </div>
    <div class="flex justify-center">
        <table class="w-4/6 mt-5 border-collapse table-auto">
            <thead class="border-2 border-b-black  border-x-white border-t-white">
                <tr>
                    <th>#</th>
                    <th>Descripcion indicador</th>
                    <th>Tipo de indicador</th>
                    <th>Criterio</th>
                    <th>Ponderacion</th>
                    <th>Valor</th>
                    <th>Ponderacion x valor</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($area->variables->where('activo',1) as $variable)
                    <tr class="border border-y-stone-500 border-x-white">
                    <th class="font-thin text-xl">{{$area->numero_area.".".$variable->numero_variable}}</th>
                    <th class="font-thin text-xl">{{$variable->name}}</th>
                    <th class="font-thin text-xl"></th>
                    <th class="font-thin text-xl"></th>
                    <th class="font-thin text-xl"></th>
                    <th class="font-thin text-xl"></th>
                    </tr>
                    @foreach ($variable->indicadores->where('activo',1) as $indicador)
                    <tr class="border border-y-stone-400 border-x-white">
                        <th class="font-thin text-xl">{{$area->numero_area.".".$variable->numero_variable.".".$indicador->numero_indicador}}</th>
                        <th class="font-thin text-xl"><a href="{{route('reporte_archivos',['id'=>$indicador->id])}}">{{$indicador->descripcion}}</a></th>
                        <th class="font-thin text-xl">{{$indicador->tipo}}</th>
                        <th class="font-thin text-xl"></th>
                        <th class="font-thin text-xl">{{$indicador->peso}}</th>
                        <th class="font-thin text-xl"></th>
                        <th class="font-thin text-xl">
                            {{$indicador->peso*($indicador->calificacion($gestion,$indicador->id))[0]->promedio}}
                            </th>
                    </tr>
                    @foreach ($indicador->criterios_indicadores->where('activo',1) as $criterio_ind )
         
                        <tr class="border border-y-stone-300 border-x-white">
                            <th class="font-thin text-xl"></th>
                            <th class="font-thin text-xl"></th>
                            <th class="font-thin text-xl"></th>
                            <th class="font-thin text-xl">{{$criterio_ind->criterio->nombre}}</th>
                            <th class="font-thin text-xl"></th>
                            <th class="font-thin text-xl">
                                <form action="{{route('calificar',['id'=>$criterio_ind->id,'id_area'=>$area->id])}}" class="flex" method="POST" id='{{$criterio_ind->id}}'> @csrf

                                    <input type="radio" name="valor" value="1"  @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                    @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==1)
                                    checked
                                     @endif
                                    @endif  > <label for="">1</label>
                                    <input type="radio" name="valor" value="2" @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                    @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==2)
                                    checked
                                     @endif
                                    @endif ><label for="">2</label>
                                    <input type="radio" name="valor" value="3" @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                    @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==3)
                                    checked
                                     @endif
                                    @endif ><label for="">3</label>
                                    <input type="radio" name="valor" value="4" @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                    @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==4)
                                    checked
                                     @endif
                                    @endif ><label for="">4</label>
                                    <input type="radio" name="valor" value="5" @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                    @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==5)
                                    checked
                                     @endif
                                    @endif ><label for="">5</label>
                                    <button class="material-symbols-outlined font-extralight text-3xl cursor-pointer ml-2">check_circle</button>
                                </form>
                            </th>
                            <th class="font-thin text-xl"></th>
                        </tr>
                       
                    
                    @endforeach
                    @endforeach
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection