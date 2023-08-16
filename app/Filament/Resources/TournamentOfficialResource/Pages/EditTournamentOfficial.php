<?php

namespace App\Filament\Resources\TournamentOfficialResource\Pages;

use App\Filament\Resources\TournamentOfficialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTournamentOfficial extends EditRecord
{
    protected static string $resource = TournamentOfficialResource::class;

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
