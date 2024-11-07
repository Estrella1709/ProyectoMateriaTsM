@extends('layouts.plantilla2')

@section('contenido')

<br><br>
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif
<link rel="stylesheet" href="{{ asset('css/editarpoliticas.css') }}">
<div class="info-card">
    <form method="POST" action="/envEditPoli">
    @csrf
        <h3>Políticas de cancelación</h3>
        <x-textarea nombre="txtpoliticas" placeholder="esto es una prueba me quiero matar x2 jajaja lololollo"/>
        <small>{{$errors->first('txtpoliticas')}}</small>
        <div class="buttons">
            <button type="submit" class="button edit-btn">Confirmar Cambios</button>
        </div>
    </form>
</div>
<br><br>
@endsection