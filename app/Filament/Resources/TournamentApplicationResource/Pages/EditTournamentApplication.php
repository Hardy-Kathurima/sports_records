<?php

namespace App\Filament\Resources\TournamentApplicationResource\Pages;

use App\Filament\Resources\TournamentApplicationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTournamentApplication extends EditRecord
{
    protected static string $resource = TournamentApplicationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
