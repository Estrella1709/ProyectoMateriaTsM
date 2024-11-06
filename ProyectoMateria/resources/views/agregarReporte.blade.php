@extends('layouts.plantilla2')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/agregarReporte.css') }}">
<br>
<br>

        <div class="info-card">
            <div>
                <p>Cliente:</p>
                <p>Aerolínea:</p>
                <p>Destino:</p>
            </div>
            <h3>Información Financiera</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem soluta fuga earum quaerat molestiae illum molestias expedita incidunt necessitatibus architecto, quasi nostrum dolor ea praesentium est iure porro nihil distinctio!</p>
            <div class="buttons">
                <button class="button edit-btn">Agregar</button>
            </div>
        </div>
        <br>
        <br>
       


@endsection