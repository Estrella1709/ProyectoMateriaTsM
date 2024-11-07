@extends('layouts.plantilla2')

@section('contenido')
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
    @endif
<br><br>
<link rel="stylesheet" href="{{ asset('css/notificaciones.css') }}">
<div class="container-noti">
<div class="info-card">
            <h3>Confirmación de cuenta</h3>
            <p>Auxilio ya la cague y no hice pull request, no se que mas poner asi que proceder a poner un lorem.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia fuga ad possimus alias praesentium assumenda sapiente quas maxime nam cum consequatur saepe blanditiis, eveniet non sunt nulla itaque nemo necessitatibus!</p>
            <div class="buttons">
                <button class="button edit-btn" onclick="window.location.href='{{ url('editarnoti') }}'">Editar</button>
                <button class="button delete-btn">Borrar</button>
            </div>
        </div>
        <div class="info-card">
            <h3>Recordatorios</h3>
            <p>Este es el humilde recordatorio de que no debo rendirme y si se pueden hacer 23 vistas en una noche jajaj lolol equisde me quiero morir otra vez, procedere a poner el respectivo lorem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia fuga ad possimus alias praesentium assumenda sapiente quas maxime nam cum consequatur saepe blanditiis, eveniet non sunt nulla itaque nemo necessitatibus!</p>
            <div class="buttons">
                <button class="button edit-btn" onclick="window.location.href='{{ url('editarnoti') }}'">Editar</button>
                <button class="button delete-btn">Borrar</button>
            </div>
        </div>
        <div class="info-card">
            <h3>Actualizaciones</h3>
            <p>Actualizo la situacion de mi crisis ya no quiero hacer nada, ayuda ya denme una hoja de baja voluntaria pq ya no puedo más, viva el monster que me esta salvando esta noche, que no se nos olvide el lorem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia fuga ad possimus alias praesentium assumenda sapiente quas maxime nam cum consequatur saepe blanditiis, eveniet non sunt nulla itaque nemo necessitatibus!</p>
            <div class="buttons">
                <button class="button edit-btn" onclick="window.location.href='{{ url('editarnoti') }}'">Editar</button>
                <button class="button delete-btn">Borrar</button>
            </div>
        </div>
        <div class="info-card">
            <h3>Código de recuperacion</h3>
            <p>Recuperé las fuerzas y recorde que soy una ingeniera que puede con absolutamente todo y unas interfaces no me van a detener, una raya mas a la tigresa jajaja, lorem como de costumbre. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia fuga ad possimus alias praesentium assumenda sapiente quas maxime nam cum consequatur saepe blanditiis, eveniet non sunt nulla itaque nemo necessitatibus!</p>
            <div class="buttons">
                <button class="button edit-btn" onclick="window.location.href='{{ url('editarnoti') }}'">Editar</button>
                <button class="button delete-btn">Borrar</button>
            </div>
        </div>
</div>
<br>
<br>

@endsection