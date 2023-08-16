<?php

namespace App\Filament\Resources\TournamentOfficialResource\Pages;

use App\Filament\Resources\TournamentOfficialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTournamentOfficials extends ListRecords
{
    protected static string $resource = TournamentOfficialResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
