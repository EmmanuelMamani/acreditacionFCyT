@extends("header")
@section("main")
    <div class="grid grid-cols-3 pb-10 pt-10 pl-20">
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">10</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-xl font-thin pl-10">Normas juridicas e institucionales</h1></div>
        </div> 
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">20</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-sm font-thin pl-10">Resoluciones que autorizan el funcionamiento del programa</h1></div>
        </div>
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">30</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin pl-5">Indicadores</h1></div>
        </div>
    </div>
    <div class="bg-slate-200 grid grid-cols-12 py-4 shadow shadow-slate-400 mb-5">
        <div class="col-start-2 col-span-6">Normas juridicas e insitucionales > Resoluciones que autorizan el funcionamiento del programa</div>
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
                 <tr class="border-2 border-y-black border-x-white">
                     <th class="font-thin text-xl">1.1.1</th>
                     <th class="font-thin text-xl text-left">Resoluciones que autorizan el funcionmiento del programa</th>
                     <th>
                         <div class="grid grid-cols-2">
                             <span class="material-symbols-outlined font-extralight text-3xl">delete</span>
                             <span class="material-symbols-outlined font-extralight text-3xl">edit_square</span>
                         </div>
                     </th>
                 </tr>
             </tbody>
         </table>
     </div>
@endsection