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
        <a onclick="atras()" class="p-2 bg-blue-950 text-white  mt-5 mr-5 rounded-xl cursor-pointer" ><span class="material-symbols-outlined icono mr-1">arrow_back</span>Atras</a>
        <a  id="downloadLink" onclick="descargar()" class="p-2 bg-blue-950 text-white  mt-5 mr-5 rounded-xl cursor-pointer"><span class="material-symbols-outlined icono mr-1">download_for_offline</span>DESCARGAR</a>
    </div>
    <header class="flex justify-center">
        <img src="{{asset('img/ENCABEZADO para DOCUMENTOS.jpeg')}}" alt="" id="encabezado">
    </header>
    <div id="areaDeImpresora">
        
    <h1 class="text-center text-xl mt-5">Reporte de la gestion: {{$gestion->año}}</h1>
    <h1 class="text-center text-xl mt-5">Area: {{$area->name}}</h1>
    <div class="flex justify-center ">
        <table class=" w-full lg:w-4/6 mt-5 border-collapse table-auto">
            <thead class="border-2 border-b-black  border-x-white border-t-white">
                <tr class="bg-slate-500">
                    <tr class="border border-y-black border-x-white bg-neutral-400">
                        <th>#</th>
                        <th>Descripcion Variable</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Ponderacion</th>
                        <th>Valor</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
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
                <th >{{$area->numero_area.".".$variable->numero_variable}}</th>
                <th class=" text-left">{{$variable->name}}</th>
                <th ></th>
                <th ></th>
                <th></th>
                <th >{{$sum_ponderacion}}</th>
                <th >{{$sum_calificacion}}</th>
                </tr>
                <tr class="border border-y-black border-x-white bg-neutral-300">
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
                    <th >{{$area->numero_area.".".$variable->numero_variable.".".$indicador->numero_indicador}}</th>
                    <th class=" text-left">{{$indicador->descripcion}}</th>
                    <th >{{$indicador->tipo}}</th>
                    <th ></th>
                    <th >{{$indicador->peso}}</th>
                    <th ></th>
                    <th >
                        {{$indicador->peso*($indicador->calificacion($gestion->id,$indicador->id))[0]->promedio}}
                        </th>
                </tr>
                @foreach ($indicador->criterios_indicadores->where('activo',1) as $criterio_ind )
     
                    <tr class="border border-y-neutral border-x-white ">
                        <th ></th>
                        <th ></th>
                        <th ></th>
                        <th class=" text-left">{{$criterio_ind->criterio->nombre}}</th>
                        <th ></th>
                        <th >
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
                            </form>
                        </th>
                        <th class=" text-xl"></th>
                    </tr>
                   
                
                @endforeach
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
    <h2 class=" text-lg text-center my-5">Roseta de promedio de variables</h2>
    <div class=" w-4/6">
        <canvas id="radar"><p class="text-muted text-capitalize">grafica no disponible</p></canvas>
    </div>
    </div>
    <div>
    <h2 class=" text-lg text-center my-5">Diagrama de barras de notas de variables</h2>
    <div class="w-4/6">
        <canvas id="bar"><p class="text-muted text-capitalize">grafica no disponible</p></canvas>
    </div>
    </div>

</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    new Chart(document.getElementById("radar"), {
            type: 'radar',
            data: {
                labels: {{ json_encode($area->variables->pluck('numero_variable')) }},
                datasets: [
                    {
                        label: "areas",
                        fill: true,
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        // data: [3.50,3.20,3.45,3.74,3.41,3.21,2.64,3.0,3.0,4.10]
                        data: {{ json_encode($roseta) }},
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
                labels: {{ json_encode($area->variables->pluck('numero_variable')) }},
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
                        data: {{ json_encode($notasP) }},
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
        filename: 'reporte_de_area.pdf',
        image: {
                    type: 'jpeg',
                    quality: 0.99
                },
        html2canvas: {

            scale: 1.8,
            letterRendering: true,
            //allowTaint: true,
            //foreignObjectRendering: true,
            //x:0,
            y:2,
           // scrollX:-10,
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
           pdf.text(now , 20, (pdf.internal.pageSize.getHeight() - 8));
            pdf.text('Página ' + i + ' de ' + totalPages, (pdf.internal.pageSize.getWidth() / 2.3), (pdf.internal.pageSize.getHeight() - 8));
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