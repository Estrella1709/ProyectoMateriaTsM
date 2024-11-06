@extends('layouts.plantilla1')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/vuelos.css') }}">
<div class="container5">
        <aside class="sidebar">
            <h2>Filtros <span class="clear">Limpiar</span></h2>
            <div class="filter-group">
                <h3>Origen</h3>
                <input type="text" name="">
            </div>
            <div class="filter-group">
                <h3>Destino</h3>
                <input type="text" name="">
            </div>
            <div class="filter-group">
                <h3>Aerolínea</h3>
                <input type="text" name="">
            </div>
            <div class="filter-group">
                <h3>Precio</h3>
                <input type="range" min="0" max="500" step="10">
            </div>
        </aside>

        <main class="hotel-list">
    <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        <x-vuelo-card
            name="Aerolínea star"
            origen="Mexico"
            destiny="Colombia"
            image="img/vuelo1.jpeg"
        />
        </main>
    
</div>

@endsection