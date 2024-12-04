@extends('layouts.plantilla1')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/prereserva.css') }}">
<div class="content">
    <div class="left-panel">

        <div class="prox-citas-container">
            <h2 class="prox-citas">Tus Reservas</h2>
        </div>

        <!-- Mostrar las reservaciones con el estado "reservado" -->
        @foreach($reservaciones as $reservacion)
            <div class="appointment-item">
                <div class="appointment-info">
                    @if($reservacion->id_hotel)
                        <!-- Si la reservación es de un hotel -->
                        @php
                            $hotel = \App\Models\Hotel::find($reservacion->id_hotel);
                        @endphp
                        <p>{{ $hotel->nombre_hotel }}</p>
                        <span>${{ number_format($hotel->precio_noche, 2) }}</span>
                    @elseif($reservacion->id_vuelo)
                        <!-- Si la reservación es de un vuelo -->
                        @php
                            $vuelo = \App\Models\Vuelo::find($reservacion->id_vuelo);
                        @endphp
                        <p>{{ $vuelo->aerolinea->nombre }}</p>
                        <span>${{ number_format($vuelo->precio, 2) }}</span>
                    @endif
                </div>
                <!-- Formulario para cancelar la reservación -->
                <form action="{{ route('reservas.cancelar', $reservacion->id_reservacion) }}" method="POST" class="cancel-form">
                    @csrf
                    @method('DELETE')
                    <!-- Botón de cancelar -->
                    <button type="button" class="cancel-cita">Cancelar</button>
                </form>
            </div>
        @endforeach

    </div>
</div>
 
<script src="{{ asset('js/directorioC.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const eliminarBotones = document.querySelectorAll('.cancel-cita');

        eliminarBotones.forEach(boton => {
            boton.addEventListener('click', function (e) {
                e.preventDefault(); // Evita que el formulario se envíe inmediatamente

                const form = this.closest('form');

                Swal.fire({
                    title: '<span style="color:#398F9D;">¿Estás segur@ de que quieres cancelar la reserva?</span>',
                    html: `<p style="font-size: 18px; color: #398F9D;">Esta opción no se puede revertir! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque, ex! Ab delectus placeat blanditiis. Ipsa ipsam temporibus neque molestias libero fugit at consectetur quam. Ratione commodi molestias laudantium cupiditate magni. </p>`,
                    imageUrl: '{{ asset('img/logo.png') }}',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Imagen de error',
                    showCancelButton: true,
                    background: '#eaf7f8',
                    color: '#d32f2f',
                    confirmButtonColor: '#398F9D',
                    cancelButtonColor: '#233abd',
                    confirmButtonText: 'Sí, cancelar la reserva',
                    cancelButtonText: 'No, no quiero cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            imageUrl: '{{ asset('img/logo.png') }}',
                            imageWidth: 150,
                            imageHeight: 150,
                            imageAlt: 'Imagen de éxito',
                            title: '<h3 style="color:#398F9D;">Reserva cancelada correctamente</h3>',
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


@endsection
