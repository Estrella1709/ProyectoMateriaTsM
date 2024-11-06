@extends('layouts.plantilla2')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/editarReservaH.css') }}">
<br>
<br>

        <div class="info-card">
            <div>
                <p>Hotel: </p>
                <p>No. Habitaciones: <x-input-text placeholder="No. Habitaciones"/></p>
                <p>Fecha Ingreso: <x-input-text placeholder="Fecha de ingreso"/></p>
                <p>Fecha Salida: <x-input-text placeholder="Fecha de salida"/></p>
                <p>Nombre Cliente: </p>
            </div>
            <div class="buttons">
                <button class="button edit-btn">Confirmar Cambios</button>
                <button class="button cancel-btn">Cancelar</button>
            </div>
        </div>
        <br>
        <br>
       


@endsection