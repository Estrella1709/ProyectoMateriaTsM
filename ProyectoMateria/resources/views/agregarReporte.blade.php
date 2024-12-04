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
            <p>
                Tipo de Reporte:
                <select name="tipo_reporte" class="form-select">
                    <option value="vuelos">Vuelos</option>
                    <option value="hoteles">Hoteles</option>
                    <option value="clientes">Clientes</option>
                </select>
            </p>
            <p>Título: <x-input-text placeholder="Título del reporte" nombre="titulo_reporte" /></p>
        </div>
        <h3>Contenido del Reporte</h3>
        <x-textarea nombre="contenido_reporte" placeholder="Ingrese el contenido detallado del reporte..." />
        <small class="text-danger">{{$errors->first('contenido_reporte')}}</small>
        <div class="buttons">
            <button type="submit" class="button edit-btn">Generar Reporte</button>
        </div>
    </form>
</div>
<br>
<br>

@endsection