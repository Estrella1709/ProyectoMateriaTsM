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

    <link rel="stylesheet" href="{{ asset('css/validacionRegistro.css') }}"> 
</head>
<body>

@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif

    <div class="container">
        <div class="header">
            <img src="{{asset('img/Logo.png')}}" alt="Logo"> 
            <h1>Turista sin Maps</h1>
        </div>
        <form method="" action="{{route('login')}}">
        @csrf
            <h3>Registro</h3>   
            <br>
            <p>Se te enviará al correo que ingresaste un código de confirmación para validar tu registro</p>
            <x-input-text placeholder="Código" nombre="codigo"/>
            <a href="{{''}}">Reenviar código</a>
            <br>
            <br>
            <div class="btn-container">
                <button type="submit">Finalizar</button>
            </div>
        </form>
    </div>
</body>
</html> 