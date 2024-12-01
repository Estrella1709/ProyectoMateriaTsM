<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones';
    protected $primaryKey = 'id_ubicacion';

    protected $fillable = ['nombre'];

    public function vuelosComoOrigen()
    {
        return $this->hasMany(Vuelo::class, 'id_origen', 'id_ubicacion');
    }
    
    public function vuelosComoDestino()
    {
        return $this->hasMany(Vuelo::class, 'id_destino', 'id_ubicacion');
    }
    }
