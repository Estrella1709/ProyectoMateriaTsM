<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Reservacion;
use App\Models\Estado;
use App\Models\Hotel;
use App\Models\Vuelo;
use Illuminate\Http\Request;
use App\Http\Requests\validadorDH;
use App\Http\Requests\validarResVyH;

class ReservasController extends Controller
{

    public function mostrarDetalles(string $id){

        $politicas = DB::table('politicas')->get();

        $hotel = Hotel::findOrFail($id);

        // Retornar la vista con los detalles del hotel
        return view('detalleshotel', ['politicas' => $politicas], compact('hotel'));
    }

    public function detalles($id)
    {

        $politicas = DB::table('politicas')->get();
        // Buscar el vuelo por su ID
        $vuelo = Vuelo::findOrFail($id);

        // Pasar el vuelo a la vista detalles
        return view('detallesvuelo',['politicas' => $politicas], compact('vuelo'));
    }

    public function crearReservacion(validadorDH $request, $id_hotel)
    {
        
        $request->input('fechaR');

        // Obtener el hotel correspondiente
        $hotel = Hotel::findOrFail($id_hotel);

        // Obtener el estado "prereservado"
        $estado = Estado::where('tipo', 'prereservado')->first();

        // Calcular el total a pagar
        $totalAPagar = $hotel->precio_noche;

        // Crear una nueva reservación
        Reservacion::create([
            'id_hotel' => $hotel->id_hotel,
            'id_estado' => $estado->id_estado,
            'fecha_reservacion' => $request->fechaR,
            'total_a_pagar' => $totalAPagar,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('hoteles.index', $id_hotel)
            ->with('success', '¡Tu pre reservación ha sido realizada exitosamente!, consulta tus pre reservas');
    }

    public function crearReservacionVuelo(Request $request, $id_vuelo)
    {
        
 
        // Obtener el vuelo correspondiente
        $vuelo = Vuelo::findOrFail($id_vuelo);

        // Obtener el estado "prereservado"
        $estado = Estado::where('tipo', 'prereservado')->first();

        // Calcular el total a pagar (precio del vuelo)
        $totalAPagar = $vuelo->precio;

        // Crear una nueva reservación de vuelo
        Reservacion::create([
            'id_vuelo' => $vuelo->id_vuelo,       // ID del vuelo
            'id_estado' => $estado->id_estado,     // ID del estado (prereservado)
            'fecha_reservacion' => $vuelo->fecha_salida, // Fecha de la reservación será la de salida del vuelo
            'total_a_pagar' => $totalAPagar,       // Precio del vuelo
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('vuelos.index', $id_vuelo)
            ->with('success', '¡Tu pre reservación de vuelo ha sido realizada exitosamente!, consulta tus pre reservas');
    }





    public function mostrarPreReservas()
{

    $politicas = DB::table('politicas')->get();
    // Obtener el estado 'pre-reserva' (suponiendo que el estado 'pre-reserva' tiene el id 2)
    $estadoPreReserva = Estado::where('tipo', 'prereservado')->first();

    // Obtener las reservaciones de hoteles y vuelos con ese estado, incluyendo las relaciones
    $reservacionesHoteles = Reservacion::where('id_estado', $estadoPreReserva->id_estado)
                                       ->whereNotNull('id_hotel')
                                       ->with('hotel')  // Cargar la relación con el hotel
                                       ->get();

    $reservacionesVuelos = Reservacion::where('id_estado', $estadoPreReserva->id_estado)
                                      ->whereNotNull('id_vuelo')
                                      ->with('vuelo')  // Cargar la relación con el vuelo
                                      ->get();

    // Calcular el total a pagar sumando los precios de los hoteles y vuelos
    $totalPagar = 0;

    // Obtener los servicios reservados
    $serviciosReservados = [];
    
    foreach ($reservacionesHoteles as $reservacion) {
        $hotel = $reservacion->hotel;  // Acceder a la relación hotel
        $serviciosReservados[] = 'Hotel: ' . $hotel->nombre_hotel;
        $totalPagar += $hotel->precio_noche;
    }

    foreach ($reservacionesVuelos as $reservacion) {
        $vuelo = $reservacion->vuelo;  // Acceder a la relación vuelo
        $serviciosReservados[] = 'Vuelo: ' . $vuelo->aerolinea->nombre;
        $totalPagar += $vuelo->precio;
    }

    // Obtener las fechas de reserva
    $fechasReservas = [];
    foreach ($reservacionesHoteles as $reservacion) {
        $fechasReservas[] = 'Hotel: ' . $reservacion->fecha_reservacion;
    }
    
    foreach ($reservacionesVuelos as $reservacion) {
        $fechasReservas[] = 'Vuelo: ' . $reservacion->fecha_reservacion;
    }

    // Pasar los datos a la vista
    return view('prereserva', ['politicas' => $politicas], compact('reservacionesHoteles', 'reservacionesVuelos', 'serviciosReservados', 'fechasReservas', 'totalPagar'));
}


    public function quitarReserva($id_reservacion)
    {
        // Encontrar la reservación
        $reservacion = Reservacion::findOrFail($id_reservacion);

        // Verificar si la reserva es de hotel o vuelo
        if ($reservacion->id_hotel) {
            // Si es una reserva de hotel, eliminarla
            $reservacion->delete();
        } elseif ($reservacion->id_vuelo) {
            // Si es una reserva de vuelo, eliminarla
            $reservacion->delete();
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('prereserva')->with('success', '¡Reserva eliminada con éxito!');
    }

    public function actualizarEstadoReservas(validarResVyH $request)
    {
        $request->input('tarjeta');
        $request->input('mes_exp');
        $request->input('year_exp');
        $request->input('cvv');

        // Obtener el estado "reservado"
        $estadoReservado = Estado::where('tipo', 'reservado')->first();

        // Obtener las reservas con el estado "prereservado"
        $reservaciones = Reservacion::where('id_estado', Estado::where('tipo', 'prereservado')->first()->id_estado)
            ->get();

        // Actualizar el estado de todas las reservas a "reservado"
        foreach ($reservaciones as $reservacion) {
            $reservacion->id_estado = $estadoReservado->id_estado;
            $reservacion->save();
        }

        return redirect()->route('prereserva')->with('success', '¡Pago exitoso y reservas actualizadas a "reservado"!');
    }

    public function mostrarReservasR()
    {
        $politicas = DB::table('politicas')->get();
        // Obtener el estado "reservado"
        $estadoReservado = Estado::where('tipo', 'reservado')->first();

        // Obtener las reservaciones con el estado "reservado"
        $reservaciones = Reservacion::where('id_estado', $estadoReservado->id_estado)->get();

        // Pasar las reservaciones a la vista
        return view('reservas',['politicas' => $politicas], compact('reservaciones'));
    }


    public function cancelarReservacion($id)
    {
        // Buscar la reservación por su ID
        $reservacion = Reservacion::findOrFail($id);
        
        // Eliminar la reservación
        $reservacion->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('reservas.mostrar')->with('success', 'Reserva cancelada con éxito.');
    }

}
