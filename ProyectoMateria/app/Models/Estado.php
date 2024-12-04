<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'estado';

    // Nombre de la clave primaria
    protected $primaryKey = 'id_estado';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'tipo', // Este es el único campo en la tabla de estado
    ];
}
