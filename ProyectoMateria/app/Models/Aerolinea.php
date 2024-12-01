<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    use HasFactory;

    protected $table = 'aerolineas';
    protected $primaryKey = 'id_aerolinea';

    protected $fillable = ['nombre'];

    public function vuelos()
    {
        return $this->hasMany(Vuelo::class, 'id_aerolinea');
    }
}
