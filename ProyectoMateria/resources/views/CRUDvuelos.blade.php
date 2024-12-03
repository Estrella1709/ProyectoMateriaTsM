@extends('layouts.plantilla2')

@section('contenido')

    <link rel="stylesheet" href="{{ asset('css/CRUDvuelos.css') }}">
    <br>
    <br>
    <br>
    <div class="table-container">
        <h2>Gestión de Vuelos</h2>
        <a href="{{ route('vuelos.create') }}" class="btn btn-primary">Agregar Vuelo</a>
        <table>
            <thead>
                <tr>
                    <th>Aerolínea</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha Salida</th>
                    <th>Fecha Regreso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vuelos as $vuelo)
                <tr>
                    <td>{{ $vuelo->aerolinea->nombre }}</td>
                    <td>{{ $vuelo->origen->nombre }}</td>
                    <td>{{ $vuelo->destino->nombre }}</td>
                    <td>{{ $vuelo->fecha_salida }}</td>
                    <td>{{ $vuelo->fecha_regreso }}</td>
                    <td>
                        <a href="{{ route('vuelos.edit', $vuelo->id_vuelo) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('vuelos.destroy', $vuelo->id_vuelo) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
@endsection


