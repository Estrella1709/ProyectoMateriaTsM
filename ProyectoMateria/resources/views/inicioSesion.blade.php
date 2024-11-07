<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión - Turista sin Maps</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            background-image: url('img/inicioSesion1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/inicioSesion.css') }}">
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

        <form method="POST" action="/envLogin">
            @csrf
            <h3>Inicio de Sesión</h3>

            <x-input-text placeholder="Correo Electrónico" nombre="correoLogin" />

            <div class="form-group">
                <input type="password" class="custom-input" placeholder="Contraseña" name="pwdLogin">
                <small class="text-danger fst-italic"> {{$errors->first('pwdLogin')}}</small>
            </div>

            <a href="{{'recuperacionCuenta'}}">¿Olvidaste tu contraseña?</a>
            <br>
            <a href="{{'registro'}}">Registrarse</a>
            <br>
            <br>
            <div class="btn-container">
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>

        
    </div>
</body>

</html>