<?php

namespace App\Filament\Resources\TeamOfficialResource\Pages;

use App\Filament\Resources\TeamOfficialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTeamOfficial extends CreateRecord
{
    protected static string $resource = TeamOfficialResource::class;

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
