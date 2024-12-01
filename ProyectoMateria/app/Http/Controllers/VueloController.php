<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;
use App\Models\Aerolinea;
use App\Models\Ubicacion;

class VueloController extends Controller
{
    public function index(Request $request)
    {
        // Filtros
        $query = Vuelo::query();

        if ($request->filled('origen')) {
            $query->where('id_origen', $request->origen);
        }

        if ($request->filled('destino')) {
            $query->where('id_destino', $request->destino);
        }

        if ($request->filled('aerolinea')) {
            $query->where('id_aerolinea', $request->aerolinea);
        }

        if ($request->filled('precio')) {
            $query->where('precio', '<=', $request->precio);
        }

        if ($request->filled('escalas')) {
            $query->where('escalas', $request->escalas);
        }

        // Datos necesarios para los filtros
        $vuelos = $query->with(['aerolinea', 'origen', 'destino'])->get();
        $destinos = Ubicacion::all();
        $aerolineas = Aerolinea::all();

        return view('vuelos', compact('vuelos', 'destinos', 'aerolineas'));
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
    public function show(vuelo $vuelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vuelo $vuelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vuelo $vuelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vuelo $vuelo)
    {
        //
    }
}
