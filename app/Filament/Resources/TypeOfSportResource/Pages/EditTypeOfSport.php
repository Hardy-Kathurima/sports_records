<?php

namespace App\Filament\Resources\TypeOfSportResource\Pages;

use App\Filament\Resources\TypeOfSportResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeOfSport extends EditRecord
{
    protected static string $resource = TypeOfSportResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
