<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especifico extends Model
{
    protected $table = 'bie_especificos';

    protected $fillable = [
        'nombre_especifico',
        'codigo',
        'cuenta_contable',
        'activo',
    ];

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'modificado_en';

    public function rubros(): HasMany
    {
        return $this->hasMany(Rubro::class, 'especifico_id');
    }
}
