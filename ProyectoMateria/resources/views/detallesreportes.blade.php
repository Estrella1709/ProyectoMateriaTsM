@extends('layouts.plantilla2')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/detallesreportes.css') }}">
<div class="container">
        <!-- Tarjeta de información -->
        <div class="info-card">
            <div>
                <p>Cliente:</p>
                <p>Aerolínea:</p>
                <p>Destino:</p>
            </div>
            <h3>Información Financiera</h3>
            <div class="buttons">
                <button class="button edit-btn">Editar</button>
                <button class="button delete-btn">Borrar</button>
            </div>
        </div>

        <!-- Tarjeta de gráfico -->
        <div class="chart-card">
            <div class="chart"></div>
            <div class="chart-labels">
                <p>Aerolínea:</p>
                <p>Destino:</p>
            </div>
        </div>
    </div>

@endsection