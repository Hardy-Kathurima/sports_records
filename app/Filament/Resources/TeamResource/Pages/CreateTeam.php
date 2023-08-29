<?php

namespace App\Filament\Resources\TeamResource\Pages;

// use Filament\Pages\Actions;
use App\Models\Team;
use Filament\Pages\Actions\Action;
use App\Filament\Resources\TeamResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Actions\Action as FilamentAction;
// use Filament\Forms\Components\Actions\Action;

class CreateTeam extends CreateRecord
{
    protected static string $resource = TeamResource::class;

    public $Formdata;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['team_official_id'] = auth()->user()->id;

        $this->FormData = $data;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }



    // protected function afterCreate(): void
    // {
    //     $team = Team::where('team_name',$this->FormData['team_name'])->pluck('id');
    //     dd($team);
    // }




}
