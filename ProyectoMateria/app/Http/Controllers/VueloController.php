<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;
use App\Models\Aerolinea;
use App\Models\Ubicacion;
use App\Http\Requests\VueloRequest;

class VueloController extends Controller
{
    public function adminIndex()
    {
        $vuelos = Vuelo::with(['aerolinea', 'origen', 'destino'])->get();
        return view('CRUDvuelos', compact('vuelos'));
    }

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
        
        if ($request->filled('hora_salida')) {
            $query->where('horario_salida', $request->salida);
        }

        if ($request->filled('hora_llegada')) {
            $query->where('horario_llegada', $request->llegada);
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
        $aerolineas = Aerolinea::all();
        $ubicaciones = Ubicacion::all();
        return view('vuelos.create', compact('aerolineas', 'ubicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_origen' => 'required',
            'id_destino' => 'required',
            'id_aerolinea' => 'required',
            'fecha_salida' => 'required|date',
            'fecha_regreso' => 'nullable|date',
            'horario_salida' => 'required',
            'horario_llegada' => 'required',
            'capacidad' => 'required|integer',
            'pasajeros' => 'required|integer',
            'precio' => 'required|numeric',
            'escalas' => 'nullable|string',
            'disponibilidad_asientos' => 'required|integer',
        ]);

        Vuelo::create($request->validated());

        return redirect()->route('vuelos.index')->with('success', 'Vuelo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $vuelos = Vuelo::with(['aerolinea', 'origen', 'destino'])->get();
    return view('CRUDvuelos', compact('vuelos'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vuelo $vuelo)
    {
        $aerolineas = Aerolinea::all();
        $ubicaciones = Ubicacion::all();
        return view('vuelos.edit', compact('vuelo', 'aerolineas', 'ubicaciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VueloRequest $request, Vuelo $vuelo)
    {
        $request->validate([
            'id_origen' => 'required',
            'id_destino' => 'required',
            'id_aerolinea' => 'required',
            'fecha_salida' => 'required|date',
            'fecha_regreso' => 'nullable|date',
            'horario_salida' => 'required',
            'horario_llegada' => 'required',
            'capacidad' => 'required|integer',
            'pasajeros' => 'required|integer',
            'precio' => 'required|numeric',
            'escalas' => 'nullable|string',
            'disponibilidad_asientos' => 'required|integer',
        ]);

        $vuelo->update($request->validated());

        return redirect()->route('vuelos.index')->with('success', 'Vuelo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vuelo $vuelo)
    {
        $vuelo->delete();

        return redirect()->route('vuelos.index')->with('success', 'Vuelo eliminado exitosamente.');
    }
}
