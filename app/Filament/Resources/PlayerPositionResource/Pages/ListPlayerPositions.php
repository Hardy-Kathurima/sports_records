<?php

namespace App\Filament\Resources\PlayerPositionResource\Pages;

use App\Filament\Resources\PlayerPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayerPositions extends ListRecords
{
    protected static string $resource = PlayerPositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
