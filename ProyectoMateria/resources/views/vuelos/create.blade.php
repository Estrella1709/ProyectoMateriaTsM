@extends('layouts.plantilla2')

@section('contenido')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ isset($vuelo) ? 'Editar' : 'Crear Nuevo' }} Vuelo</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($vuelo) ? route('vuelos.update', $vuelo->id_vuelo) : route('vuelos.store') }}" 
                  method="POST">
                @csrf
                @if(isset($vuelo))
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="form-group col-md-6">
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

                    <div class="form-group col-md-6">
                        <label>Origen</label>
                        <select name="id_origen" class="form-control @error('id_origen') is-invalid @enderror" required>
                            @foreach($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->id_ubicacion }}">{{ $ubicacion->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_origen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Destino</label>
                        <select name="id_destino" class="form-control @error('id_destino') is-invalid @enderror" required>
                            @foreach($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->id_ubicacion }}">{{ $ubicacion->nombre }}</option>
                            @endforeach
                        </select>
                        @error('id_destino')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha Salida</label>
                        <input type="date" name="fecha_salida" class="form-control @error('fecha_salida') is-invalid @enderror" required>
                        @error('fecha_salida')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha Regreso</label>
                        <input type="date" name="fecha_regreso" class="form-control @error('fecha_regreso') is-invalid @enderror">
                        @error('fecha_regreso')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Horario Salida</label>
                        <input type="time" name="horario_salida" class="form-control @error('horario_salida') is-invalid @enderror" required>
                        @error('horario_salida')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Horario Llegada</label>
                        <input type="time" name="horario_llegada" class="form-control @error('horario_llegada') is-invalid @enderror" required>
                        @error('horario_llegada')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Capacidad</label>
                        <input type="number" name="capacidad" class="form-control @error('capacidad') is-invalid @enderror" required>
                        @error('capacidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Pasajeros</label>
                        <input type="number" name="pasajeros" class="form-control @error('pasajeros') is-invalid @enderror" required>
                        @error('pasajeros')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" required>
                        @error('precio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Escalas</label>
                        <input type="text" name="escalas" class="form-control @error('escalas') is-invalid @enderror">
                        @error('escalas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Disponibilidad de Asientos</label>
                        <input type="number" name="disponibilidad_asientos" class="form-control @error('disponibilidad_asientos') is-invalid @enderror" required>
                        @error('disponibilidad_asientos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <a href="{{ route('vuelos.admin') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> 
                        {{ isset($vuelo) ? 'Actualizar' : 'Crear' }} Vuelo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 10px;
    border: none;
}

.card-header {
    border-radius: 10px 10px 0 0;
}

.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    font-weight: 500;
    color: #495057;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 0.5rem 0.75rem;
}

.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.btn {
    padding: 0.5rem 1rem;
    border-radius: 5px;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
}
</style>
@endsection