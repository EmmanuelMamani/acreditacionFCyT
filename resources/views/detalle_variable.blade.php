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
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin pl-5">Indicadores</h1></div>
        </div>
    </div>
    <div class="bg-slate-200 grid grid-cols-12 py-4 shadow shadow-slate-400 mb-5">
        <div class="col-start-2 col-span-6"><a href="">{{$variable->area->name}} ></a><a href="">{{$variable->name}}</a></div>
    </div>


    <div class="flex justify-center">
        <div class="w-5/6 mt-5 grid grid-cols-10">
             <h3 class="p-2 cursor-pointer">Indicadores</h3>
             <div class="flex justify-center items-center bg-sky-950 text-white p-2 rounded-xl col-start-10" id="agregar">
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
                                <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer" onclick="editar({{$indicador->id}},{{$indicador->numero_indicador}},'{{$indicador->descripcion}}','{{$indicador->tipo}}','{{$indicador->tipo_evaluacion}}')">edit_square</span>
                            </div>
                        </th>
                    </tr>
                @endforeach
               
             </tbody>
         </table>
     </div>

     <!----------------------------AGREGAR------------------------------------------------>
    <dialog id="modal" class="w-1/3 rounded-lg px-20">
        <form action="{{route('registro_indicador',['id'=>$variable->id])}}" method="post">
            @csrf
        <div>
            <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Agregar nuevo indicador</h3>

            <label class="font-thin">Número de indicador</label><br>
            <input type="text" name="numero_indicador" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('numero_indicador')}}"><br>
            @if ($errors->has('numero_indicador'))
            <span class="error text-danger"> {{ $errors->first('numero_indicador') }}</span><br>
            @endif

            <label class="font-thin">Descripcion</label><br>
            <input type="text" name="descripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('descripcion')}}"><br>
            @if ($errors->has('descripcion') )
            <span class="error text-danger"> {{ $errors->first('descripcion') }}</span><br>
            @endif
            
            <label class="font-thin">Tipo de indicador</label><br>
            <select name="tipo_indicador" >
                <option value="RMA" @if(old('tipo_indicador') == "RMA") selected @endif>RMA </option>
                <option value="RC" @if(old('tipo_indicador') == "RC") selected @endif >RC </option>
            </select><br>

            <label class="font-thin">Tipo de de calificación</label><br>
            <select name="tipo_calificacion" >
                <option value="SIMPLE" @if(old('tipo_calificacion') == "SIMPLE") selected @endif>SIMPLE</option>
                <option value="COMPUESTO" @if(old('tipo_calificacion') == "COMPUESTO") selected @endif>COMPUESTO</option>
            </select><br>

            <div class="grid grid-cols-2 pt-10 gap-5">
                <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar" href="/reporte_indicadores/{{$variable->id}}">Cancelar</a>
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
                <h3 class="text-center font-thin text-gray-500 p-7 text-xl">Editar indicador</h3>
    
                <label class="font-thin">Número de indicador</label><br>
                <input type="text" name="EditNumero_indicador"  id="EditNumero_indicador" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditNumero_indicador')}}"><br>
                @if ($errors->has('EditNumero_indicador'))
                <span class="error text-danger"> {{ $errors->first('EditNumero_indicador') }}</span><br>
                @endif
    
                <label class="font-thin">Descripcion</label><br>
                <input type="text" name="EditDescripcion" id="EditDescripcion" class="bg-zinc-200 rounded-lg w-full p-2" value="{{old('EditDescripcion')}}"><br>
                @if ($errors->has('EditDescripcion') )
                <span class="error text-danger"> {{ $errors->first('EditDescripcion') }}</span><br>
                @endif
                
                <label class="font-thin">Tipo de indicador</label><br>
                <select name="EditTipo_indicador" id="EditTipo_indicador">
                    <option value="RMA" @selected(old('EditTipo_indicador') == 'RMA')>RMA</option>
                    <option value="RC"@selected(old('EditTipo_indicador') == 'RC')>RC</option>
                </select><br>
    
                <label class="font-thin">Tipo de de calificación</label><br>
                <select name="EditTipo_calificacion" id="EditTipo_calificacion">
                    <option value="SIMPLE" @selected(old('EditTipo_calificacion') == 'SIMPLE')>SIMPLE</option>
                    <option value="COMPUESTO" @selected(old('EditTipo_calificacion') == 'COMPUESTO')>COMPUESTO</option>
                </select><br>
               
    
                <div class="grid grid-cols-2 pt-10 gap-5">
                    <button class="bg-sky-950 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="guardar">Guardar</button>
                    <a class="bg-red-600 text-white pl-3 pr-3 pt-2 pb-2 rounded-lg" id="cancelar" href="/reporte_indicadores/{{$variable->id}}">Cancelar</a>
                </div>
            </div>
        </form>
    </dialog>
    <!-------------------------------FIN EDITAR--------------------------------------------->

    <!------------------ABRIR MODAL DE REGISTRO----------------------------------->
    @if ($errors->has('descripcion') || $errors->has('numero_indicador'))
           
            <script>
                var modal=document.getElementById("modal");
                modal.showModal()
                
            </script>
            
    @endif

    <!-----------------------ABRIR MODAL DE EDICION---------------------------->
    @if ($errors->has('EditDescripcion') || $errors->has('EditNumero_indicador'))
           
            <script>
                var modal_editar=document.getElementById("modal_editar");
                modal_editar.showModal();
              
                var editar=document.getElementById("editar");
                editar.action="/editar_variable/"+{{$errors->first('id')}}
                
            </script>
            
    @endif
@endsection
@section("js")
    <script>
        //Modal registrar-----------------------------------------
        var agregar=document.getElementById("agregar");
        var modal=document.getElementById("modal");
        agregar.onclick=function(){modal.showModal()}
        
        
         //Modal editar ------------------------------------------
        var modal_editar=document.getElementById("modal_editar");
        var EditNumero_indicador=document.getElementById("EditNumero_indicador");
        var EditDescripcion=document.getElementById("EditDescripcion");
        var EditTipo_indicador=document.getElementById("EditTipo_indicador");
        var EditTipo_calificacion=document.getElementById("EditTipo_calificacion");
            function editar(id,numero_indicador,descripcion,tipo,tipo_evaluacion){
                modal_editar.showModal();


                EditDescripcion.value=descripcion;
                EditNumero_indicador.value=numero_indicador;

                EditTipo_calificacion.innerHTML='';
                EditTipo_indicador.innerHTML='';

                if(tipo=='RMA'){
                    EditTipo_indicador.innerHTML="<option value='RMA' @selected(old('EditTipo_indicador') == 'RMA') selected>RMA</option> <option value='RC'@selected(old('EditTipo_indicador') == 'RC')>RC</option>";
                }else{
                    EditTipo_indicador.innerHTML="<option value='RMA' @selected(old('EditTipo_indicador') == 'RMA')>RMA</option> <option value='RC'@selected(old('EditTipo_indicador') == 'RC') selected>RC</option>";
                }
                
                if (tipo_evaluacion=='SIMPLE') {
                    EditTipo_calificacion.innerHTML="<option value='SIMPLE' @selected(old('EditTipo_calificacion') == 'SIMPLE') selected>SIMPLE</option><option value='COMPUESTO' @selected(old('EditTipo_calificacion') == 'COMPUESTO')>COMPUESTO</option>";
                }else{
                    EditTipo_calificacion.innerHTML="<option value='SIMPLE' @selected(old('EditTipo_calificacion') == 'SIMPLE')>SIMPLE</option><option value='COMPUESTO' @selected(old('EditTipo_calificacion') == 'COMPUESTO') selected>COMPUESTO</option>";
                }
               




                var editar=document.getElementById("editar");
                editar.action="/editar_indicador/"+id
            }
        
    </script>
@endsection