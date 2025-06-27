<?php

namespace App\Filament\Resources\EspecificoResource\Pages;

use App\Filament\Resources\EspecificoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEspecifico extends CreateRecord
{
    protected static string $resource = EspecificoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
