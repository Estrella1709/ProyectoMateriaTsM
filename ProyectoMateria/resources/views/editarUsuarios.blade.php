@extends('layouts.plantilla2')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/editarUsuarios.css') }}">
<br>
<br>

        <div class="info-card">
            <form method="POST" action="/envEditUsuarios">
            @csrf
                <div>
                    <p>Nombre Cliente: <x-input-text placeholder="Nuevo nombre" nombre="nuevo_n" /></p>
                    <p>Correo: <x-input-text placeholder="Nuevo correo" nombre="nuevo_c"/></p>
                    <p>Teléfono: <x-input-text placeholder="Nuevo teléfono" nombre="nuevo_t"/></p>
                </div>
                <div class="buttons">
                    <button type="submit" class="button edit-btn">Confirmar Cambios</button>
                    <button class="button cancel-btn">Cancelar</button>
                </div>
            </form>
        </div>
        <br>
        <br>
       


@endsection