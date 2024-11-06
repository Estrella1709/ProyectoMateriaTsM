@extends('layouts.plantilla1')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/hotel.css') }}">

    <div class="container1">
        <!-- Sidebar de Filtros -->
        <aside class="sidebar">
            <h2>Filtros <span class="clear">Limpiar</span></h2>
            <div class="filter-group">
                <h3>Ubicaciones clave</h3>
                <label><input type="checkbox"> Centro de la ciudad</label><br>
                <label><input type="checkbox"> Puntos turísticos</label>
            </div>
            <div class="filter-group">
                <h3>Categoría (estrellas)</h3>
                <div class="stars-filter">
                    <!-- Añade estrellas de 1 a 5 aquí con input radio o checkbox -->
                    <label><input type="radio" name="stars"> ★★★★★</label><br>
                    <label><input type="radio" name="stars"> ★★★★☆</label><br>
                    <label><input type="radio" name="stars"> ★★★☆☆</label><br>
                    <label><input type="radio" name="stars"> ★★☆☆☆</label><br>
                    <label><input type="radio" name="stars"> ★☆☆☆☆</label><br>
                </div>
            </div>
            <div class="filter-group">
                <h3>Servicios</h3>
                <label><input type="checkbox"> Wifi</label><br>
                <label><input type="checkbox"> Piscina</label><br>
                <label><input type="checkbox"> Desayuno incluido</label><br><br>
                <label>Número de habitaciones<input type="number" min="1" max="100"></label>
            </div>
            <div class="filter-group">
                <h3>Precio</h3>
                <input type="range" min="0" max="500" step="10">
            </div>
        </aside>

        <!-- Sección de Tarjetas de Hoteles -->
        <main class="hotel-list">
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ★ ★ ☆"
            rooms="10"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ★ ☆ ☆"
            rooms="20"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ☆ ☆ ☆"
            rooms="10"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ★ ★ ★"
            rooms="10"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ★ ★ ☆"
            rooms="30"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ★ ☆ ☆"
            rooms="30"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ★ ★ ★"
            rooms="30"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ★ ☆ ☆"
            rooms="30"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ☆ ☆ ☆"
            rooms="10"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        <x-hotel-card
            name="Hotel Paradise"
            category="★ ★ ★ ★ ☆"
            rooms="20"
            image="img/hotel1.jpeg"
            :amenities="['📶', '🏊', '🍽️']"
        />
        

        </main>
        
    </div>
@endsection