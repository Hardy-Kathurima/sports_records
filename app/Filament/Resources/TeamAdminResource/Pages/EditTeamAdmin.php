<?php

namespace App\Filament\Resources\TeamAdminResource\Pages;

use App\Filament\Resources\TeamAdminResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeamAdmin extends EditRecord
{
    protected static string $resource = TeamAdminResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
