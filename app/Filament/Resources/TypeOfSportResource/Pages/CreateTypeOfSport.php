<?php

namespace App\Filament\Resources\TypeOfSportResource\Pages;

use App\Filament\Resources\TypeOfSportResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTypeOfSport extends CreateRecord
{
    protected static string $resource = TypeOfSportResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
