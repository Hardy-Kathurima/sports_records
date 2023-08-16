<?php

namespace App\Filament\Resources\TeamOfficialResource\Pages;

use App\Filament\Resources\TeamOfficialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeamOfficial extends EditRecord
{
    protected static string $resource = TeamOfficialResource::class;

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
