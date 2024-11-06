@extends('layouts.plantilla2')

@section('contenido')

<link rel="stylesheet" href="{{ asset('css/CRUDreportes.css') }}">
    
    <br>
    <br>
    <br>
    <div class="container">
        <!-- Contenedor de la tabla -->
        <div class="table-container">
            <h2>Hoteles</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Detalles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>hoy</td>
                        <td><button class="edit-btn">Detalles</button></td>
                        <td>
                            <button class="edit-btn">Editar</button>
                            <button class="delete-btn">Cancelar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>hoy</td>
                        <td><button class="edit-btn">Detalles</button></td>
                        <td>
                            <button class="edit-btn">Editar</button>
                            <button class="delete-btn">Cancelar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>hoy</td>
                        <td><button class="edit-btn">Detalles</button></td>
                        <td>
                            <button class="edit-btn">Editar</button>
                            <button class="delete-btn">Cancelar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>hoy</td>
                        <td><button class="edit-btn">Detalles</button></td>
                        <td>
                            <button class="edit-btn">Editar</button>
                            <button class="delete-btn">Cancelar</button>
                        </td>
                    </tr>
                    <!-- Agrega más filas según sea necesario -->
                </tbody>
            </table>
        </div>

        <!-- Contenedor de botones y opciones -->
        <div class="options-container payment-form">
            <button type="submit" class="pay-button">Agregar Reporte</button>
            <select>
                <option>Reporte por...</option>
                <option>Mes</option>
                <option>Semana</option>
            </select>
        </div>
    </div>
    <br>
    <br>
    <br>

@endsection