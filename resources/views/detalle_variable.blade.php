@extends("header")
@section("main")
    <div class="grid grid-cols-3 pb-10 pt-10 pl-20">
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$variable->area->numero_area}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-xl font-thin pl-10">{{$variable->area->name}}</h1></div>
        </div> 
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">{{$variable->numero_variable}}</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-sm font-thin pl-10">{{$variable->name}}</h1></div>
        </div>
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">30</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin pl-5"></h1>Indicadores</div>
        </div>
    </div>
    <div class="bg-slate-200 grid grid-cols-12 py-4 shadow shadow-slate-400 mb-5">
        <div class="col-start-2 col-span-6"><a href="">{{$variable->area->name}} ></a><a href="">{{$variable->name}}</a></div>
    </div>


    <div class="flex justify-center">
        <div class="w-5/6 mt-5 grid grid-cols-10">
             <h3 class="p-2 cursor-pointer">Indicadores</h3>
             <div class="flex justify-center items-center bg-sky-950 text-white p-2 rounded-xl col-start-10">
                 <span class="material-symbols-outlined">add</span>
                 <span>Agregar</span>
             </div>
        </div>
     </div>
     <div class="flex justify-center">
         <table class="w-5/6 mt-5 border-collapse table-auto">
             <thead class="border-4 border-b-black  border-x-white border-t-white">
                 <tr>
                     <th>#</th>
                     <th class="text-left">Nombre</th>
                     <th>Accion</th>
                 </tr>
             </thead>
             <tbody>
                @foreach ($variable->indicadores as $indicador)
                    <tr class="border-2 border-y-black border-x-white">
                        <th class="font-thin text-xl">{{$variable->area->numero_area}}.{{$variable->numero_variable}}.{{$indicador->numero_indicador}}</th>
                        <th class="font-thin text-xl text-left">{{$indicador->descripcion}}</th>
                        <th>
                            <div class="grid grid-cols-2">
                                <span class="material-symbols-outlined font-extralight text-3xl">delete</span>
                                <span class="material-symbols-outlined font-extralight text-3xl">edit_square</span>
                            </div>
                        </th>
                    </tr>
                @endforeach
               
             </tbody>
         </table>
     </div>

     <!----------------------------AGREGAR------------------------------------------------>
    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <form action="{{route('registro_variable',['id'=>$area->id])}}" method="post">
            @csrf
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nueva variable</h3>

            <label class="font-thin">Número de variable</label><br>
            <input type="text" name="numero_variable" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('numero_variable')}}"><br>
            @if ($errors->has('numero_variable'))
            <span class="error text-danger"> {{ $errors->first('numero_variable') }}</span><br>
            @endif

            <label class="font-thin">Descripcion</label><br>
            <input type="text" name="descripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('descripcion')}}"><br>
            @if ($errors->has('descripcion') )
            <span class="error text-danger"> {{ $errors->first('descripcion') }}</span><br>
            @endif
            
            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar" href="/reporte_variables/{{$area->id}}">Cancelar</a>
            </div>
        </div>
    </form>
    </dialog>
    <!----------------------------FIN AGREGAR------------------------------------------------>

    <!----------------------------EDITAR------------------------------------------------>
    <dialog id="modal_editar" class="w-1/3 rounded-lg px-20">
        <form action="" method="post" id="editar">
            @csrf
            <div>
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar variable</h3>
                <label class="font-thin">Descripción</label><br>
                <input type="text" name="EditDescripcion" id="EditDescripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditDescripcion')}}"><br>
                @if ($errors->has('EditDescripcion') )
                <span class="error text-danger"> {{ $errors->first('EditDescripcion') }}</span><br>
                @endif
                <label class="font-thin">Número de variable</label><br>
                <input type="text" name="EditNumero_variable" id="EditNumero_variable" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditNumero_variable')}}"><br>
                @if ($errors->has('EditNumero_variable'))
                <span class="error text-danger"> {{ $errors->first('EditNumero_variable') }}</span><br>
                @endif
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardarE">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelarE" href="/reporte_variables/{{$area->id}}">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>
    <!-------------------------------FIN EDITAR--------------------------------------------->

    <!------------------ABRIR MODAL DE REGISTRO----------------------------------->
    @if ($errors->has('descripcion') || $errors->has('numero_variable'))
           
            <script>
                var modal=document.getElementById("modal");
                modal.showModal()
                
            </script>
            
    @endif

    <!-----------------------ABRIR MODAL DE EDICION---------------------------->
    @if ($errors->has('EditDescripcion') || $errors->has('EditNumero_variable'))
           
            <script>
                var modal_editar=document.getElementById("modal_editar");
                modal_editar.showModal();
              
                var editar=document.getElementById("editar");
                editar.action="/editar_variable/"+{{$errors->first('idar')}}+"/"+{{$errors->first('id')}}
                
            </script>
            
    @endif
@endsection