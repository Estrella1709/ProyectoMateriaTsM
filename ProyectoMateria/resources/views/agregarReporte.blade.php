@extends('layouts.plantilla2')

@section('contenido')

@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
@endif

<link rel="stylesheet" href="{{ asset('css/agregarReporte.css') }}">
<br>
<br>

<div class="info-card">
    <form method="POST" action="/envAgrRep">
        @csrf
        <div>
            <p>Cliente: <x-input-text placeholder="Nombre cliente" nombre="nombre_c" /></p>
            <p>Aerolínea: <x-input-text placeholder="Nombre aerolínea" nombre="nombre_aero" /></p>
            <p>Destino: <x-input-text placeholder="Destino" nombre="destino" /></p>
        </div>
        <h3>Información Financiera</h3>
        <x-textarea nombre="txtAR" placeholder="esto es una prueba me quiero matar jajaja X3 lololollo" />
        <small>{{$errors->first('txtAR')}}</small>
        <div class="buttons">
            <button type="submit" class="button edit-btn">Agregar</button>
        </div>
    </form>
</div>
<br>
<br>



@endsection