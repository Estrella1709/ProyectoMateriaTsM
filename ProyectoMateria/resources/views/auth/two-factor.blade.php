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
    
    <div class="container">
        <div class="header">
            <img src="{{asset('img/Logo.png')}}" alt="Logo">
            <h1>Turista sin Maps</h1>
        </div>
        <form method="POST" action="{{route('two-factor.verify')}}">
            @csrf
            <h3>Ingresa el código enviado a tu correo</h3>
            <x-input-text placeholder="Código de 6 dígitos" nombre="code" />
            <br>
            <br>
            <div class="btn-container">
                <button type="submit">Ingresar</button>
            </div>
        </form>
    </div>
    </div>
</body>

</html>