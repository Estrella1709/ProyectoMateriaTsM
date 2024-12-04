@extends('layouts.plantilla2')

@section('contenido')
<div class="container form-container">
    <h2>Editar Vuelo</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('vuelos.update', $vuelo->id_vuelo) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Aerolínea</label>
            <select name="id_aerolinea" class="form-control @error('id_aerolinea') is-invalid @enderror" required>
                <option value="">Seleccione una aerolínea</option>
                @foreach($aerolineas as $aerolinea)
                    <option value="{{ $aerolinea->id_aerolinea }}" 
                        {{ (old('id_aerolinea', isset($vuelo) ? $vuelo->id_aerolinea : '')) == $aerolinea->id_aerolinea ? 'selected' : '' }}>
                        {{ $aerolinea->nombre }}
                    </option>
                @endforeach
            </select>
            @error('id_aerolinea')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Origen</label>
            <select name="id_origen" class="form-control @error('id_origen') is-invalid @enderror" required>
                @foreach($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id_ubicacion }}" {{ $vuelo->id_origen == $ubicacion->id_ubicacion ? 'selected' : '' }}>
                        {{ $ubicacion->nombre }}
                    </option>
                @endforeach
            </select>
            @error('id_origen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Destino</label>
            <select name="id_destino" class="form-control" required>
                @foreach($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id_ubicacion }}" {{ $vuelo->id_destino == $ubicacion->id_ubicacion ? 'selected' : '' }}>
                        {{ $ubicacion->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Fecha Salida</label>
            <input type="date" name="fecha_salida" class="form-control" value="{{ $vuelo->fecha_salida }}" required>
        </div>

        <div class="form-group">
            <label>Fecha Regreso</label>
            <input type="date" name="fecha_regreso" class="form-control" value="{{ $vuelo->fecha_regreso }}">
        </div>

        <div class="form-group">
            <label>Horario Salida</label>
            <input type="time" 
                   name="horario_salida" 
                   class="form-control @error('horario_salida') is-invalid @enderror" 
                   value="{{ old('horario_salida', \Carbon\Carbon::parse($vuelo->horario_salida)->format('H:i')) }}" 
                   required>
            @error('horario_salida')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Horario Llegada</label>
            <input type="time" 
                   name="horario_llegada" 
                   class="form-control @error('horario_llegada') is-invalid @enderror" 
                   value="{{ old('horario_llegada', \Carbon\Carbon::parse($vuelo->horario_llegada)->format('H:i')) }}" 
                   required>
            @error('horario_llegada')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Capacidad</label>
            <input type="number" name="capacidad" class="form-control" value="{{ $vuelo->capacidad }}" required>
        </div>

        <div class="form-group">
            <label>Pasajeros</label>
            <input type="number" name="pasajeros" class="form-control" value="{{ $vuelo->pasajeros }}" required>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="{{ $vuelo->precio }}" required>
        </div>

        <div class="form-group">
            <label>Escalas</label>
            <input type="text" name="escalas" class="form-control" value="{{ $vuelo->escalas }}">
        </div>

        <div class="form-group">
            <label>Disponibilidad de Asientos</label>
            <input type="number" name="disponibilidad_asientos" class="form-control" value="{{ $vuelo->disponibilidad_asientos }}" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> 
                {{ isset($vuelo) ? 'Actualizar' : 'Crear' }} Vuelo
            </button>
            <a href="{{ route('vuelos.admin') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection