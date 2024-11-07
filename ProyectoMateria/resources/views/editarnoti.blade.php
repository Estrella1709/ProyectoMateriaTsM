@extends('layouts.plantilla2')

@section('contenido')

<br><br>
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif
<link rel="stylesheet" href="{{ asset('css/editarnoti.css') }}">
<div class="info-card">
    <form method="POST" action="/envEditNoti">
    @csrf
        <h3>Edita el mensaje de tu notificación</h3>
        <x-textarea nombre="txtnotis" placeholder="esto es una prueba me quiero matar jajaja lololollo" />
        <small>{{$errors->first('txtnotis')}}</small>
        <div class="buttons">
            <button type="submit" class="button edit-btn">Guardar
                Cambios</button>
            <button class="button delete-btn">Borrar</button>
        </div>
    </form>
</div>
<br><br>
@endsection