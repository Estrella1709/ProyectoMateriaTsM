@extends('layouts.plantilla2')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/agregarReporte.css') }}">
<br>
<br>

        <div class="info-card">
            <div>
                <p>Cliente: <x-input-text placeholder="Nombre cliente"/></p>
                <p>Aerolínea: <x-input-text placeholder="Nombre aerolínea"/></p>
                <p>Destino: <x-input-text placeholder="Destino"/></p>
            </div>
            <h3>Información Financiera</h3>
            <x-textarea placeholder="esto es una prueba me quiero matar jajaja X3 lololollo"/>
            <div class="buttons">
                <button class="button edit-btn">Agregar</button>
            </div>
        </div>
        <br>
        <br>
       


@endsection