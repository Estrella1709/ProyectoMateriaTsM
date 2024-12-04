@extends('layouts.plantilla2')

@section('contenido')

@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
@endif

<link rel="stylesheet" href="{{ asset('css/agregarReporte.css') }}">
<br>
<br>

<div class="info-card">
    <form method="POST" action="{{route('hoteles.store')}}">
        @csrf
        <div>
            <p>Nombre del Hotel: <x-input-text placeholder="Nombre del hotel" nombre="nombre_h" /></p>
            <p>Estrellas: <x-input-text placeholder="Número de estrellas" nombre="estrellas" /></p>
            <p>Capacidad: <x-input-text placeholder="Capacidad de alojamiento" nombre="capacidad" /></p>
            <p>Precio por noche: <x-input-text placeholder="1000" nombre="precio_n" /></p>
            <p>Ubicación:
                <select name="ubicacion">
                    <option value="" >Seleccione una ciudad</option>
                    @foreach ($ciudades as $ciudad)
                    <option value="{{$ciudad->id_ubicacion}}">{{$ciudad->nombre}}</option>
                    @endforeach
                </select>
                <small>{{$errors->first('ubicacion')}}</small>
            </p>
            <p>Distancia al centro en KM: <x-input-text placeholder="Distancia al centro" nombre="dist_centro" /></p>
            <p>WIFI:
                <label>
                    <input type="radio" name="wifi" value="1" /> Sí
                </label>
                <label>
                    <input type="radio" name="wifi" value="0" /> No
                </label>
                <small>{{$errors->first('wifi')}}</small>
            </p>
            <p>Desayuno:
                <label>
                    <input type="radio" name="desayuno" value="1" /> Sí
                </label>
                <label>
                    <input type="radio" name="desayuno" value="0" /> No
                </label>
                <small>{{$errors->first('desayuno')}}</small>
            </p>
            <p>Piscina:
                <label>
                    <input type="radio" name="piscina" value="1" /> Sí
                </label>
                <label>
                    <input type="radio" name="piscina" value="0" /> No
                </label>
                <small>{{$errors->first('piscina')}}</small>
            </p>

        </div>
        <h3>Descripción Breve</h3>
        <x-textarea nombre="txtDesc_h" placeholder="Agrega una breve descripción del hotel." />
        <small>{{$errors->first('txtDesc_h')}}</small>
        <div class="buttons">
            <button type="submit" class="button edit-btn">Agregar</button>
        </div>
    </form>
</div>
<br>
<br>



@endsection