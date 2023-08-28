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

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['tournament_creator'] = auth()->user()->id;


       $tournamentReferees = $data['tournament_referees'];
       $tournament_teams = $data['tournament_teams'];

       $getId = Team::whereIn('team_name',$tournament_teams)->get()->pluck('team_official_id');


       $users = User::whereIn('id',$getId)->get();




       Notification::make()
       ->success()
       ->title('Tournament Invitation')
       ->body('You have been invited for a tournament')
       ->actions([
           Action::make('Accept invitation')

           ->url(TournamentResource::getUrl('view',Tournament::where('tournament_creator',$data['tournament_creator'])->get()->first())),
       ])
       ->sendToDatabase($users);





        return $data;
    }
}
