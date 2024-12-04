@extends('layouts.plantilla1')

@section('contenido')

    <link rel="stylesheet" href="{{ asset('css/detalleshotel.css') }}">
    <div class="container2">
        <div class="hotel-card">
            <img src="{{ asset('img/hotel1.jpeg') }}" alt="Foto del hotel" class="hotel-image">
            <div class="hotel-info">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{ $hotel->nombre_hotel }}</h5>
                    <p>Descripción: {{ $hotel->descripcion }}</p>
                    <p class="card-text text-dark">Categoría: {{ str_repeat('★', $hotel->estrellas) }}</p>
                    <p class="card-text text-dark">Habitaciones disponibles: {{ $hotel->disponibilidad_habitaciones }}</p>
                    <p class="card-text text-dark">Precio por noche: ${{ number_format($hotel->precio_noche, 2) }}</p>
                    <p class="card-text text-dark">Distancia al centro: {{ $hotel->distancia_al_centro }} km</p>
                    <div class="card-text text-dark">
                        Servicios:
                        @if($hotel->wifi) 📶 @endif
                        @if($hotel->piscina) 🏊 @endif
                        @if($hotel->desayuno) 🍽️ @endif
                    </div>
                </div>
                <a href="{{ url('/hoteles') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
        <div class="calendar-container">
            <form id="reservationForm" action="{{ route('reservacion.crear', $hotel->id_hotel) }}" method="POST">
                @csrf
                <input type="hidden" name="id_usuario" value="{{ Auth::id() }}">
                <div class="form-group">
                    <label for="">Fecha de reserva</label><br>
                    <input type="date" class="custom-input" placeholder="Fecha de reserva" name="fechaR" value="">
                    @error('fechaR')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="calendar-days" id="calendar-days"></div>
                <button type="button" id="reserveBtn" class="reserve-btn">Reservar</button>
                <p class="cancel-policy">Políticas de cancelación</p>
                @foreach($politicas as $politica)
                <p class="policy-description">{{ $politica->descripcion }}</p>
                @endforeach
            </form>
        </div>
    </div>

    <script src="{{ asset('js/calendar.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reserveButton = document.getElementById('reserveBtn');
            const form = document.getElementById('reservationForm');

            reserveButton.addEventListener('click', function (e) {
                e.preventDefault(); // Evita que el formulario se envíe inmediatamente

                Swal.fire({
                    title: '<span style="color:#398F9D;">¿Estás segur@ de que quieres hacer esta reserva?</span>',
                    imageUrl: '{{ asset('img/logo.png') }}',
                    imageWidth: 150,
                    imageHeight: 150,
                    imageAlt: 'Imagen de error',
                    showCancelButton: true,
                    background: '#eaf7f8',
                    color: '#d32f2f',
                    confirmButtonColor: '#398F9D',
                    cancelButtonColor: '#233abd',
                    confirmButtonText: 'Sí, hacer la reserva',
                    cancelButtonText: 'No, no quiero hacer la reserva'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            imageUrl: '{{ asset('img/logo.png') }}',
                            imageWidth: 150,
                            imageHeight: 150,
                            imageAlt: 'Imagen de éxito',
                            title: '<h3 style="color:#398F9D;">¡Reserva realizada correctamente!</h3>',
                            html: `<p style="font-size: 18px; color: #398F9D;">Recuerda que puedes consultar tus pre reservas!</p>`,
                            confirmButtonText: 'Entendido',
                            background: '#eaf7f8',
                            color: '#7fe2f1',
                            confirmButtonColor: '#398F9D',
                        }).then(() => {
                            form.submit(); // Envía el formulario después de la confirmación
                        });
                    }
                });
            });
        });
    </script>

@endsection
