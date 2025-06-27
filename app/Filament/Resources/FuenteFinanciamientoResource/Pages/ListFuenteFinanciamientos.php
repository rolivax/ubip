<?php

namespace App\Filament\Resources\FuenteFinanciamientoResource\Pages;

use App\Filament\Resources\FuenteFinanciamientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFuenteFinanciamientos extends ListRecords
{
    protected static string $resource = FuenteFinanciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
