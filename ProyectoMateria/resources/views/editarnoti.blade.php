@extends('layouts.plantilla2')

@section('contenido')

<br><br>

<link rel="stylesheet" href="{{ asset('css/editarnoti.css') }}">
<div class="info-card">
            <h3>Código de recuperacion</h3>
            <x-textarea placeholder="esto es una prueba me quiero matar jajaja lololollo"/>
            <div class="buttons">
                <button class="button edit-btn" onclick="window.location.href='{{url('notificaciones')}}'">Guardar Caambios</button>
                <button class="button delete-btn">Borrar</button>
            </div>
        </div>
<br><br>
@endsection