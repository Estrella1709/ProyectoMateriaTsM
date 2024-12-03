@extends('layouts.plantilla1')

@section('contenido')

    <link rel="stylesheet" href="{{ asset('css/detalleshotel.css') }}">
    <div class="container2">
        <div class="hotel-card">
            <img src="{{ asset('img/hotel1.jpeg') }}" alt="Foto del hotel" class="hotel-image">
            <div class="hotel-info">
                <h1>Gran Hotel</h1>
                <h2>Nombre hotel</h2>
                <p>Habitaciones: 00</p>
                <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <div class="rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>☆</span>
                    <span>☆</span>
                </div>
                <div class="icons">
                    <span>WiFi Icon</span>
                    <span>Restaurant Icon</span>
                    <span>Pool Icon</span>
                </div>
            </div>
        </div>
            <div class="calendar-container">
            <div class="form-group">
                <input type="date" class="custom-input" placeholder="Fecha de reserva" name="fechaR" value="">
                <small class="text-danger fst-italic"></small>
            </div>
                <div class="calendar-days" id="calendar-days"></div>
                <button class="reserve-btn" onclick="location.href='{{ url('reservahotel') }}'">Reservar</button>
                <p class="cancel-policy">Políticas de cancelación</p>
                <p class="policy-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
    </div>
    <script src="{{ asset('js/calendar.js') }}"></script>

@endsection