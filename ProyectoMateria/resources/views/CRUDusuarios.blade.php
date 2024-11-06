@extends('layouts.plantilla2')

@section('contenido')

    <link rel="stylesheet" href="{{ asset('css/CRUDusuarios.css') }}">
    <br>
    <br>
    <br>
    <div class="table-container">
        <h2>Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan Pérez</td>
                    <td>juan.perez@example.com</td>
                    <td>+1 555 123 456</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Borrar</button>
                    </td>
                </tr>
                <tr>
                    <td>Maria González</td>
                    <td>maria.gonzalez@example.com</td>
                    <td>+1 555 789 012</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Borrar</button>
                    </td>
                </tr>
                <tr>
                    <td>Pedro Martínez</td>
                    <td>pedro.martinez@example.com</td>
                    <td>+1 555 345 678</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Borrar</button>
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