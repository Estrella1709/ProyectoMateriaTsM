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

                        <div class="form-group">
                            <label for="fecha_salida" class="text-dark">Hora de Salida</label>
                            <select for="fecha_salida" name="fecha_salida" class="form-control">
                                <option value="">Seleccione hora de salida</option>
                                <option value="00:00" {{ request('fecha_regreso') == '00:00' ? 'selected' : '' }}>00:00</option>
                                <option value="00:30" {{ request('fecha_regreso') == '00:30' ? 'selected' : '' }}>00:30</option>
                                <option value="01:00" {{ request('fecha_regreso') == '01:00' ? 'selected' : '' }}>01:00</option>
                                <option value="01:30" {{ request('fecha_regreso') == '01:30' ? 'selected' : '' }}>01:30</option>
                                <option value="02:00" {{ request('fecha_regreso') == '02:00' ? 'selected' : '' }}>02:00</option>
                                <option value="02:30" {{ request('fecha_regreso') == '02:30' ? 'selected' : '' }}>02:30</option>
                                <option value="03:00" {{ request('fecha_regreso') == '03:00' ? 'selected' : '' }}>03:00</option>
                                <option value="03:30" {{ request('fecha_regreso') == '03:30' ? 'selected' : '' }}>03:30</option>
                                <option value="04:00" {{ request('fecha_regreso') == '04:00' ? 'selected' : '' }}>04:00</option>
                                <option value="04:30" {{ request('fecha_regreso') == '04:30' ? 'selected' : '' }}>04:30</option>
                                <option value="05:00" {{ request('fecha_regreso') == '05:00' ? 'selected' : '' }}>05:00</option>
                                <option value="05:30" {{ request('fecha_regreso') == '05:30' ? 'selected' : '' }}>05:30</option>
                                <option value="06:00" {{ request('fecha_regreso') == '06:00' ? 'selected' : '' }}>06:00</option>
                                <option value="06:30" {{ request('fecha_regreso') == '06:30' ? 'selected' : '' }}>06:30</option>
                                <option value="07:00" {{ request('fecha_regreso') == '07:00' ? 'selected' : '' }}>07:00</option>
                                <option value="07:30" {{ request('fecha_regreso') == '07:30' ? 'selected' : '' }}>07:30</option>
                                <option value="08:00" {{ request('fecha_regreso') == '08:00' ? 'selected' : '' }}>08:00</option>
                                <option value="08:30" {{ request('fecha_regreso') == '08:30' ? 'selected' : '' }}>08:30</option>
                                <option value="09:00" {{ request('fecha_regreso') == '09:00' ? 'selected' : '' }}>09:00</option>
                                <option value="09:30" {{ request('fecha_regreso') == '09:30' ? 'selected' : '' }}>09:30</option>
                                <option value="10:00" {{ request('fecha_regreso') == '10:00' ? 'selected' : '' }}>10:00</option>
                                <option value="10:30" {{ request('fecha_regreso') == '10:30' ? 'selected' : '' }}>10:30</option>
                                <option value="11:00" {{ request('fecha_regreso') == '11:00' ? 'selected' : '' }}>11:00</option>
                                <option value="11:30" {{ request('fecha_regreso') == '11:30' ? 'selected' : '' }}>11:30</option>
                                <option value="12:00" {{ request('fecha_regreso') == '12:00' ? 'selected' : '' }}>12:00</option>
                                <option value="12:30" {{ request('fecha_regreso') == '12:30' ? 'selected' : '' }}>12:30</option>
                                <option value="13:00" {{ request('fecha_regreso') == '13:00' ? 'selected' : '' }}>13:00</option>
                                <option value="13:30" {{ request('fecha_regreso') == '13:30' ? 'selected' : '' }}>13:30</option>
                                <option value="14:00" {{ request('fecha_regreso') == '14:00' ? 'selected' : '' }}>14:00</option>
                                <option value="14:30" {{ request('fecha_regreso') == '14:30' ? 'selected' : '' }}>14:30</option>
                                <option value="15:00" {{ request('fecha_regreso') == '15:00' ? 'selected' : '' }}>15:00</option>
                                <option value="15:30" {{ request('fecha_regreso') == '15:30' ? 'selected' : '' }}>15:30</option>
                                <option value="16:00" {{ request('fecha_regreso') == '16:00' ? 'selected' : '' }}>16:00</option>
                                <option value="16:30" {{ request('fecha_regreso') == '16:30' ? 'selected' : '' }}>16:30</option>
                                <option value="17:00" {{ request('fecha_regreso') == '17:00' ? 'selected' : '' }}>17:00</option>
                                <option value="17:30" {{ request('fecha_regreso') == '17:30' ? 'selected' : '' }}>17:30</option>
                                <option value="18:00" {{ request('fecha_regreso') == '18:00' ? 'selected' : '' }}>18:00</option>
                                <option value="18:30" {{ request('fecha_regreso') == '18:30' ? 'selected' : '' }}>18:30</option>
                                <option value="19:00" {{ request('fecha_regreso') == '19:00' ? 'selected' : '' }}>19:00</option>
                                <option value="19:30" {{ request('fecha_regreso') == '19:30' ? 'selected' : '' }}>19:30</option>
                                <option value="20:00" {{ request('fecha_regreso') == '20:00' ? 'selected' : '' }}>20:00</option>
                                <option value="20:30" {{ request('fecha_regreso') == '20:30' ? 'selected' : '' }}>20:30</option>
                                <option value="21:00" {{ request('fecha_regreso') == '21:00' ? 'selected' : '' }}>21:00</option>
                                <option value="21:30" {{ request('fecha_regreso') == '21:30' ? 'selected' : '' }}>21:30</option>
                                <option value="22:00" {{ request('fecha_regreso') == '22:00' ? 'selected' : '' }}>22:00</option>
                                <option value="22:30" {{ request('fecha_regreso') == '22:30' ? 'selected' : '' }}>22:30</option>
                                <option value="23:00" {{ request('fecha_regreso') == '23:00' ? 'selected' : '' }}>23:00</option>
                                <option value="23:30" {{ request('fecha_regreso') == '23:30' ? 'selected' : '' }}>23:30</option>
                                <option value="24:00" {{ request('fecha_regreso') == '24:00' ? 'selected' : '' }}>24:00</option>                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="fecha_regreso" class="text-dark">Hora de Regreso</label>
                            <select for="fecha_regreso" name="fecha_regreso" class="form-control">
                                <option value="">Seleccione hora de regreso</option>
                                <option value="00:00" {{ request('fecha_regreso') == '00:00' ? 'selected' : '' }}>00:00</option>
                                <option value="00:30" {{ request('fecha_regreso') == '00:30' ? 'selected' : '' }}>00:30</option>
                                <option value="01:00" {{ request('fecha_regreso') == '01:00' ? 'selected' : '' }}>01:00</option>
                                <option value="01:30" {{ request('fecha_regreso') == '01:30' ? 'selected' : '' }}>01:30</option>
                                <option value="02:00" {{ request('fecha_regreso') == '02:00' ? 'selected' : '' }}>02:00</option>
                                <option value="02:30" {{ request('fecha_regreso') == '02:30' ? 'selected' : '' }}>02:30</option>
                                <option value="03:00" {{ request('fecha_regreso') == '03:00' ? 'selected' : '' }}>03:00</option>
                                <option value="03:30" {{ request('fecha_regreso') == '03:30' ? 'selected' : '' }}>03:30</option>
                                <option value="04:00" {{ request('fecha_regreso') == '04:00' ? 'selected' : '' }}>04:00</option>
                                <option value="04:30" {{ request('fecha_regreso') == '04:30' ? 'selected' : '' }}>04:30</option>
                                <option value="05:00" {{ request('fecha_regreso') == '05:00' ? 'selected' : '' }}>05:00</option>
                                <option value="05:30" {{ request('fecha_regreso') == '05:30' ? 'selected' : '' }}>05:30</option>
                                <option value="06:00" {{ request('fecha_regreso') == '06:00' ? 'selected' : '' }}>06:00</option>
                                <option value="06:30" {{ request('fecha_regreso') == '06:30' ? 'selected' : '' }}>06:30</option>
                                <option value="07:00" {{ request('fecha_regreso') == '07:00' ? 'selected' : '' }}>07:00</option>
                                <option value="07:30" {{ request('fecha_regreso') == '07:30' ? 'selected' : '' }}>07:30</option>
                                <option value="08:00" {{ request('fecha_regreso') == '08:00' ? 'selected' : '' }}>08:00</option>
                                <option value="08:30" {{ request('fecha_regreso') == '08:30' ? 'selected' : '' }}>08:30</option>
                                <option value="09:00" {{ request('fecha_regreso') == '09:00' ? 'selected' : '' }}>09:00</option>
                                <option value="09:30" {{ request('fecha_regreso') == '09:30' ? 'selected' : '' }}>09:30</option>
                                <option value="10:00" {{ request('fecha_regreso') == '10:00' ? 'selected' : '' }}>10:00</option>
                                <option value="10:30" {{ request('fecha_regreso') == '10:30' ? 'selected' : '' }}>10:30</option>
                                <option value="11:00" {{ request('fecha_regreso') == '11:00' ? 'selected' : '' }}>11:00</option>
                                <option value="11:30" {{ request('fecha_regreso') == '11:30' ? 'selected' : '' }}>11:30</option>
                                <option value="12:00" {{ request('fecha_regreso') == '12:00' ? 'selected' : '' }}>12:00</option>
                                <option value="12:30" {{ request('fecha_regreso') == '12:30' ? 'selected' : '' }}>12:30</option>
                                <option value="13:00" {{ request('fecha_regreso') == '13:00' ? 'selected' : '' }}>13:00</option>
                                <option value="13:30" {{ request('fecha_regreso') == '13:30' ? 'selected' : '' }}>13:30</option>
                                <option value="14:00" {{ request('fecha_regreso') == '14:00' ? 'selected' : '' }}>14:00</option>
                                <option value="14:30" {{ request('fecha_regreso') == '14:30' ? 'selected' : '' }}>14:30</option>
                                <option value="15:00" {{ request('fecha_regreso') == '15:00' ? 'selected' : '' }}>15:00</option>
                                <option value="15:30" {{ request('fecha_regreso') == '15:30' ? 'selected' : '' }}>15:30</option>
                                <option value="16:00" {{ request('fecha_regreso') == '16:00' ? 'selected' : '' }}>16:00</option>
                                <option value="16:30" {{ request('fecha_regreso') == '16:30' ? 'selected' : '' }}>16:30</option>
                                <option value="17:00" {{ request('fecha_regreso') == '17:00' ? 'selected' : '' }}>17:00</option>
                                <option value="17:30" {{ request('fecha_regreso') == '17:30' ? 'selected' : '' }}>17:30</option>
                                <option value="18:00" {{ request('fecha_regreso') == '18:00' ? 'selected' : '' }}>18:00</option>
                                <option value="18:30" {{ request('fecha_regreso') == '18:30' ? 'selected' : '' }}>18:30</option>
                                <option value="19:00" {{ request('fecha_regreso') == '19:00' ? 'selected' : '' }}>19:00</option>
                                <option value="19:30" {{ request('fecha_regreso') == '19:30' ? 'selected' : '' }}>19:30</option>
                                <option value="20:00" {{ request('fecha_regreso') == '20:00' ? 'selected' : '' }}>20:00</option>
                                <option value="20:30" {{ request('fecha_regreso') == '20:30' ? 'selected' : '' }}>20:30</option>
                                <option value="21:00" {{ request('fecha_regreso') == '21:00' ? 'selected' : '' }}>21:00</option>
                                <option value="21:30" {{ request('fecha_regreso') == '21:30' ? 'selected' : '' }}>21:30</option>
                                <option value="22:00" {{ request('fecha_regreso') == '22:00' ? 'selected' : '' }}>22:00</option>
                                <option value="22:30" {{ request('fecha_regreso') == '22:30' ? 'selected' : '' }}>22:30</option>
                                <option value="23:00" {{ request('fecha_regreso') == '23:00' ? 'selected' : '' }}>23:00</option>
                                <option value="23:30" {{ request('fecha_regreso') == '23:30' ? 'selected' : '' }}>23:30</option>
                                <option value="24:00" {{ request('fecha_regreso') == '24:00' ? 'selected' : '' }}>24:00</option>
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
                                    <p class="card-text text-dark">Hora de Salida: {{ \Carbon\Carbon::parse($vuelo->horario_salida)->format('H:i') }}</p>
                                    <p class="card-text text-dark">Hora de Llegada: {{ \Carbon\Carbon::parse($vuelo->horario_llegada)->format('H:i') }}</p> 
                                    <p class="card-text text-dark">Precio: ${{ number_format($vuelo->precio, 2) }}</p>
                                    <p class="card-text text-dark">Escalas: {{ $vuelo->escalas }}</p>
                                    <p class="card-text text-dark">Disponibilidad de Asientos: {{ $vuelo->disponibilidad_asientos }}</p>
                                    <a href="{{ route('vuelos.detalles', $vuelo->id_vuelo) }}" class="btn btn-primary">Detalles</a>
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
