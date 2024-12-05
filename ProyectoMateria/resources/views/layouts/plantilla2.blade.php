<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turista sin Maps - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/plantilla2.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="containerr">
        <h1><img id="logo" src="{{ asset('img/Logo.png') }}"> Turista sin Maps</h1>
        <section>
            <a href="{{route('rutaCRUDhoteles')}}"><h2 id="hoteles">Hoteles</h2></a>
            <a href="{{ route('vuelos.admin') }}"><h2 id="vuelos">Vuelos</h2></a>
            <a href="{{route('rutaCRUDreportes')}}"><h2 id="vuelos">Reportes</h2></a>
            <a href="{{route('rutaNotificaciones')}}"><h2 id="vuelos">Notificaciones</h2></a>
            <a href="{{route('rutaPoliticas')}}"><h2 id="vuelos">Políticas</h2></a>
        </section>
    </header>

        @yield('contenido')
    
    <footer class="footer bg-dark text-white text-center py-3">
        <div class="containerr">
            <p>&copy; {{ date('Y') }} Turista sin Maps. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
