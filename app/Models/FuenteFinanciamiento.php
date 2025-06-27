<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuenteFinanciamiento extends Model
{
    protected $table = 'act_fuentes_financiamiento';

    protected $fillable = [
        'nombre_fuente_financiamiento',
        'codigo',
        'activo',
    ];

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'modificado_en';
}
