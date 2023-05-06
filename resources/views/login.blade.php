<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <script src="https://cdn.tailwindcss.com"></script>
    <title>SIS-EA</title>
    
</head>
<body>
 <div id="navbar" class="bg-sky-950 h-20 content-center">
    <h3 class="text-white font-thin pt-5 pl-10 text-3xl">SIS-EA</h3>
 </div>
    <div class="flex flex-row mt-10 justify-center">
        <img src="{{asset('img/logoFCYT.png')}}" alt="logo FCyt" class="h-20">
        <h3 class="font-thin text-gray-500 p-7 text-xl">Sistema de Evaluacion y Acreditacion</h3>
    </div>
    <div id="formulario" class="flex mt-10 justify-center">
        <form action="" method="post" action="{{route('login')}}" class="border-2 border-black rounded-2xl w-1/3 p-5 shadow-lg shadow-slate-500">
            @csrf
            <h3 class="font-light text-xl text-black text-center ">Inicio de sesion</h3>
            <div class="justify-center flex">
                <label for="correo" class="w-2/3 mt-2 font-thin">Correo Electronico</label>
            </div>
            <div class="justify-center flex">
                 <input type="text" name="email" class="bg-zinc-200 w-2/3 pt-2 mt-2 rounded-lg pl-5 pb-3"><br>
            </div>

            <div class="justify-center flex">
                <label for="password" class="w-2/3 mt-2 font-thin">Contraseña</label>
            </div>
            <div class="justify-center flex">
                 <input type="password" name="password" class="bg-zinc-200 w-2/3 pt-2 mt-2 rounded-lg pl-5 pb-3"><br>
            </div>
            <div class="flex justify-center">
                <input type="submit" value="Entrar" class="bg-sky-950 text-white pl-5 pr-5 pt-2 pb-2 rounded-lg mt-10">
            </div>
        </form>

    </div>
    
</body>
</html>