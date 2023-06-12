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
    <div id="navbar" class="grid grid-cols-6 contenedor-item sm:grid-cols-12">
        <span class="material-symbols-outlined cursor-pointer lg:ml-5" id="menu">menu</span>
        <div class="col-span-2 sm:col-span-5 lg:col-span-8 flex">
            <h1  class="text-sm md:text-2xl">SIS-EA:</h1>
            @if (Auth::user()->carrera_id==null)
            <h1 class="ml-2 text-sm md:text-2xl">Administracion</h1>
            @else
            <h1 class="ml-2 text-sm md:text-2xl">{{Auth::user()->carrera->name}}</h1>
            @endif
        </div>
        <div class="col-span-3  sm:col-span-5 lg:col-span-3">
            @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
            <a href="/menu_superadmin" class="opt-nav">Inicio</a>
            @else
            <a href="/menu_admin" class="opt-nav">Inicio</a>
            @endif
            <a href="{{route('logout')}}" class="opt-nav">Salir</a>
            <a href="#" class="opt-nav">{{Auth::user()->name}}<span class="material-symbols-outlined icono">account_circle</span></a>
        </div>
    </div>
    <div class="sm:flex">
        <div id="sidebar" class="shadow-lg shadow-slate-500 sm:w-2/5 lg:w-1/5">
            <div class="flex">
                <span class="material-symbols-outlined" id="folder">folder_open</span>
                <h3 class="font-extralight text-lg">Administracion</h3>
            </div>
                @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
                <a href="{{route('reporte_carreras')}}" class=" font-extralight cursor-pointer funcion">Carreras</a>
                <a href="{{route('reporte_usuarios')}}" class=" font-extralight cursor-pointer funcion">Usuarios</a>
                <a href="{{route('reporte_roles')}}" class=" font-extralight cursor-pointer funcion">Roles</a>
                <a href="{{route('reporte_areas')}}" class=" font-extralight cursor-pointer funcion">Areas</a>
                <a href="{{route('reporte_permisos')}}" class=" font-extralight cursor-pointer funcion">Permisos</a>
                <a href="{{route('reporte_permiso_rol')}}" class=" font-extralight cursor-pointer funcion">Asignacion de permisos</a>
                @endif
                @if (Auth::user()->rol_user->last()->rol->name == 'administrador')
                <a href="{{route('reporte_usuarios_carrera')}}" class=" font-extralight cursor-pointer funcion">Usuarios</a>
                <a href="{{route('reporte_gestiones')}}" class=" font-extralight cursor-pointer funcion">Gestiones</a>
                <a href="{{route('calificacion')}}" class="font-extralight cursor-pointer funcion">Calificaciones</a>
                @endif
        </div>
        <div id="main" class="sm:w-full">
            @yield("main")
        </div>
    </div>
    <script>
        menu=document.getElementById("menu");
        sidebar=document.getElementById("sidebar");
        menu.onclick=function(){
            if(menu.innerHTML=='menu'){
                menu.innerHTML='close'
                sidebar.style.display='block'
            }else{
                menu.innerHTML='menu'
                sidebar.style.display='none'
            }
        }
    </script>
     @if (session('registrar')=='ok')
     <script>
       const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        iconColor: 'white',
        customClass: {popup: 'colored-toast'},
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
         }
        })
 
        Toast.fire({
        icon: 'success',
        title: 'Registro exitoso'
        })
        </script>
         @endif
         @if (session('eliminar')=='ok')
         <script>
           const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            iconColor: 'white',
            customClass: {popup: 'colored-toast'},
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
            })
     
            Toast.fire({
            icon: 'success',
            title: 'Eliminado exitoso'
            })
            </script>
             @endif
             @if (session('editar')=='ok')
             <script>
               const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {popup: 'colored-toast'},
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                 }
                })
         
                Toast.fire({
                icon: 'success',
                title: 'Editado exitoso'
                })
                </script>
                 @endif
     @yield("js")
</body>
</html>