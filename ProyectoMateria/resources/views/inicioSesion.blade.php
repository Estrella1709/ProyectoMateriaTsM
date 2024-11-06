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

    <link rel="stylesheet" href="{{ asset('css/inicioSesion.css') }}"> 
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{asset('img/Logo.png')}}" alt="Logo"> 
            <h1>Turista sin Maps</h1>
        </div>
        <h3>Inicio de Sesión</h3>   
        <x-input-text placeholder="Correo Electrónico"/>
        <x-input-text placeholder="Contraseña"/>
        <a href="">¿Olvidaste tu contraseña?</a>
        <br>
        <a href="">Registrarse</a>
        <br>
        <br>
        <div class="btn-container">
            <button type="button">Iniciar sesión</button>
        </div>
    </div>
</body>
</html>
