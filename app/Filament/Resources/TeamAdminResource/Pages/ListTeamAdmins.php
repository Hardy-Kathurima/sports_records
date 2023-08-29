<?php

namespace App\Filament\Resources\TeamAdminResource\Pages;

use App\Filament\Resources\TeamAdminResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeamAdmins extends ListRecords
{
    protected static string $resource = TeamAdminResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
