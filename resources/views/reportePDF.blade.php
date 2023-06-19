<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- include jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&family=Raleway:wght@100&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <title>SIS-EA</title>
</head>
<body>
    <div class="flex justify-end items-center">
        <a onclick="atras()" class="p-2 bg-blue-950 text-white font-thin mt-5 mr-5 rounded-xl cursor-pointer" ><span class="material-symbols-outlined icono mr-1">arrow_back</span>Atras</a>
        <a  id="downloadLink" onclick="descargar()" class="p-2 bg-blue-950 text-white font-thin mt-5 mr-5 rounded-xl cursor-pointer"><span class="material-symbols-outlined icono mr-1">download_for_offline</span>DESCARGAR</a>
    </div>
    <header class="flex justify-center">
        <img src="{{asset('img/ENCABEZADO para DOCUMENTOS.jpeg')}}" alt="" id="encabezado">
    </header>
    <div id="areaDeImpresora">
        
            <h1 class="text-center font-semibold text-3xl mt-5">Reporte de la gestion: {{$gestion->año}}</h1>
            @if ($request->Tabla != null)
            
            <div class="flex justify-center ">
                <table class=" w-full lg:w-4/6 mt-5 border-collapse table-auto">
                <thead class="border-2 border-b-black  border-x-white border-t-white">
                    <tr class="bg-slate-500">
                        <th>#</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th>Porcentaje Area</th>
                        <th>Promedio</th>
                        <th>Ponderación</th>
                        <th>Promedio Ponderado</th>
                    </tr>
                    <tr class="bg-slate-500">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-center"> (PA)</th>
                        <th class="text-center">(Pro)</th>
                        <th class="text-center">(P)</th>
                        <th class="text-center">(PA * P)/{{$areas->sum('valor')}} </th>
                    </tr>
             </thead>
                <tbody>
                @foreach ($areas as $area )
                <tr class="border border-y-black border-x-white">
                    <th class="font-thin">{{$area->numero_area}}</th>
                    <th class="font-thin text-left p-2">{{$area->name}}</th>
                    <th></th>
                    <th class="font-thin">{{round($notas[$loop->index]/$area->valor*100,2)}}%</th>
                    <th class="font-thin">{{round($notasP[$loop->index],2)}}</th>
                    <th class="font-thin">{{$area->valor}}</th>
                    <th class="font-thin">{{(round($notas[$loop->index],2)/$areas->sum('valor'))*100}}</th>
                </tr>
                    @if ($request->Nivel >=2)
                            <tr class="border border-y-black border-x-white bg-slate-400">
                                <th>#</th>
                                <th>Descripcion Variable</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Ponderacion</th>
                                <th>Valor</th>
                            </tr>
                        @foreach ($area->variables->where('activo',1) as $variable)
                                @php
                                    $sum_ponderacion=0;
                                    $sum_calificacion=0;
                                    foreach ($variable->indicadores as $indicador) {
                                        $sum_ponderacion+=$indicador->peso;
                                        $sum_calificacion+=$indicador->peso*($indicador->calificacion($gestion->id,$indicador->id))[0]->promedio;
                                    }
                                @endphp
                            <tr class="border border-y-black border-x-white">
                            <th class="font-thin">{{$area->numero_area.".".$variable->numero_variable}}</th>
                            <th class="font-thin text-left">{{$variable->name}}</th>
                            <th class="font-thin"></th>
                            <th class="font-thin"></th>
                            <th></th>
                            <th class="font-thin">{{$sum_ponderacion}}</th>
                            <th class="font-thin">{{$sum_calificacion}}</th>
                            </tr>
                            @if($request->Nivel == 3)
                               
                                <tr class="border border-y-black border-x-white bg-slate-300">
                                    <th>#</th>
                                    <th>Descripcion indicador</th>
                                    <th>Tipo de indicador</th>
                                    <th>Criterio</th>
                                    <th>Ponderacion</th>
                                    <th>Valor</th>
                                    <th>Ponderacion x valor</th>
                                </tr>
                                @foreach ($variable->indicadores->where('activo',1) as $indicador)
                                    <tr class="border border-y-black border-x-white">
                                        <th class="font-thin">{{$area->numero_area.".".$variable->numero_variable.".".$indicador->numero_indicador}}</th>
                                        <th class="font-thin text-left">{{$indicador->descripcion}}</th>
                                        <th class="font-thin">{{$indicador->tipo}}</th>
                                        <th class="font-thin"></th>
                                        <th class="font-thin">{{$indicador->peso}}</th>
                                        <th class="font-thin"></th>
                                        <th class="font-thin">
                                            {{$indicador->peso*($indicador->calificacion($gestion->id,$indicador->id))[0]->promedio}}
                                            </th>
                                    </tr>
                                    @foreach ($indicador->criterios_indicadores->where('activo',1) as $criterio_ind )
            
                                        <tr class="border border-y-black border-x-white ">
                                            <th class="font-thin"></th>
                                            <th class="font-thin"></th>
                                            <th class="font-thin"></th>
                                            <th class="font-thin text-left">{{$criterio_ind->criterio->nombre}}</th>
                                            <th class="font-thin"></th>
                                            <th class="font-thin">
                                            <form action="{{route('calificar',['id'=>$criterio_ind->id,'id_area'=>$area->id])}}" class="flex" method="POST" id='{{$criterio_ind->id}}'> @csrf

                                                <input type="radio" name="valor" value="1"  @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                                @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==1)
                                                checked
                                                @endif
                                                @endif  disabled> <label for="">1</label>
                                                <input type="radio" name="valor" value="2" @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                                @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==2)
                                                checked
                                                @endif
                                                @endif disabled><label for="">2</label>
                                                <input type="radio" name="valor" value="3" @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                                @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==3)
                                                checked
                                                @endif
                                                @endif disabled ><label for="">3</label>
                                                <input type="radio" name="valor" value="4" @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                                @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==4)
                                                checked
                                                @endif
                                                @endif disabled><label for="">4</label>
                                                <input type="radio" name="valor" value="5" @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()!=null)
                                                    @if ($calificaciones->where('indicador_criterio_id',$criterio_ind->id)->last()->calificacion==5)
                                                    checked
                                                    @endif
                                                @endif disabled><label for="">5</label>
                                            </form>
                                            </th>
                                            <th class="font-thin text-xl"></th>
                                        </tr>
                                    @endforeach
                                @endforeach
                    
                            @endif
                        @endforeach
                    @endif
                @endforeach
                    </tbody>
                    </table>
                </div>
            @endif
            @if ($request->Roseta != null)
            <div>
            <h2 class=" text-lg text-center my-5">Roseta de promedio de areas</h2>
            <div class=" w-1/2">
                <canvas id="radar"><p class="text-muted text-capitalize">grafica no disponible</p></canvas>
            </div>
            </div>
            @endif
            @if ($request->Barras != null)
            <div>
            <h2 class=" text-lg text-center my-5">Diagrama de barras de valor de areas</h2>
            <div class="w-4/6">
                <canvas id="bar"><p class="text-muted text-capitalize">grafica no disponible</p></canvas>
            </div>
        </div>
            @endif

           
            
           
        </div>
    

    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    if(document.getElementById("radar")!=null){
       
    
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
    }
