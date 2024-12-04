@extends('layouts.plantilla2')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/CRUDreportes.css') }}">

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <h2>Reportes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reportes as $reporte)
                    <tr>
                        <td>{{ $reporte->created_at->format('d/m/Y') }}</td>
                        <td>{{ $reporte->titulo_reporte }}</td>
                        <td>
                            <span class="badge {{ $reporte->tipo_reporte == 'vuelos' ? 'bg-primary' : 
                                    ($reporte->tipo_reporte == 'hoteles' ? 'bg-success' : 'bg-info') }}">
                                {{ ucfirst($reporte->tipo_reporte) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $reporte->estado_reporte == 'pendiente' ? 'bg-warning' : 'bg-success' }}">
                                {{ ucfirst($reporte->estado_reporte) }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('reportes.show', $reporte->id_reporte) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Ver Detalles
                                </a>
                                <button class="btn btn-sm btn-primary" 
                                        onclick="window.location.href='{{ route('reportes.edit', $reporte->id_reporte) }}'">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <form id="delete-form-{{ $reporte->id_reporte }}" 
                                      action="{{ route('reportes.destroy', $reporte->id_reporte) }}" 
                                      method="POST" 
                                      style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="confirmarEliminacion('delete-form-{{ $reporte->id_reporte }}')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay reportes disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($reportes->hasPages())
            <div class="pagination-container">
                {{ $reportes->links() }}
            </div>
        @endif
    </div>

    <div class="options-container mt-3">
        <div class="row">
            <div class="col-md-6">
                <button type="button" 
                        class="btn btn-primary" 
                        onclick="window.location.href='{{ route('reportes.create') }}'">
                    Agregar Reporte
                </button>
            </div>
            <div class="col-md-6">
                <form action="{{ route('reportes.index') }}" method="GET" class="d-flex">
                    <select name="filter" class="form-select me-2">
                        <option value="">Todos los reportes</option>
                        <option value="vuelos" {{ request('filter') == 'vuelos' ? 'selected' : '' }}>Vuelos</option>
                        <option value="hoteles" {{ request('filter') == 'hoteles' ? 'selected' : '' }}>Hoteles</option>
                        <option value="clientes" {{ request('filter') == 'clientes' ? 'selected' : '' }}>Clientes</option>
                    </select>
                    <button type="submit" class="btn btn-secondary">Filtrar</button>
                </form>
            </div>
        </div>
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

    function confirmarEliminacion(formId) {
        Swal.fire({
            title: '¿Está seguro?',
            text: "Esta acción no se puede revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>

@endsection