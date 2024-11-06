@extends('layouts.plantilla1')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/reservavuelo.css') }}">
<div class="container3">

        <div class="hotel-card">
            <img src="{{ asset('img/vuelo1.jpeg') }}" alt="Foto del vuelo" class="hotel-image">
            <div class="hotel-info">
                <h1>Aerlínea Star</h1>
                <p>Origen: </p>
                <p>Destino: </p>
                <p>Fechas:</p>
                <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
        </div>

        <div class="payment-container">
            <h2>Método de Pago</h2>
            <form class="payment-form">
                <select>
                    <option>Tipo de tarjeta</option>
                    <option>Visa</option>
                    <option>MasterCard</option>
                    <option>Amex</option>
                </select>
                <input type="text" placeholder="Número de tarjeta">
                <div class="form-row">
                    <input type="text" placeholder="Fecha">
                    <input type="text" placeholder="CVV">
                </div>
                <button type="submit" class="pay-button">Pagar</button>
            </form>
            <p class="cancel-policy">Políticas de cancelación</p>
            <p class="policy-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
</div>

@endsection
