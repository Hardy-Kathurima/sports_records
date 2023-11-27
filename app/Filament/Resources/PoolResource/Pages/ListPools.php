<?php

namespace App\Filament\Resources\PoolResource\Pages;

use App\Filament\Resources\PoolResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPools extends ListRecords
{
    protected static string $resource = PoolResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
