<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'bie_marcas';

    protected $fillable = [
        'nombre_marca',
        'activo',
    ];

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'modificado_en';
}
