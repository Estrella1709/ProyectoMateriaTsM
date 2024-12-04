<?php
// app/Http/Controllers/HotelController.php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Ubicacion;
uSE App\Http\Requests\validarAgregarHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $hoteles = Hotel::with('ubicacion')
            ->when($request->input('ubicacion'), function ($query, $ubicacion) {
                return $query->whereHas('ubicacion', function ($q) use ($ubicacion) {
                    $q->where('nombre', 'like', "%$ubicacion%");
                });
            })
            ->when($request->input('fecha_desde'), function ($query, $fecha_desde) {
                return $query->where('fecha_desde', '>=', $fecha_desde);
            })
            ->when($request->input('fecha_hasta'), function ($query, $fecha_hasta) {
                return $query->where('fecha_hasta', '<=', $fecha_hasta);
            })
            ->when($request->input('numero_habitaciones'), function ($query, $numero_habitaciones) {
                return $query->where('numero_habitaciones', '>=', $numero_habitaciones);
            })
            ->when($request->input('numero_huespedes'), function ($query, $numero_huespedes) {
                return $query->where('numero_huespedes', '>=', $numero_huespedes);
            })
            ->when($request->input('estrellas'), function ($query, $estrellas) {
                return $query->where('estrellas', $estrellas);
            })
            ->when($request->input('wifi'), function ($query) {
                return $query->where('wifi', true);
            })
            ->when($request->input('piscina'), function ($query) {
                return $query->where('piscina', true);
            })
            ->when($request->input('desayuno'), function ($query) {
                return $query->where('desayuno', true);
            })
            ->when($request->input('precio_maximo'), function ($query, $precio) {
                return $query->where('precio_noche', '<=', $precio);
            })
            ->when($request->input('distancia_al_centro'), function ($query, $distancia) {
                return $query->where('distancia_al_centro', '<=', $distancia);
            })
            ->get();

        return view('hoteles', compact('hoteles'));
    }

    public function CRUDhoteles(){
        $hoteles = DB::table('hoteles')
        ->join('ubicaciones', 'hoteles.ubicacion', '=', 'ubicaciones.id_ubicacion')
        ->select('hoteles.*', 'ubicaciones.nombre as nombre_ubicacion')
        ->get();
        return view('CRUDhoteles', compact('hoteles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ciudades=Ubicacion::all();
        return view('agregarHotel', compact('ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validarAgregarHotel $request)
    {
        $addHotel=new Hotel();

        $addHotel->nombre_hotel=$request->input('nombre_h');
        $addHotel->estrellas=intval($request->input('estrellas'));
        $addHotel->descripcion=$request->input('txtDesc_h');
        $addHotel->capacidad=intval($request->input('capacidad'));
        $addHotel->ubicacion=intval($request->input('ubicacion'));
        $addHotel->precio_noche=floatval($request->input('precio_n'));
        $addHotel->disponibilidad_habitaciones=intval($request->input('capacidad'));
        $addHotel->wifi = intval($request->input('wifi'));
        $addHotel->piscina = intval($request->input('piscina'));
        $addHotel->desayuno = intval($request->input('desayuno'));
        $addHotel->distancia_al_centro = floatval($request->input('dist_centro'));

        $addHotel->calificacion_usuarios=0.0; //Por defecto no hay calificaciones de usuarios
        
        $addHotel->save();

        session()->flash('exito', 'Se registro exitosamente el hotel');
        return to_route('rutaCRUDhoteles');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel=DB::table('hoteles')->where('id_hotel', $id)->first();
        $ciudades = DB::table('ubicaciones')->get();
        $ciudadSeleccionada = DB::table('ubicaciones')->where('id_ubicacion', $hotel->ubicacion)->first(); // Ciudad del hotel
        return view('editarHoteles', compact('hotel', 'ciudades', 'ciudadSeleccionada'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validarAgregarHotel $request, $id_hotel)
    {
        $update_hotel=Hotel::find( $id_hotel);

        $update_hotel->nombre_hotel=$request->input('nombre_h');
        $update_hotel->estrellas=intval($request->input('estrellas'));
        $update_hotel->capacidad=intval($request->input('capacidad'));
        $update_hotel->ubicacion=intval($request->input('ubicacion'));
        $update_hotel->precio_noche=floatval($request->input('precio_n'));
        $update_hotel->disponibilidad_habitaciones=intval($request->input('capacidad'));
        $update_hotel->distancia_al_centro = floatval($request->input('dist_centro'));
        $update_hotel->wifi = intval($request->input('wifi'));
        $update_hotel->piscina = intval($request->input('piscina'));
        $update_hotel->desayuno = intval($request->input('desayuno'));
        $update_hotel->descripcion=$request->input('txtDesc_h');
        
        $update_hotel->update();

        session()->flash('editado', 'Se edito exitosamente '. $request->input('nombre_h'));
        return to_route('rutaCRUDhoteles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_hotel)
    {
        
        $delete_hotel=Hotel::find( $id_hotel);
        $nombre=$delete_hotel->nombre_hotel;
        $delete_hotel->delete();

        session()->flash('eliminado', 'Se elimino '.$nombre);
        return redirect()->back();
    }
    
}
