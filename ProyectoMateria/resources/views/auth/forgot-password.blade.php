<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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

    <link rel="stylesheet" href="{{ asset('css/recuperacionCuenta.css') }}">
</head>

<body>
    
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif
@session('status')
    <x-alert title="Respuesta del servidor" text="{{ session('status') }}"></x-alert>
@endsession
    
    <div class="container">
        <div class="header">
            <img src="{{asset('img/Logo.png')}}" alt="Logo">
            <h1>Turista sin Maps</h1>
        </div>
        <form method="POST" action="{{route('password.email')}}">
            @csrf
            <h3>Recuperacion de Cuenta</h3>
            <x-input-text placeholder="Escribe tu correo" nombre="email" />
            <br>
            <br>
            <div class="btn-container">
                <button type="submit">Enviar correo</button>
            </div>
        </form>
    </div>
    </div>
</body>

</html>