<?php

namespace App\Filament\Resources\FuenteFinanciamientoResource\Pages;

use App\Filament\Resources\FuenteFinanciamientoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFuenteFinanciamiento extends CreateRecord
{
    protected static string $resource = FuenteFinanciamientoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
