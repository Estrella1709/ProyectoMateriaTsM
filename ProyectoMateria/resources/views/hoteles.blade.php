@extends('layouts.plantilla1')

@section('contenido')
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
@endif

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar de Filtros -->
        <aside class="col-lg-3 col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="GET" action="{{ route('hoteles.index') }}" id="filterForm">
                        <h2 class="text-dark">Filtros <button type="button" class="btn btn-link" onclick="resetFilters()">Limpiar</button></h2>

                        <div class="form-group">
                            <label for="ubicacion" class="text-dark">Destino</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ciudad o zona" value="{{ request('ubicacion') }}">
                        </div>

                        <div class="form-group">
                            <label class="text-dark">Fechas</label>
                            <div>
                                <label for="fecha_desde" class="text-dark">Desde:</label>
                                <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" value="{{ request('fecha_desde') }}">
                            </div>
                            <div>
                                <label for="fecha_hasta" class="text-dark">Hasta:</label>
                                <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" value="{{ request('fecha_hasta') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="numero_habitaciones" class="text-dark">Número de habitaciones</label>
                            <input type="number" class="form-control" id="numero_habitaciones" name="numero_habitaciones" value="{{ request('numero_habitaciones') }}" min="1">
                        </div>

                        <div class="form-group">
                            <label for="numero_huespedes" class="text-dark">Número de huéspedes</label>
                            <input type="number" class="form-control" id="numero_huespedes" name="numero_huespedes" value="{{ request('numero_huespedes') }}" min="1">
                        </div>

                        <div class="form-group">
                            <label class="text-dark">Categoría (estrellas)</label>
                            <div class="stars-filter">
                                @for ($i = 5; $i >= 1; $i--)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="estrellas" id="estrellas{{ $i }}" value="{{ $i }}" {{ request('estrellas') == $i ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="estrellas{{ $i }}">
                                            {{ str_repeat('★', $i) }}
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-dark">Servicios</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="wifi" id="wifi" {{ request('wifi') ? 'checked' : '' }}>
                                <label class="form-check-label text-dark" for="wifi">Wifi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="piscina" id="piscina" {{ request('piscina') ? 'checked' : '' }}>
                                <label class="form-check-label text-dark" for="piscina">Piscina</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="desayuno" id="desayuno" {{ request('desayuno') ? 'checked' : '' }}>
                                <label class="form-check-label text-dark" for="desayuno">Desayuno incluido</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precio_maximo" class="text-dark">Precio máximo</label>
                            <input type="number" class="form-control" id="precio_maximo" name="precio_maximo" value="{{ request('precio_maximo') }}" step="0.01" min="0">
                        </div>

                        <div class="form-group">
                            <label for="distancia_al_centro" class="text-dark">Distancia al centro</label>
                            <input type="number" class="form-control" id="distancia_al_centro" name="distancia_al_centro" value="{{ request('distancia_al_centro') }}" step="0.01" min="0">
                        </div>

                        <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Lista de Hoteles -->
        <div class="col-lg-9 col-md-8">
            <div class="row">
                @if($hoteles->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            No se encontraron hoteles con los filtros aplicados.
                        </div>
                    </div>
                @else
                    @foreach ($hoteles as $hotel)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <img src="{{ asset('img/hotel_placeholder.jpeg') }}" class="card-img-top img-fluid" alt="Imagen de hotel" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">{{ $hotel->nombre_hotel }}</h5>
                                    <p class="card-text text-dark">Categoría: {{ str_repeat('★', $hotel->estrellas) }}</p>
                                    <p class="card-text text-dark">Habitaciones disponibles: {{ $hotel->disponibilidad_habitaciones }}</p>
                                    <p class="card-text text-dark">Precio por noche: ${{ number_format($hotel->precio_noche, 2) }}</p>
                                    <p class="card-text text-dark">Distancia al centro: {{ $hotel->distancia_al_centro }} km</p>
                                    <div class="card-text text-dark">
                                        Servicios:
                                        @if($hotel->wifi) 📶 @endif
                                        @if($hotel->piscina) 🏊 @endif
                                        @if($hotel->desayuno) 🍽️ @endif
                                    </div>
                                    <a href="#" class="btn btn-primary mt-2">Detalles</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function resetFilters() {
        document.getElementById('filterForm').reset();
        document.querySelectorAll('#filterForm input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
        document.querySelectorAll('#filterForm input[type="radio"]').forEach(radio => radio.checked = false);
    }
</script>
@endsection