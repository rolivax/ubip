<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rubro extends Model
{
    protected $table = 'act_rubros';

    protected $fillable = [
        'especifico_id',
        'nombre_rubro',
        'codigo',
        'activo',
    ];

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'modificado_en';

    public function especifico(): BelongsTo
    {
        return $this->belongsTo(Especifico::class, 'especifico_id');
    }

    public function divisiones(): HasMany
    {
        return $this->hasMany(Division::class, 'division_id');
    }
}
