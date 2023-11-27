<?php

namespace App\Filament\Resources\PoolResource\Pages;

use App\Filament\Resources\PoolResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPool extends EditRecord
{
    protected static string $resource = PoolResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
