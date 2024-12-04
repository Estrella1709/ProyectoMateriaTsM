<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;


class usuario extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use Notifiable;
    // Especifica el nombre de la tabla si no sigue la convención de pluralización
    protected $table = 'usuarios';

    // Si tu tabla tiene un campo de clave primaria diferente a 'id', puedes especificarlo aquí
    protected $primaryKey = 'id_usuarios';

}
