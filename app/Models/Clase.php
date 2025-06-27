<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Clase extends Model
{
    protected $table = 'act_clases';

    protected $fillable = [
        'nombre_clase',
        'codigo',
        'division_id',
        'rubro_id',
        'activo',
    ];

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'modificado_en';

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function rubro(): BelongsTo
    {
        return $this->belongsTo(Rubro::class);
    }
}