</script>
<script>
    if(document.getElementById("bar")!=null){

   
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
    }

        
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    
    function descargar(){
        var element = document.getElementById("areaDeImpresora");
        var encabezado =document.getElementById("encabezado");
        var today = new Date();
        var now = today.toLocaleString();
        
      var doc=  html2pdf().set({
        margin: [40,10,20,10],
        filename: 'reporte_por_niveles.pdf',
        image: {
                    type: 'jpeg',
                    quality: 0.99
                },
        html2canvas: {

            scale: 1.8,
            letterRendering: true,
            //allowTaint: true,
            //foreignObjectRendering: true,
            x:300,
            y:2,
            //scrollX:-80,
            scrollY:10
        },
        jsPDF: {
            unit: "mm",
            format: "letter",
            orientation: 'portrait', // landscape o portrait
        },
        pagebreak: {
            mode: 'avoid-all', 
            before: '#page2el'
        },
       
        }).from(element).toPdf().get('pdf').then(function(pdf) {
        var totalPages = pdf.internal.getNumberOfPages();
        for (i = 1; i <= totalPages; i++) {
            pdf.setPage(i);
            pdf.setFontSize(10);
           pdf.addImage(encabezado,'jpeg',0,0,pdf.internal.pageSize.getWidth(),40);
           pdf.text(now , pdf.internal.pageSize.getWidth() - 50, (pdf.internal.pageSize.getHeight() - 8));
            pdf.text('Página ' + i + ' de ' + totalPages, (pdf.internal.pageSize.getWidth() / 2.3), (pdf.internal.pageSize.getHeight() - 8));
            if({{$request->Nivel}}==1){
                pdf.text("Áreas" , 20, (pdf.internal.pageSize.getHeight() - 8));
            }
            if({{$request->Nivel}}==2){
                pdf.text("Áreas - Variables" , 20, (pdf.internal.pageSize.getHeight() - 8));
            }
            if({{$request->Nivel}}==3){
                pdf.text("Áreas - Variables - Indicadores" , 20, (pdf.internal.pageSize.getHeight() - 8));
            }

        }
    }).save().catch(err => console.log(err));
        
    
    
    }

  </script>
    <script>
        function atras(){
            window.history.back();
        }
    </script>

</html>