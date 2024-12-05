@extends('layouts.plantilla2')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/agregarReporte.css') }}">

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="info-card">
        <form method="POST" action="{{ route('reportes.update', $reporte->id_reporte) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_usuario" value="{{ $reporte->id_usuario }}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p>
                        Tipo de Reporte:
                        <select name="tipo_reporte" class="form-select @error('tipo_reporte') is-invalid @enderror">
                            <option value="vuelos" {{ $reporte->tipo_reporte == 'vuelos' ? 'selected' : '' }}>Vuelos</option>
                            <option value="hoteles" {{ $reporte->tipo_reporte == 'hoteles' ? 'selected' : '' }}>Hoteles</option>
                            <option value="clientes" {{ $reporte->tipo_reporte == 'clientes' ? 'selected' : '' }}>Clientes</option>
                        </select>
                        @error('tipo_reporte')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        Estado:
                        <select name="estado_reporte" class="form-select @error('estado_reporte') is-invalid @enderror">
                            <option value="pendiente" {{ $reporte->estado_reporte == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="resuelto" {{ $reporte->estado_reporte == 'resuelto' ? 'selected' : '' }}>Resuelto</option>
                        </select>
                        @error('estado_reporte')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </p>
                </div>
            </div>
            <p>
                Título: 
                <x-input-text placeholder="Título del reporte" nombre="titulo_reporte" value="{{ old('titulo_reporte', $reporte->titulo_reporte) }}" />
                @error('titulo_reporte')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </p>
            <h3>Contenido del Reporte</h3>
            <x-textarea nombre="contenido_reporte" placeholder="Ingrese el contenido detallado del reporte..." value="{{ old('contenido_reporte', $reporte->contenido_reporte) }}" />
            @error('contenido_reporte')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <small class="text-danger">{{$errors->first('contenido_reporte')}}</small>
            <div class="buttons mt-3">
                <button type="submit" class="button edit-btn">Actualizar Reporte</button>
                <a href="{{ route('reportes.index') }}" class="button cancel-btn">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            timer: 3000
        });
    @endif
</script>
@endsection