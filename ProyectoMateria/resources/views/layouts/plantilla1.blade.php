<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turista sin Maps</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Header -->
    <header class="container-fluid bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="mb-0"><img id="logo" src="{{ asset('img/Logo.png') }}" alt="Logo" class="img-fluid"
                    style="height: 50px;"> Turista sin Maps</h1>
            <nav>
                <a href="{{ url('hoteles') }}" class="text-white mx-3">Hoteles</a>
                <a href="{{ url('vuelos') }}" class="text-white mx-3">Vuelos</a>
                <a href="{{ url('reservas') }}" class="text-white mx-3">Reservas</a>
                <a href="{{ url('prereserva') }}" class="text-white mx-3">Pre Reservas</a>
                @auth
                <form action="{{ route('logout') }}" method="post">
                <button type="submit" class="btn-logout">Cerrar sesión {{ auth()->user()->nombre }}</button>
                </form>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container my-4">
        @yield('contenido')
    </main>

    <footer class="footer bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; {{ date('Y') }} Turista sin Maps. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>