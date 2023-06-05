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
    <div id="areaDeImpresora">
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
            <div>
            <h2 class=" text-lg text-center my-5">Roseta</h2>
            <div class=" w-1/2">
                <canvas id="radar"><p class="text-muted text-capitalize">grafica no disponible</p></canvas>
            </div>
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
        
        
      var doc=  html2pdf().from(element)
    .set({
        margin: [10,10,20,10],
        filename: 'documento.pdf',
        image: {
                    type: 'jpeg',
                    quality: 0.99
                },
        html2canvas: {
            scale: 3,
            letterRendering: true,
            //allowTaint: true,
            //foreignObjectRendering: true,
            //x:0,
            y:2,
            scrollX:-10,
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
       
        }).save();
    
    //console.log("que paso?");
    
    }


    /*
        const { jsPDF } = window.jspdf;
       // var pdf = new jsPDF('p', 'mm', 'letter',true,true);
      //var element = document.body;
       // Reemplaza 'content' con el id de tu contenedor de la vista

       var doc = new jsPDF();

var totalPages = 0;
var contentElement = document.getElementById('content');
var contentHeight = contentElement.clientHeight;
var pageHeight = doc.internal.pageSize.getHeight();

// Función para agregar una nueva página
var addNewPage = function () {
  doc.addPage();
  totalPages++;
};

html2canvas(contentElement).then(function (canvas) {
  var imgData = canvas.toDataURL('image/png');
  var position = 0;

  while (position < contentHeight) {
    // Calcular la altura disponible en la página actual
    var heightLeft = position === 0 ? pageHeight : pageHeight - 10;

    // Agregar la imagen de la sección actual al PDF
    doc.addImage(imgData, 'PNG', 10, position === 0 ? 10 : 0, 190, 0);

    position -= heightLeft;

    // Verificar si es necesario agregar una nueva página
    if (position < contentHeight) {
      addNewPage();
    }
  }

  // Agregar el número total de páginas al pie de página de cada página
  for (var i = 1; i <= totalPages; i++) {
    doc.setPage(i);
    doc.text(20, pageHeight - 10, 'Página ' + i + ' de ' + totalPages);
  }

  // Guardar el PDF
  doc.save('mi_pdf.pdf');
});*/
      /*pdf.html(element, {
        
        html2canvas: {
       scale: 0.30,
       width: 200,
       height:100,
       letterRendering: true,
       
    },
		callback: function(pdf) {
            
            pdf.setPage(1).setFontSize(8).text('AÑADIDOENELDOC',30,100);
			pdf.save("output.pdf");
		},
        
	});*/
   // pdf.addHTML(element);
   
    
  //  }
  </script>


</html>