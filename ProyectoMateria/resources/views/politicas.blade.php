@extends('layouts.plantilla2')

@section('contenido')

<br><br>
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif

@foreach($politicas)
<link rel="stylesheet" href="{{ asset('css/politicas.css') }}">
<div class="info-card">
            <h3>Políticas de cancelación</h3>
            <p>{{}}</p>
            <div class="buttons">
                <button class="button edit-btn" onclick="window.location.href='{{ url('editarpoliticas') }}'">Editar</button>
            </div>
        </div>
<br><br>
@endsection