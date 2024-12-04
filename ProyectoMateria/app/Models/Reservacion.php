<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';

    protected $primaryKey = 'id_reservacion';

    protected $fillable = [
        'id_usuario',
        'id_vuelo',
        'id_hotel',
        'id_estado',
        'fecha_reservacion',
        'total_a_pagar',
    ];

    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class, 'id_vuelo');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    // En el modelo Reservacion
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel'); // Asegúrate que el nombre de la columna sea 'id_hotel'
    }


}
