@extends('layouts.plantilla2')

@section('contenido')

<br><br>
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
@endif

<link rel="stylesheet" href="{{ asset('css/editarpoliticas.css') }}">

<div class="info-card">
    <!-- Formulario para editar la política -->
    <form method="POST" action="{{ route('rutaActualizarPolitica', ['id' => $politica->id_politica]) }}">
        @csrf
        @method('PUT') <!-- Aquí se usa el método PUT para indicar que es una actualización -->

        <h3>Políticas de cancelación</h3>
        
        <!-- Textarea donde se editará la descripción de la política -->
        <textarea nombre="txtpoliticas" placeholder="Escribe aquí la nueva política">{{ old('txtpoliticas', $politica->descripcion) }}</textarea>

        <!-- Mostrar cualquier error de validación -->
        <small>{{ $errors->first('txtpoliticas') }}</small>

        <div class="buttons">
            <button type="submit" class="button edit-btn">Confirmar Cambios</button>
        </div>
    </form>
</div>

<br><br>
@endsection
