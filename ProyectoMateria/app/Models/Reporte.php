<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $primaryKey = 'id_reporte';
    
    protected $fillable = [
        'id_usuario',
        'tipo_reporte',
        'estado_reporte',
        'titulo_reporte',
        'contenido_reporte'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
