@extends('layouts.plantilla2')

@section('contenido')

    <link rel="stylesheet" href="{{ asset('css/CRUDhoteles.css') }}">
    <br>
    <br>
    <br>
    <div class="table-container">
        <h2>Hoteles</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre Hotel</th>
                    <th>No. Habitaciones</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Salida</th>
                    <th>Nombre Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gran hotel</td>
                    <td>2</td>
                    <td>hoy</td>
                    <td>mañana</td>
                    <td>Emiliano</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Cancelar</button>
                    </td>
                </tr>
                <tr>
                <td>Gran hotel</td>
                    <td>2</td>
                    <td>hoy</td>
                    <td>mañana</td>
                    <td>Emiliano</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Cancelar</button>
                    </td>
                </tr>
                <tr>
                    <td>Gran hotel</td>
                    <td>2</td>
                    <td>hoy</td>
                    <td>mañana</td>
                    <td>Emiliano</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Cancelar</button>
                    </td>
                </tr>
                <!-- Agrega más filas según sea necesario -->
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <br>
@endsection

 
