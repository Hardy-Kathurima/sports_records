<?php

namespace App\Filament\Resources\TypeOfSportResource\Pages;

use App\Filament\Resources\TypeOfSportResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeOfSports extends ListRecords
{
    protected static string $resource = TypeOfSportResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
