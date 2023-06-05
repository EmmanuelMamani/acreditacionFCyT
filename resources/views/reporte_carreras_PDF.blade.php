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
    <header>
        <img src="{{asset('img/ENCABEZADO para DOCUMENTOS.jpeg')}}" alt="">
    </header>
    <h1 class="text-center text-xl mt-5">Reporte de Carreras</h1>
    <div class="flex justify-center">
        <table class="mt-5 border-collapse table-auto border border-slate-400 w-5/6 mb-10">
            <thead class="border-2 border-b-black  border-x-white border-t-white">
                    <tr class="border border-y-black border-x-white bg-slate-400">
                        <th>#</th>
                        <th>Carrera</th>
                        <th>Nota</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $carrera)
                    <tr>
                        <th>{{$loop->index +1 }}</th>
                        <th>{{$carrera->name}}</th>
                        <th>{{$notasC[$loop->index]}}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>