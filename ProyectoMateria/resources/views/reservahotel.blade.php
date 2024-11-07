@extends('layouts.plantilla1')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/reservahotel.css') }}">
<div class="container3">

        <div class="hotel-card">
            <img src="{{ asset('img/hotel1.jpeg') }}" alt="Foto del hotel" class="hotel-image">
            <div class="hotel-info">
                <h1>Gran Hotel</h1>
                <h2>Nombre hotel</h2>
                <p>Habitaciones: 00</p>
                <p>Fechas:</p>
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

        <div class="payment-container">
            <h2>Método de Pago</h2>

            @if(session('exito'))
                <x-alert title="Éxito" text="{{ session('exito') }}"></x-alert>
            @endif



            <form method="POST" action="/envReservaH" class="payment-form">
            @csrf
                <select>
                    <option>Tipo de tarjeta</option>
                    <option>Visa</option>
                    <option>MasterCard</option>
                    <option>Amex</option>
                </select>
                <input type="text" placeholder="Número de tarjeta" name="tarjeta">
                <small> {{$errors->first('tarjeta')}} </small>
                <div class="form-row">
                    <input type="text" placeholder="Mes(MM)" name="mes_exp">
                    <input type="text" placeholder="Año(YY)" name="year_exp">
                    <input type="text" placeholder="CVV" name="cvv">
                </div>
                <div class="form-row">
                    <small> {{$errors->first('mes_exp')}} </small>
                    <small> {{$errors->first('year_exp')}} </small>
                    <small> {{$errors->first('cvv')}} </small>
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

@endsection
