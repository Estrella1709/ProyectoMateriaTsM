<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h3>Registro</h3>   
        <x-input-text placeholder="Nombre"/>
        <x-input-text placeholder="Apellidos"/>
        <x-input-text placeholder="Correo Electrónico"/>
        <x-input-text placeholder="Teléfono"/>
        <x-input-text placeholder="Contraseña"/>
        <a href="">¿Ya tienes una cuenta?</a>
        <br>
        <br>
        <div class="btn-container">
            <button type="button">Registrar</button>    
        </div>
    </div>
</body>
</html>
