@extends("header")
@section("main")
    <div class="grid grid-cols-3 pb-10 pt-10 pl-20 border-b-2 border-sky-950">
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">10</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin">Areas</h1></div>
        </div> 
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">20</div>
            <div class="flex items-center  w-2/3 bg-sky-950 text-white border-white border-8 rounded-3xl h-20"><h1 class="text-center w-full text-2xl font-thin">Variables</h1></div>
        </div>
        <div class="flex">
            <div class="border-4 border-sky-950 w-20 h-20  text-center rounded-full flex justify-center items-center bg-white absolute text-sky-950 text-4xl font-thin">30</div>
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
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">1</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Normas juridicas e institucionales</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">2</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Mision y objetivos</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">3</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Curriculo</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">4</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Administracion y gestion academica</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">5</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Docentes</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">6</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Estudiantes</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">7</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Investigacion e interaccion social</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">8</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Regusros educativos</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">9</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Administracion financiera</h1></div>
        </div> 
        <div class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl font-thin">10</div>
            <div class="flex items-center  w-2/3 bg-white text-sky-950 h-16"><h1 class="text-left w-full text-xl font-thin pl-3">Infrastructura</h1></div>
        </div> 
    </div>
@endsection
