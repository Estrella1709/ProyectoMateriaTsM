@extends('layouts.plantilla2')

@section('contenido')

@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
@endif
@session('editado')
    <x-alert title="Hotel editado" text="{{ session('editado') }}"></x-alert>
@endsession
<link rel="stylesheet" href="{{ asset('css/CRUDhoteles.css') }}">
<br>
<br>
<br>
<div class="container">
    <div class="table-container">
        <h2>Hoteles</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre Hotel</th>
                    <th>No. Habitaciones</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Salida</th>
                    <th>Nombre Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hoteles as $hotel)
                <tr>
                    <td>{{$hotel->nombre_hotel}}</td>
                    <td>{{$hotel->capacidad}}</td>
                    <td>{{$hotel->estrellas}}</td>
                    <td>{{$hotel->ubicacion}}</td>
                    <td>{{$hotel->precio_noche}}</td>
                    <td>
                        <button class="edit-btn" onclick="location.href='{{ route('hoteles.edit', $hotel->id_hotel) }}'">Editar</button>
                        <button class="delete-btn">Cancelar</button>
                    </td>
                </tr>
                @endforeach
                
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>
    <!-- Contenedor de botones y opciones -->
    <div class="options-container payment-form">
        <button type="button" class="pay-button" onclick="window.location.href='{{ route('hoteles.create') }}'">Agregar
            Hotel</button>
    </div>
</div>
<br>
<br>
<br>
@endsection