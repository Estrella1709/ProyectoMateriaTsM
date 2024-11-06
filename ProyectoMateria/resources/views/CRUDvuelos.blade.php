@extends('layouts.plantilla2')

@section('contenido')

    <link rel="stylesheet" href="{{ asset('css/CRUDvuelos.css') }}">
    <br>
    <br>
    <br>
    <div class="table-container">
        <h2>Vuelos para llegar a la muerte</h2>
        <table>
            <thead>
                <tr>
                    <th>Aerolínea</th>
                    <th>Contacto Usuario</th>
                    <th>Fecha Salida</th>
                    <th>Fecha Regreso</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Aerolínea star</td>
                    <td>ayudamequieromatar@upq.edu.mx</td>
                    <td>hoy</td>
                    <td>mañana</td>
                    <td>México</td>
                    <td>Venezuela pq no nos queremos</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Cancelar</button>
                    </td>
                </tr>
                <tr>
                <td>Aerolínea star</td>
                    <td>ayudamequieromatar@upq.edu.mx</td>
                    <td>hoy</td>
                    <td>mañana</td>
                    <td>México</td>
                    <td>Venezuela pq no nos queremos</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Cancelar</button>
                    </td>
                </tr>
                <tr>
                <td>Aerolínea star</td>
                    <td>ayudamequieromatar@upq.edu.mx</td>
                    <td>hoy</td>
                    <td>mañana</td>
                    <td>México</td>
                    <td>Venezuela pq no nos queremos</td>
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

 
