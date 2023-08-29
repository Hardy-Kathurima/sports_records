<?php

namespace App\Filament\Resources\TournamentResource\Pages;

use Filament\Pages\Actions;
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



    protected function getActions(): array
    {

      return [

        Action::make('Accept')
        ->label('Apply for the tournament')
        ->color('success')
        ->icon('heroicon-o-book-open') ->action(function (array $data) {


            if(in_array(auth()->user()->registration_type, ["Team official","Referee"])){
                $application = new TournamentApplication();
                $application->user_id = auth()->user()->id;
                $application->comment = $data['comment'];
                $application->save();
            }

            Notification::make('Tournament application')
            ->body('You have successfully applied for the tournament')
            ->success()
            ->icon('heroicon-o-phone')
            ->title('Application successfull')
            ->send();



        })->form([
            Textarea::make('comment')->required()
        ])

      ];

    }
}



