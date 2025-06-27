<?php

namespace App\Filament\Resources\FuenteFinanciamientoResource\Pages;

use App\Filament\Resources\FuenteFinanciamientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFuenteFinanciamiento extends ViewRecord
{
    protected static string $resource = FuenteFinanciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
