@extends("header")
@section("main")
<div class="grid grid-cols-1 md:grid-cols-3" id="cont-info">
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl  lg:w-20 lg:h-20 lg:text-4xl">{{$areas->count()}}</div>
        <div class="opt-main flex items-center  w-5/6 text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-3xl">Áreas</h1></div>
    </div> 
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl  lg:w-20 lg:h-20 lg:text-4xl">{{$variables}}</div>
        <div class="opt-main flex items-center  w-5/6 text-white border-white border-8 rounded-3xl h-16 lg:h-20"><h1 class="w-full text-lg font-thin lg:text-3xl">Variables</h1></div>
    </div>
    <div class="flex con-opt">
        <div class="con-opt-main w-16 h-16  text-center rounded-full flex justify-center items-center bg-white absolute text-2xl  lg:w-20 lg:h-20 lg:text-4xl">{{$indicadores}}</div>
        <div class="opt-main flex items-center  w-5/6 text-white border-white border-8 rounded-3xl h-16 lg:h-20 "><h1 class="w-full text-lg font-thin lg:text-3xl">Indicadores</h1></div>
    </div>
</div>
<div class="mt-5 flex pb-5">
    <span class="material-symbols-outlined">bar_chart</span>
    <h1 class="text-xl ml-5">Gráfico resumen (última gestión)</h1>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 border-b border-stone-500 pb-5 lg:gap-1">
    <div>
        <canvas id="radar" class="grafica"><p class="text-muted text-capitalize">gráfica no disponible</p></canvas>
    </div>
    <div class="grafica mt-5 lg:mt-0">
        <canvas id="bar"><p class="text-muted text-capitalize">gráfica no disponible</p></canvas>
    </div>
</div>
<div class="mt-5 flex">
    <span class="material-symbols-outlined">list</span>
    <h1 class="text-xl ml-5">Áreas</h1>
    <a href="{{route('descargarZip')}}" class="descarga w-1/12 mb-10 flex justify-center items-center text-white p-2 rounded-xl col-span-4 cursor-pointer md:col-span-2 lg:col-span-2" id="agregar">
        <span class="material-symbols-outlined icono">download_for_offline</span>
        <span>Descargar</span>
    </a>
</div>
    <div class="grid grid-cols-1 lg:grid-cols-2 pb-10">
        @foreach ($areas as $area)
        <a href="{{route('reporte_variables',['id'=>$area->id])}}" class="flex pt-5">
            <div class="  w-16 h-16  text-center rounded-full flex justify-center items-center bg-slate-200 text-sky-950 text-3xl ">{{$area->numero_area}}</div>
            <div class="flex items-center  w-2/3  h-16"><h1 class="text-left w-full text-xl  pl-3 text-stone-800">{{$area->name}}</h1></div>
        </a> 
        @endforeach
    </div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    new Chart(document.getElementById("radar"), {
            type: 'radar',
            data: {
                labels: {{ json_encode($areas->pluck('numero_area')) }},
                datasets: [
                    {
                        label: "areas",
                        fill: true,
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        // data: [3.50,3.20,3.45,3.74,3.41,3.21,2.64,3.0,3.0,4.10]
                        data: {{ json_encode($notasP) }},
                    }
                ]
            },
            options: {
                scale: {
                    ticks: {
                        beginAtZero: true,
                        min: 0,
                        max: 5,
                        stepSize: 1
                    },
                    pointLabels: {
                        fontSize: 18
                    }
                },
                title: {
                    display: false,
                    text: 'roseta de promedios por area'
                },
                legend: { display: false }
            }
        });
</script>
<script>
    new Chart(document.getElementById("bar"), {
            type: 'bar',
            data: {
                labels: {{ json_encode($areas->pluck('numero_area')) }},
                datasets: [
                    {
                        label: 'Calificacion alcanzada',
                        borderColor: "#555",
                        // data: [3,5,10,8,15,3,3,5,1,5],
                        data: {{ json_encode($notas) }},
                        type: 'line',
                        fill: false,
                    },
                    {
                        label: "Calificacion ideal",
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 1,
                        data: {{ json_encode($areas->pluck('valor')) }},
                    },
                ]
            },
            options: {
                legend: {
                    display: true,
                },
                title: {
                    display: false,
                    text: 'promedio ponderado por area'
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'PROMEDIO PONDERADO'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'AREAS'
                        }
                    }]
                }
            }
        });
</script>
@endsection
