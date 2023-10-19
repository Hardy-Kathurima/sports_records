<?php

namespace App\Filament\Resources\TournamentResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Http\Request;
use Filament\Pages\Actions\Action;
use App\Models\TournamentApplication;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\TournamentResource;

class ViewTournament extends ViewRecord
{
    protected static string $resource = TournamentResource::class;

    public $client;

    public $tournament_id;





    protected function getActions(): array
    {

      return [

        Action::make('Accept')
        ->label('Accept invitation')
        ->color('success')
        ->icon('heroicon-o-shield-check') ->action(function (array $data) {


            if(in_array(auth()->user()->registration_type, ["Team official","Referee"])){

                $application = new TournamentApplication();
                $application->user_id = auth()->user()->id;
                $application->tournament_name = $this->record->tournament_name;
                $application->tournament_creator = $this->record->tournament_creator;
                $application->comment = $data['comment'];
                $application->status = "Accepted";
                $application->save();
            }

            Notification::make('Accept invitation')
            ->body('You have successfully accepted the invitation')
            ->success()
            ->icon('heroicon-o-phone')
            ->title('Application successfull')
            ->send();



        })
        ->hidden(function(){

            $tournament_status = TournamentApplication::where('tournament_name', $this->record->tournament_name)->pluck('status')->first();

            if($tournament_status === "Declined" || $tournament_status === "Accepted" ){
                return true;
            }

            else{
                return false;
            }

        })

        ->form([
            Textarea::make('comment')->label('Comment about the tournament')->required()
        ]),

        Action::make('Decline invite')
        ->label('Decline invite')
        ->color('danger')
        ->icon('heroicon-o-x-circle') ->action(function (array $data) {


            if(in_array(auth()->user()->registration_type, ["Team official","Referee"])){
                $application = new TournamentApplication();
                $application->user_id = auth()->user()->id;
                $application->tournament_name = $this->record->tournament_name;
                $application->tournament_creator = $this->record->tournament_creator;
                $application->comment = $data['comment'];
                $application->status = "Declined";
                $application->save();
            }

            Notification::make('Tournament application')
            ->body('You have successfully declined  tournament invitation')
            ->danger()
            ->icon('heroicon-o-x-circle')
            ->title('Decline successfull')
            ->send();



        })
        ->hidden(function(){

            $tournament_status = TournamentApplication::where('tournament_name', $this->record->tournament_name)->pluck('status')->first();

            if($tournament_status === "Declined" || $tournament_status === "Accepted" ){
                return true;
            }

            else{
                return false;
            }

        })

        ->form([
            Textarea::make('comment')->label('Reason for declining the invitation')->required()
        ])



      ];

    }
}



