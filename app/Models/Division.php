<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Division extends Model
{
    protected $table = 'act_divisiones';

    protected $fillable = [
        'nombre_division',
        'codigo',
        'activo',
    ];

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'modificado_en';

    public function rubro(): BelongsTo
    {
        return $this->belongsTo(Rubro::class, 'rubro_id');
    }
}
