<?php

namespace App\Filament\Resources\TeamOfficialResource\Pages;

use App\Filament\Resources\TeamOfficialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeamOfficials extends ListRecords
{
    protected static string $resource = TeamOfficialResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
