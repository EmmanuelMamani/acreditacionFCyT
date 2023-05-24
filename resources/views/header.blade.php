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
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Menu administrador</title>
</head>
<body>
    <div id="navbar" class="bg-sky-950 h-20 ">
        <div class="grid grid-cols-12">
            <div class="flex col-span-2">
                <span class="material-symbols-outlined text-white text-2xl pt-5 font-extralight ml-10 cursor-pointer" id="menu">menu</span>
                <h3 class="text-white font-thin pt-5 pl-10 text-3xl">SIS-EA</h3>
            </div>
            @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
            <a href="/menu_superadmin" class="col-end-10 cursor-pointer text-white text-lg pt-5 font-extralight text-right">Inicio</a>
            @else
            <a href="/menu_admin" class="col-end-10 cursor-pointer text-white text-lg pt-5 font-extralight text-right">Inicio</a>
            @endif
            <a href="{{route('logout')}}" class="col-end-11 cursor-pointer text-white text-lg pt-5 font-extralight text-right">logout</a>
            <div class="flex col-end-12 cursor-pointer">
                <span class="material-symbols-outlined text-white font-extralight pt-5 pl-10 text-4xl">account_circle</span>
                <span class="text-white text-2xl pt-5 font-extralight">{{Auth::user()->name}}</span>
            </div>
        </div>
     </div>
     <div id="contenido" class="flex">
        <div id="sidebar" class="hidden w-1/5 shadow-lg shadow-slate-500">
            <div class="grid grid-cols-10 p-5">
                <span id="close" class="material-symbols-outlined col-end-10 cursor-pointer">close</span>
                <span class="material-symbols-outlined col-end-1">folder_open</span>
                <h3 class="col-start-2 col-span-9 font-extralight text-lg">Administracion</h3>
                @if (Auth::user()->rol_user->last()->rol->name=="superadmin")
                <a href="{{route('reporte_carreras')}}" class="col-start-3 font-extralight cursor-pointer">Carreras</a>
                <a href="{{route('reporte_usuarios')}}" class="col-start-3 font-extralight cursor-pointer">Usuarios</a>
                <a href="{{route('reporte_roles')}}" class="col-start-3 font-extralight cursor-pointer">Roles</a>
                <a href="{{route('reporte_areas')}}" class="col-start-3 font-extralight cursor-pointer">Areas</a>
                <a href="{{route('reporte_permisos')}}" class="col-start-3 font-extralight cursor-pointer">Permisos</a>
                <a href="{{route('reporte_permiso_rol')}}" class="col-start-3 font-extralight cursor-pointer">Asignacion de permisos</a>
                @endif
                @if (Auth::user()->rol_user->last()->rol->name == 'administrador')
                <a href="{{route('reporte_usuarios_carrera')}}" class="col-start-3 font-extralight cursor-pointer">Usuarios</a>
                <a href="{{route('reporte_gestiones')}}" class="col-start-3 font-extralight cursor-pointer">Gestiones</a>
                <a href="{{route('calificacion')}}" class="col-start-3 font-extralight cursor-pointer">Calificaciones</a>
                @endif
             </div>
         </div>
         <div id="main" class="w-full">
            @yield("main")
         </div>
     </div>
     <script>
        menu=document.getElementById("menu");
        close=document.getElementById("close");
        sidebar=document.getElementById("sidebar");
        close.onclick=function(){
            sidebar.style.display="none"
            menu.style.display="block"
        }
        menu.onclick=function(){
            sidebar.style.display="block"
            menu.style.display="none"
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