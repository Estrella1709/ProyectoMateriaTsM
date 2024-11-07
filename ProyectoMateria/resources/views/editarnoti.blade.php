@extends('layouts.plantilla2')

@section('contenido')

<br><br>

<link rel="stylesheet" href="{{ asset('css/editarnoti.css') }}">
<div class="info-card">
    <form method="POST" action="/envEditNoti">
    @csrf
        <h3>Código de recuperacion</h3>
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