@extends('layouts.plantilla2')

@section('contenido')

@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
@endif

<link rel="stylesheet" href="{{ asset('css/agregarReporte.css') }}">
<br>
<br>

<div class="info-card">
    <form method="POST" action="{{route('hoteles.update', $hotel->id_hotel)}}">
        @csrf
        @method('PUT')
        <div>
            <p>Nombre del Hotel: <x-input-edit placeholder="Nombre del hotel" nombre="nombre_h"
                    valor="{{$hotel->nombre_hotel}}" /></p>
            <p>Estrellas: <x-input-edit placeholder="Número de estrellas" nombre="estrellas"
                    valor="{{$hotel->estrellas}}" /></p>
            <p>Capacidad: <x-input-edit placeholder="Capacidad de alojamiento" nombre="capacidad"
                    valor="{{$hotel->capacidad}}" /></p>
            <p>Precio por noche: <x-input-edit placeholder="1000" nombre="precio_n" valor="{{$hotel->precio_noche}}" /></p>
            <p>Ubicación:
                <select name="ubicacion">
                    <option>Seleccione una ciudad</option>
                    @foreach ($ciudades as $ciudad)
                        <option value="{{ $ciudad->id_ubicacion }}" {{ $hotel->ubicacion == $ciudad->id_ubicacion ? 'selected' : '' }}>
                            {{ $ciudad->nombre }}
                        </option>
                    @endforeach
                </select>
            </p>
            <p>Distancia al centro en KM: <x-input-edit placeholder="Distancia al centro" nombre="dist_centro"
                    valor="{{$hotel->distancia_al_centro}}" /></p>
            <p>WIFI:
                <label>
                    <input type="radio" name="wifi" value="1" {{$hotel->wifi == 1 ? 'checked' : ''}} /> Sí
                </label>
                <label>
                    <input type="radio"  name="wifi" value="0" {{$hotel->wifi == 0 ? 'checked' : ''}}/> No
                </label>
            </p>
            <p>Desayuno:
                <label>
                    <input type="radio" name="desayuno" value="1" {{$hotel->desayuno == 1 ? 'checked' : ''}}/> Sí
                </label>
                <label>
                    <input type="radio" name="desayuno" value="0" {{$hotel->desayuno == 0 ? 'checked' : ''}} /> No
                </label>
            </p>
            <p>Piscina:
                <label>
                    <input type="radio" name="piscina" value="1" {{$hotel->piscina == 1 ? 'checked' : ''}} /> Sí
                </label>
                <label>
                    <input type="radio" name="piscina" value="0" {{$hotel->piscina == 0 ? 'checked' : ''}} /> No
                </label>
            </p>

        </div>
        <h3>Descripción Breve</h3>
        <textarea name="txtDesc_h" >{{$hotel->descripcion}}</textarea>
        <small>{{$errors->first('txtDesc_h')}}</small>
        <div class="buttons">
            <button type="submit" class="button edit-btn">Actualizar</button>
        </div>
    </form>
</div>
<br>
<br>



@endsection