<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usuario extends Authenticatable
{
    // Especifica el nombre de la tabla si no sigue la convención de pluralización
    protected $table = 'usuarios';

    // Si tu tabla tiene un campo de clave primaria diferente a 'id', puedes especificarlo aquí
    protected $primaryKey = 'id_usuarios';

}
