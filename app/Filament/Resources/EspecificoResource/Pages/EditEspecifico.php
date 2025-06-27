<?php

namespace App\Filament\Resources\EspecificoResource\Pages;

use App\Filament\Resources\EspecificoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEspecifico extends EditRecord
{
    protected static string $resource = EspecificoResource::class;

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
