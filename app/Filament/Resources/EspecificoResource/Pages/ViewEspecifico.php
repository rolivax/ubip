<?php

namespace App\Filament\Resources\EspecificoResource\Pages;

use App\Filament\Resources\EspecificoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEspecifico extends ViewRecord
{
    protected static string $resource = EspecificoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
