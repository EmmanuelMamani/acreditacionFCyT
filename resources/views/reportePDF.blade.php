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
    <h1 class="text-center text-xl mt-5">Reporte de la gestion: {{$gestion->año}}</h1>
    @if ($request->Tabla != null)
            <div class="flex justify-center">
                <table class="mt-5 border-collapse table-auto border border-slate-400 w-5/6 mb-10">
             <thead class="border-2 border-b-black  border-x-white border-t-white">
                 <tr class="bg-slate-500">
                    <th>#</th>
                    <th>Descripcion</th>
                    <th></th>
                    <th>Porcentaje Area</th>
                    <th>Nota Area</th>
                    <th>Ponderación</th>
                    <th>Promedio Ponderado</th>
                </tr>
             </thead>
                <tbody>
                @foreach ($areas as $area )
                <tr class="border border-y-black border-x-white">
                    <th class="font-thin">{{$area->numero_area}}</th>
                    <th class="font-thin text-left p-2">{{$area->name}}</th>
                    <th></th>
                    <th class="font-thin">{{($notas[$loop->index]/$area->valor)*100}}%</th>
                    <th class="font-thin">{{round($notas[$loop->index],2)}}</th>
                    <th class="font-thin">{{$area->valor}}</th>
                    <th class="font-thin">{{round($notasP[$loop->index],2)}}</th>
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
                @if ($request->Nivel == 3)
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
                        <th class="font-thin"></th>
                        <th></th>
                        <th class="font-thin">{{$sum_ponderacion}}</th>
                        <th class="font-thin">{{$sum_calificacion}}</th>
                        </tr>
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
            <h2 class=" text-lg text-center my-5">Roseta</h2>
            <div class=" w-4/6">
                <canvas id="radar"><p class="text-muted text-capitalize">grafica no disponible</p></canvas>
            </div>
            @endif
            @if ($request->Barras != null)
            <h2 class=" text-lg text-center my-5">Diagrama de barras</h2>
            <div class="w-4/6">
                <canvas id="bar"><p class="text-muted text-capitalize">grafica no disponible</p></canvas>
            </div>
            @endif


        </div>
    <a  id="downloadLink" onclick="descargar()">DESCARGAR</a>
</body>
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
<<<<<<< HEAD

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    
    function descargar(){
        var element = document.getElementById("areaDeImpresora");
        html2pdf() .from(element,'element')
    .set({
        margin: 1,
        filename: 'documento.pdf',
       /* image: {
                    type: 'jpeg',
                    quality: 0.98
                },*/
        html2canvas: {
           // scale: 1,
            letterRendering: true,
            //allowTaint: true,
            //foreignObjectRendering: true,
            //x:-1,
            y:2,
            //scrollX:,
            scrollY:10
        },
        jsPDF: {
            unit: "mm",
            format: "letter",
            orientation: 'portrait' // landscape o portrait
        }
    })
    .save()
    
    }
    /*
        const { jsPDF } = window.jspdf;
        var pdf = new jsPDF('p', 'mm', 'letter');
      var element = document.body; // Reemplaza 'content' con el id de tu contenedor de la vista

      pdf.html(element, {
		callback: function(pdf) {
            pdf.scale(0.5,0.5);
			pdf.save("output.pdf");
		},
        x: 15,
        y: 15,
        width: 170, //target width in the PDF document
        windowWidth: 650 //window width in CSS pixels
	});
    
    }*/
  </script>

<script>
    /*
document.addEventListener("DOMContentLoaded", function() {
    window.print();
    //window.location.href = "/calificacion";
    });*/
</script>

</html>