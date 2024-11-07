<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registro - Turista sin Maps</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            background-image: url('img/Registro.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/Registro.css') }}"> 
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{asset('img/Logo.png')}}" alt="Logo"> 
            <h1>Turista sin Maps</h1>
        </div>

        @if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif

        <form method="POST" action="/envRegistro">
            @csrf
            <h3>Registro</h3>   
            <x-input-text placeholder="Nombre" nombre="nombreRegistro"/>
            <x-input-text placeholder="Apellidos" nombre="apRegistro"/>
            <x-input-text placeholder="Correo  Electrónico" nombre="mailRegistro"/>
            <x-input-text placeholder="Teléfono" nombre="telRegistro"/>
            <x-input-text placeholder="Contraseña" nombre="pwdRegistro"/>
            <a href="{{'/'}}">¿Ya tienes una cuenta?</a>
            <br>
            <br>
            <div class="btn-container">
                <button type="submit" >Registrar</button>    
            </div>
        </form>
    </div>
</body>
</html>
