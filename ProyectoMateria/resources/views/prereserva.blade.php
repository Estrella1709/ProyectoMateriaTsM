@extends('layouts.plantilla1')
@section('contenido')

<link rel="stylesheet" href="{{ asset('css/prereserva.css') }}">
<div class="content">
    <div class="left-panel">

        <div class="prox-citas-container">
            <h2 class="prox-citas">Pre-reservas de Hoteles</h2>
        </div>

        <!-- Mostrar las reservas de hoteles -->
    @foreach($reservacionesHoteles as $reservacion)
        <div class="appointment-item">
            <div class="appointment-info">
                <p>{{ $reservacion->hotel->nombre_hotel }}</p> <!-- Nombre del hotel -->
                <span>${{ number_format($reservacion->hotel->precio_noche, 2) }}</span> <!-- Precio -->
                <form action="{{ route('reservas.quitar', ['id_reservacion' => $reservacion->id_reservacion]) }}" method="POST" class="cancel-form" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger cancel-pre-reserva">Quitar reserva</button>
                </form>
            </div>
        </div>
    @endforeach

        <div class="prox-citas-container">
            <h2 class="prox-citas">Pre-reservas de Vuelos</h2>
        </div>
    <!-- Mostrar las reservas de vuelos -->
    @foreach($reservacionesVuelos as $reservacion)
        <div class="appointment-item">
            <div class="appointment-info">
                <p>{{ $reservacion->vuelo->aerolinea->nombre }}</p> <!-- Nombre de la aerolínea -->
                <span>${{ number_format($reservacion->vuelo->precio, 2) }}</span> <!-- Precio del vuelo -->
                <form action="{{ route('reservas.quitar', ['id_reservacion' => $reservacion->id_reservacion]) }}" method="POST" class="cancel-form" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger cancel-pre-reserva">Quitar reserva</button>
                </form>
            </div>
        </div>
    @endforeach

    </div>

    <div class="right-panel">
        <h2 class="prox-citas">Detalles de pago</h2>

        <div class="detalles-pacientes">
            <div class="details-container">
                <div class="appointment-info">
                    <div class="details-info">
                        <p>Servicios reservados:</p>
                        <ul>
                            @foreach($serviciosReservados as $servicio)
                                <li>{{ $servicio }}</li>
                            @endforeach
                        </ul>

                        <br>
                        <p>Fecha(s) de reserva:</p>
                        <ul>
                            @foreach($reservacionesHoteles as $reservacion)
                                <li>Hotel: {{ $reservacion->fecha_reservacion }}</li>
                            @endforeach
                            @foreach($reservacionesVuelos as $reservacion)
                                <li>Vuelo: {{ $reservacion->fecha_reservacion }}</li>
                            @endforeach
                        </ul>

                        <br>
                        <p>Total a pagar: $<span id="totalpago">{{ number_format($totalPagar, 2) }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div id="recipes-section">
            <h3 class="prox-citas">Paga tu Pre-reserva</h3>
            <div class="container-cita">
                <div class="payment-container">
                    <h2>Método de Pago</h2>

                    @if(session('exito'))
                        <x-alert title="Éxito" text="{{ session('exito') }}"></x-alert>
                    @endif

                    <form method="POST" action="{{ route('reservas.actualizarEstado') }}" class="payment-form">
                        @csrf
                        <select>
                            <option>Tipo de tarjeta</option>
                            <option>Visa</option>
                            <option>MasterCard</option>
                            <option>Amex</option>
                        </select>
                            <input type="text" placeholder="Número de tarjeta" name="tarjeta">
                            @error('tarjeta')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <div class="form-row">
                            <input type="text" placeholder="Mes(MM)" name="mes_exp">
                            @error('mes_exp')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <input type="text" placeholder="Año(YY)" name="year_exp">
                            @error('year_exp')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <input type="text" placeholder="CVV" name="cvv">
                            @error('cvv')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                        @session('expirado')
                            <p>{{$value}}</p>
                        @endsession
                        <button type="submit" class="pay-button">Pagar</button>
                    </form>
                    <p class="cancel-policy">Políticas de cancelación</p>
                    <p class="policy-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="{{ asset('js/directorioC.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const eliminarBotones = document.querySelectorAll('.cancel-pre-reserva');

        eliminarBotones.forEach(boton => {
            boton.addEventListener('click', function (e) {
                e.preventDefault(); // Evita que el formulario se envíe inmediatamente

                const form = this.closest('form');

                Swal.fire({
                    title: '<span style="color:#398F9D;">¿Estás segur@ de que quieres quitar esta pre-reserva?</span>',
                    html: `<p style="font-size: 18px; color: #398F9D;">Esta opción no se puede revertir!</p>`,
                    imageUrl: '{{ asset('img/logo.png') }}',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Imagen de error',
                    showCancelButton: true,
                    background: '#eaf7f8',
                    color: '#d32f2f',
                    confirmButtonColor: '#398F9D',
                    cancelButtonColor: '#233abd',
                    confirmButtonText: 'Sí, quitar la pre-reserva',
                    cancelButtonText: 'No, no quiero quitarla'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            imageUrl: '{{ asset('img/logo.png') }}',
                            imageWidth: 150,
                            imageHeight: 150,
                            imageAlt: 'Imagen de éxito',
                            title: '<h3 style="color:#398F9D;">Pre-reserva quitada correctamente</h3>',
                            confirmButtonText: 'Entendido',
                            background: '#eaf7f8',
                            color: '#7fe2f1',
                            confirmButtonColor: '#398F9D',
                        }).then(() => {
                            form.submit(); // Ahora sí, se envía el formulario después de la confirmación
                        });
                    }
                });
            });
        });
    });
</script>

@if (session('success'))
    <script>
        Swal.fire({
            imageUrl: '{{ asset('img/logo.png') }}',
            imageWidth: 150,
            imageHeight: 150,
            imageAlt: 'Imagen de éxito',
            title: '<h3 style="color:#398F9D;">¡Operación Exitosa!</h3>',
            html: `<p style="font-size: 18px; color: #398F9D;">{{ session('success') }}</p>`,
            confirmButtonText: 'Entendido',
            background: '#eaf7f8',
            color: '#7fe2f1',
            confirmButtonColor: '#398F9D',
        });
    </script>
@endif

@endsection
