<?php

namespace App\Filament\Resources\ClaseResource\Pages;

use App\Filament\Resources\ClaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClase extends ViewRecord
{
    protected static string $resource = ClaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
