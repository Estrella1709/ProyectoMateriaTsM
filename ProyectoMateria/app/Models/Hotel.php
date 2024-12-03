<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_hotel';

    protected $table = 'hoteles';

    protected $fillable = [
        'nombre_hotel',
        'calificacion_usuarios',
        'estrellas',
        'descripcion',
        'capacidad',
        'numero_huespedes',
        'ubicacion',
        'precio_noche',
        'disponibilidad_habitaciones',
        'wifi',
        'piscina',
        'desayuno',
        'distancia_al_centro',
        'fecha_desde',
        'fecha_hasta',
        'numero_habitaciones',
    ];

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'ubicacion', 'id_ubicacion');
    }
}
