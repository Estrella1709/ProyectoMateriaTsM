@extends('layouts.plantilla2')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/editarReservaH.css') }}">
<br>
<br>
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif

        <div class="info-card">
            <form method="POST" action="/envEditResH">
                @csrf
                <div>
                    <p>Hotel: </p>
                    <p>No. Habitaciones: <x-input-text placeholder="No. Habitaciones" nombre="habitaciones" /></p>
                    <p>Fecha Ingreso: <x-input-text placeholder="Fecha de ingreso (YYYY/MM/DD) " nombre="ingreso"/></p>
                    <p>Fecha Salida: <x-input-text placeholder="Fecha de salida (YYYY/MM/DD)" nombre="salida"/></p>
                    <p>Nombre Cliente: </p>
                </div>
                <div class="buttons">
                    <button type="submit" class="button edit-btn" >Confirmar Cambios</button>
                    <button class="button cancel-btn">Cancelar</button>
                </div>
            </form>
        </div>
        <br>
        <br>
       


@endsection