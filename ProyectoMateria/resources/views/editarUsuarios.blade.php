@extends('layouts.plantilla2')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/editarUsuarios.css') }}">
<br>
<br>

        <div class="info-card">
            <div>
                <p>Nombre Cliente: <x-input-text placeholder="Nuevo nombre"/></p>
                <p>Correo: <x-input-text placeholder="Nuevo correo"/></p>
                <p>Teléfono: <x-input-text placeholder="Nuevo teléfono"/></p>
            </div>
            <div class="buttons">
                <button class="button edit-btn">Confirmar Cambios</button>
                <button class="button cancel-btn">Cancelar</button>
            </div>
        </div>
        <br>
        <br>
       


@endsection