<?php

namespace App\Filament\Resources\InstitucionResource\Pages;

use App\Filament\Resources\InstitucionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstitucion extends EditRecord
{
    protected static string $resource = InstitucionResource::class;

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
