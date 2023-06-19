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
        
    <h1 class="text-center text-xl mt-5">Reporte de Documentacion</h1>
    <div class="overflow-x-auto">
        <table class=" w-full lg:w-4/6 mt-5 border-collapse table-auto" id='tabla'>
            <thead class="border-2 border-b-black  border-x-white border-t-white">
                    <tr class="border border-y-black border-x-white bg-stone-200">
                        <th>#</th>
                        <th>Indicador</th>
                        
                    </tr>
            </thead>
            <tbody>
                @foreach ($indicadores as $indicador)
                <tr class="border border-y-stone-400 border-x-white p-2">
                    <th>{{$indicador->variable->area->numero_area}}.{{$indicador->variable->numero_variable}}.{{$indicador->numero_indicador}}</th>
                    <th>{{$indicador->descripcion}}</th>
                    
                   </tr> 
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
</body>
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
        margin: [40,0,20,0],
        filename: 'documento.pdf',
        image: {
                    type: 'jpeg',
                    quality: 0.99
                },
        html2canvas: {

            scale: 4,
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

    function atras(){
            window.history.back();
        }
</script>
</html>