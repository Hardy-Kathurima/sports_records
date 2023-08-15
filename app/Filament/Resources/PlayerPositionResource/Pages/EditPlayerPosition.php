<?php

namespace App\Filament\Resources\PlayerPositionResource\Pages;

use App\Filament\Resources\PlayerPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerPosition extends EditRecord
{
    protected static string $resource = PlayerPositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
