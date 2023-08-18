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

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->user()->id;

        return $data;
    }
}
