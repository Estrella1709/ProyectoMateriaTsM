@extends('layouts.plantilla1')

@section('contenido')
@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
@endif

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Barra lateral de filtros -->
        <aside class="col-lg-3 col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="GET" action="{{ route('vuelos.index') }}">
                        <h2 class="text-dark">Filtros <button type="reset" class="btn btn-link" onclick="this.form.reset();">Limpiar</button></h2>

                        <!-- Filtros de búsqueda -->
                        <div class="form-group">
                            <label for="origen" class="text-dark">Origen</label>
                            <select name="origen" id="origen" class="form-control">
                                <option value="">Seleccione origen</option>
                                @foreach ($destinos as $ubicacion)
                                    <option value="{{ $ubicacion->id_ubicacion }}" 
                                        {{ request('origen') == $ubicacion->id_ubicacion ? 'selected' : '' }}>
                                        {{ $ubicacion->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="destino" class="text-dark">Destino</label>
                            <select name="destino" id="destino" class="form-control">
                                <option value="">Seleccione destino</option>
                                @foreach ($destinos as $ubicacion)
                                    <option value="{{ $ubicacion->id_ubicacion }}" 
                                        {{ request('destino') == $ubicacion->id_ubicacion ? 'selected' : '' }}>
                                        {{ $ubicacion->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="aerolinea" class="text-dark">Aerolínea</label>
                            <select name="aerolinea" id="aerolinea" class="form-control">
                                <option value="">Seleccione aerolínea</option>
                                @foreach ($aerolineas as $aerolinea)
                                    <option value="{{ $aerolinea->id_aerolinea }}" 
                                        {{ request('aerolinea') == $aerolinea->id_aerolinea ? 'selected' : '' }}>
                                        {{ $aerolinea->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="precio" class="text-dark">Precio Máximo</label>
                            <input type="number" name="precio" id="precio" class="form-control" value="{{ request('precio') }}" placeholder="Precio máximo">
                        </div>

                        <div class="form-group">
                            <label for="escalas" class="text-dark">Escalas</label>
                            <select name="escalas" id="escalas" class="form-control">
                                <option value="">Seleccione número de escalas</option>
                                <option value="0" {{ request('escalas') == '0' ? 'selected' : '' }}>Sin escalas</option>
                                <option value="1" {{ request('escalas') == '1' ? 'selected' : '' }}>1 escala</option>
                                <option value="2" {{ request('escalas') == '2' ? 'selected' : '' }}>2 escalas</option>
                                <option value="3" {{ request('escalas') == '3' ? 'selected' : '' }}>3 o más escalas</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Lista de Vuelos -->
        <div class="col-lg-9 col-md-8">
            <div class="row">
                @if($vuelos->isEmpty())
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            No se encontraron vuelos con los filtros aplicados.
                        </div>
                    </div>
                @else
                    @foreach ($vuelos as $vuelo)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <img src="{{ asset('img/vuelo1.jpeg') }}" class="card-img-top img-fluid" alt="Imagen de vuelo" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-dark">{{ $vuelo->origen->nombre }} -> {{ $vuelo->destino->nombre }}</h5>
                                    <p class="card-text text-dark">Aerolínea: {{ $vuelo->aerolinea->nombre }}</p>
                                    <p class="card-text text-dark">Precio: ${{ number_format($vuelo->precio, 2) }}</p>
                                    <p class="card-text text-dark">Fecha de Salida: {{ \Carbon\Carbon::parse($vuelo->fecha_salida)->format('d/m/Y') }}</p>
                                    <p class="card-text text-dark">Fecha de Regreso: {{ \Carbon\Carbon::parse($vuelo->fecha_regreso)->format('d/m/Y') ?? 'No disponible' }}</p>
                                    <p class="card-text text-dark">Escalas: {{ $vuelo->escalas }}</p>
                                    <p class="card-text text-dark">Disponibilidad de Asientos: {{ $vuelo->disponibilidad_asientos }}</p>
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
