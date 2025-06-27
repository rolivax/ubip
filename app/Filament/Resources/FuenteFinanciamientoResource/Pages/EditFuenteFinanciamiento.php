<?php

namespace App\Filament\Resources\FuenteFinanciamientoResource\Pages;

use App\Filament\Resources\FuenteFinanciamientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFuenteFinanciamiento extends EditRecord
{
    protected static string $resource = FuenteFinanciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
