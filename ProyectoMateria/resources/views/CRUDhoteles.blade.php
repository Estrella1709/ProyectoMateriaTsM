@extends('layouts.plantilla2')

@section('contenido')

@if(session('exito'))
    <x-alert title="Respuesta del servidor" text="{{ session('exito') }}"></x-alert>
@endif
@session('editado')
    <x-alert title="Hotel editado" text="{{ session('editado') }}"></x-alert>
@endsession
@session('eliminado')
    <x-alert title="Hotel eliminado" text="{{ session('eliminado') }}"></x-alert>
@endsession

<link rel="stylesheet" href="{{ asset('css/CRUDhoteles.css') }}">
<link rel="stylesheet" href="{{ asset('css/CRUDvuelos.css') }}">
<br>
<br>
<br>
<div class="crud-container">
    <div class="header-section">
        <h2>Hoteles</h2>
        <a href="{{ route('hoteles.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Agregar Hotel
            </a>
    </div>
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>Nombre Hotel</th>
                    <th>No. Habitaciones</th>
                    <th>Número de estrellas</th>
                    <th>Ubicación</th>
                    <th>Precio noche</th>
                    <th>Distancia al centro</th>
                    <th>WIFI</th>
                    <th>Desayuno</th>
                    <th>Piscina</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hoteles as $hotel)
                <tr>
                    <td>{{$hotel->nombre_hotel}}</td>
                    <td>{{$hotel->capacidad}}</td>
                    <td>{{$hotel->estrellas}}</td>
                    <td>{{$hotel->nombre_ubicacion ?? 'Sin ubicación'}}</td>
                    <td>{{$hotel->precio_noche}}</td>
                    <td>{{$hotel->distancia_al_centro}}</td>
                    <td>{{$hotel->wifi == 1 ? 'Si':'No' }}</td>
                    <td>{{$hotel->desayuno}}</td>
                    <td>{{$hotel->piscina}}</td>
                    <td>
                        <button class="edit-btn" onclick="location.href='{{ route('hoteles.edit', $hotel->id_hotel) }}'">Editar</button>
                        <button class="delete-btn" data-id="{{$hotel->id_hotel}}" data-url="{{ route('hoteles.destroy', $hotel->id_hotel) }}">Eliminar</button>
                    </td>
                </tr>
                @endforeach
                
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>
</div>
<br>
<br>
<br>
    <form id="deleteForm" action="" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const deleteButtons = document.querySelectorAll(".delete-btn");

            deleteButtons.forEach(button => {
                button.addEventListener("click", (e) => {
                    const hotelID = button.getAttribute("data-id");
                    const deleteUrl = button.getAttribute("data-url");
                    const deleteForm = document.getElementById("deleteForm");

                    Swal.fire({
                        title: "¿Eliminar Hotel?",
                        text: `Se borrara permanentemente este registro`,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteForm.action = deleteUrl;
                            deleteForm.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection