<?php

namespace App\Filament\Resources\TournamentResource\Pages;

use App\Models\Team;
use App\Models\User;
use App\Models\Tournament;
use Filament\Pages\Actions;
use App\Models\TeamOfficial;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\TournamentResource;

class CreateTournament extends CreateRecord
{
    protected static string $resource = TournamentResource::class;

    public $FormData;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['tournament_creator'] = auth()->user()->id;


       $this->FormData = $data;

        return $data;
    }

    protected function afterCreate(): void
    {

        // $tournament_teams = $this->FormData['tournament_teams'];

        // $getId = Team::whereIn('team_name',$tournament_teams)->get()->pluck('team_official_id');


        $tournament_id = Tournament::where('tournament_name', $this->FormData['tournament_name'])->get()->first()->id;

        // $users = User::whereIn('id',$getId)->get();

        $users = User::whereIn('registration_type', ['Team official', 'Referee'])->get();



        Notification::make()
        ->success()
        ->title('Tournament Invitation')
        ->body('You have been invited for a tournament')
        ->actions([
            Action::make('View tournament')

            ->url(TournamentResource::getUrl('view',$tournament_id)),
        ])
        ->sendToDatabase($users);



    }
}
