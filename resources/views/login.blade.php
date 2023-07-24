<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&family=Raleway:wght@200&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="shortcut icon" href="{{asset('img/ave.ico')}}" type="image/x-icon">
    <title>AVE</title>
</head>
<body>
    <div id="header">
        <img src="{{asset('img/logo_ave.JPG')}}" id="logo_ave">
    </div>
    <div id="main">
        <div class="d-flex flex-content">
            <img src="{{asset('img/logoFCYT.png')}}" alt="logo FCyt" class="flex-item" id="logo">
            <div class="flex-item" id="titulo"><h3>Sistema para la Acreditación Valoración y Evaluación</h3></div>
        </div>
        <div id="formulario">
            <form action="{{route('login')}}" method="post">
                @csrf
                <h4>Inicio de sesión</h4>
            <label for="email" class="mensajes">Correo electrónico</label>
            <div class="input-container">
                <i class="fas fa-envelope"></i>
                    <input type="text" name="email" value="{{old('email')}}">
                  
            </div>
            @error('email')
            <span class="error " > {{ $message }}</span><br> 
            @enderror
            <label for="password" class="mensajes">Contraseña</label>
            <div class="input-container">
                <i class="fas fa-key"></i>
                    <input type="password" name="password">
            </div>
            @error('password')
                    <span class="error"> {{ $message}}</span><br>
                    @enderror
            <input type="submit" value="Entrar" id="acceder">
            </form>
        </div>
    </div>
</body>
</html>