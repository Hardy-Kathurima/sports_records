<?php

namespace App\Filament\Resources\TeamResource\Pages;

// use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use App\Filament\Resources\TeamResource;
use Filament\Resources\Pages\CreateRecord;
// use Filament\Forms\Components\Actions\Action;

class CreateTeam extends CreateRecord
{
    protected static string $resource = TeamResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['team_official_id'] = auth()->user()->id;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    


}
