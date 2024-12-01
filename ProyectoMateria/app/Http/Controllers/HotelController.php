<?php
// app/Http/Controllers/HotelController.php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
