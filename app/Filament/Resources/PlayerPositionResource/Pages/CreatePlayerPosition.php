<?php

namespace App\Filament\Resources\PlayerPositionResource\Pages;

use App\Filament\Resources\PlayerPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePlayerPosition extends CreateRecord
{
    protected static string $resource = PlayerPositionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
