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
                <div class="calendar-header">
                    <button id="prev-month">◀</button>
                    <h2 id="month-year"></h2>
                    <button id="next-month">▶</button>
                </div>
                <div class="calendar-weekdays">
                    <div>LUN</div>
                    <div>MAR</div>
                    <div>MIÉ</div>
                    <div>JUE</div>
                    <div>VIE</div>
                    <div>SÁB</div>
                    <div>DOM</div>
                </div>
                <div class="calendar-days" id="calendar-days"></div>
                <button class="reserve-btn">Reservar</button>
                <p class="cancel-policy">Políticas de cancelación</p>
                <p class="policy-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
    </div>
    <script src="{{ asset('js/calendar.js') }}"></script>

@endsection