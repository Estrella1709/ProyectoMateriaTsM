@extends('layouts.plantilla2')

@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/CRUDvuelos.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <div class="crud-container">
        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            </script>
        @endif

        <div class="header-section">
            <h2><i class="fas fa-plane"></i> Gestión de Vuelos</h2>
            <a href="{{ route('vuelos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Agregar Vuelo
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aerolínea</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Escalas</th>
                        <th>Fecha Salida</th>
                        <th>Fecha Regreso</th>
                        <th>Horario Salida</th>
                        <th>Horario Llegada</th>
                        <th>Capacidad</th>
                        <th>Precio</th>
                        <th>Disponibilidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vuelos as $vuelo)
                    <tr>
                        <td>{{ $vuelo->id_vuelo }}</td>
                        <td>{{ $vuelo->aerolinea->nombre }}</td>
                        <td>{{ $vuelo->origen->nombre }}</td>
                        <td>{{ $vuelo->destino->nombre }}</td>
                        <td>{{ $vuelo->escalas }}</td>
                        <td>{{ \Carbon\Carbon::parse($vuelo->fecha_salida)->format('d/m/Y') }}</td>
                        <td>{{ $vuelo->fecha_regreso ? \Carbon\Carbon::parse($vuelo->fecha_regreso)->format('d/m/Y') : '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($vuelo->horario_salida)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($vuelo->horario_llegada)->format('H:i') }}</td>
                        <td>{{ $vuelo->capacidad }}</td>
                        <td>${{ number_format($vuelo->precio, 2) }}</td>
                        <td>
                            <span class="badge {{ $vuelo->disponibilidad_asientos > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $vuelo->disponibilidad_asientos }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button onclick="confirmEdit({{ $vuelo->id_vuelo }})" 
                                        class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <button onclick="confirmDelete({{ $vuelo->id_vuelo }})"
                                        class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <form id="delete-form-{{ $vuelo->id_vuelo }}" 
                                      action="{{ route('vuelos.destroy', $vuelo->id_vuelo) }}" 
                                      method="POST" 
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(vueloId) {
            Swal.fire({
                title: '¿Está seguro?',
                text: "Esta acción no se puede revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + vueloId).submit();
                }
            });
        }

        function confirmEdit(vueloId) {
            Swal.fire({
                title: 'Editar Vuelo',
                text: "¿Desea editar este vuelo?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, editar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/vuelos/${vueloId}/edit`;
                }
            });
        }

        // Show success message with SweetAlert2 if redirected with success message
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif
    </script>
@endsection


