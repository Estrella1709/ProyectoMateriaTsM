@extends('layouts.plantilla1')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/detallesvuelo.css') }}">
<div class="container2">
    <div class="hotel-card">
        <img src="{{ asset('img/vuelo1.jpeg') }}" alt="Foto del vuelo" class="hotel-image">
        <div class="hotel-info">
            <h1>Aerolínea: {{ $vuelo->aerolinea->nombre }}</h1>
            <p>Origen: {{ $vuelo->origen->nombre }}</p>
            <p>Destino: {{ $vuelo->destino->nombre }}</p>
            <p>Precio: ${{ number_format($vuelo->precio, 2) }}</p>
            <p>Escalas: {{ $vuelo->escalas ?? 'Sin escalas' }}</p>
            <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        </div>
    </div>
    <div class="calendar-container">
        <form id="reserveForm" action="{{ route('reservar.vuelo', ['id_vuelo' => $vuelo->id_vuelo]) }}" method="POST">
            @csrf
            <button type="button" id="reserveBtn" class="reserve-btn">Reservar</button>
        </form>

        <p class="cancel-policy">Políticas de cancelación</p>
        @foreach($politicas as $politica)
        <p class="policy-description">{{ $politica->descripcion }}</p>
        @endforeach
    </div>

</div>

<script src="{{ asset('js/calendar.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const reserveButton = document.getElementById('reserveBtn');
        const form = document.getElementById('reserveForm');

        reserveButton.addEventListener('click', function (e) {
            e.preventDefault(); // Evita que el formulario se envíe inmediatamente

            Swal.fire({
                title: '<span style="color:#398F9D;">¿Estás segur@ de que quieres hacer esta pre-reserva?</span>',
                imageUrl: '{{ asset('img/logo.png') }}',
                imageWidth: 150,
                imageHeight: 150,
                imageAlt: 'Imagen de error',
                showCancelButton: true,
                background: '#eaf7f8',
                color: '#d32f2f',
                confirmButtonColor: '#398F9D',
                cancelButtonColor: '#233abd',
                confirmButtonText: 'Sí, hacer la pre-reserva',
                cancelButtonText: 'No, no quiero hacer la pre-reserva'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        imageUrl: '{{ asset('img/logo.png') }}',
                        imageWidth: 150,
                        imageHeight: 150,
                        imageAlt: 'Imagen de éxito',
                        title: '<h3 style="color:#398F9D;">¡Pre-reserva realizada correctamente!</h3>',
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
