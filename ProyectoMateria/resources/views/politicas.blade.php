@extends('layouts.plantilla2')

@section('contenido')

<br><br>
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif

<link rel="stylesheet" href="{{ asset('css/politicas.css') }}">
<div class="info-card">
            <h3>Políticas de cancelación</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia fuga ad possimus alias praesentium assumenda sapiente quas maxime nam cum consequatur saepe blanditiis, eveniet non sunt nulla itaque nemo necessitatibus!</p>
            <div class="buttons">
                <button class="button edit-btn" onclick="window.location.href='{{ url('editarpoliticas') }}'">Editar</button>
            </div>
        </div>
<br><br>
@endsection