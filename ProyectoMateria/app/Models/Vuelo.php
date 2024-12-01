<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Vuelo extends Model
{
    use HasFactory;

    protected $table = 'vuelos';
    protected $primaryKey = 'id_vuelo';

    protected $fillable = [
        'id_origen',
        'id_destino',
        'id_aerolinea',
        'fecha_salida',
        'fecha_regreso',
        'horario_salida',
        'horario_llegada',
        'capacidad',
        'pasajeros',
        'precio',
        'escalas',
        'disponibilidad_asientos',
    ];

    // Relación con Aerolínea
    public function aerolinea()
    {
        return $this->belongsTo(Aerolinea::class, 'id_aerolinea');
    }

    // Relación con Ubicaciones (Origen y Destino)
    public function origen()
    {
        return $this->belongsTo(Ubicacion::class, 'id_origen', 'id_ubicacion');
    }

    public function destino()
    {
        return $this->belongsTo(Ubicacion::class, 'id_destino', 'id_ubicacion');
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

        // Datos necesarios para los filtros
        $vuelos = $query->with(['aerolinea', 'origen', 'destino'])->get();
        $destinos = Ubicacion::all();
        $aerolineas = Aerolinea::all();

        return view('vuelos', compact('vuelos', 'destinos', 'aerolineas'));
    }
}
