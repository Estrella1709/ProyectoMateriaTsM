@extends('layouts.plantilla2')

@section('contenido')

<br><br>

<link rel="stylesheet" href="{{ asset('css/editarpoliticas.css') }}">
<div class="info-card">
            <h3>Políticas de cancelación</h3>
            <x-textarea placeholder="esto es una prueba me quiero matar x2 jajaja lololollo"/>
            <div class="buttons">
                <button class="button edit-btn" onclick="window.location.href='{{ url('politicas') }}'">Confirmar Cambios</button>
            </div>
        </div>
<br><br>
@endsection