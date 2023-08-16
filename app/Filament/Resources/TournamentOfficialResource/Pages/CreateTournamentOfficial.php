<?php

namespace App\Filament\Resources\TournamentOfficialResource\Pages;

use App\Filament\Resources\TournamentOfficialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTournamentOfficial extends CreateRecord
{
    protected static string $resource = TournamentOfficialResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
