<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $table = 'bie_instituciones';

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'modificado_en';

    protected $fillable = [
        'nombre_institucion',
        'codigo',
        'siglas',
        'telefono1',
        'telefono2',
        'email',
        'activo',
    ];
}
