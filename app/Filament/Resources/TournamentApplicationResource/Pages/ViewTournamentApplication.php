<?php

namespace App\Filament\Resources\TournamentApplicationResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\TournamentApplicationResource;

class ViewTournamentApplication extends ViewRecord
{
    protected static string $resource = TournamentApplicationResource::class;

    protected function getActions(): array
    {

      return [

        Action::make('Verify application')
        ->label('Verify applications')
        ->color('success')
        ->icon('heroicon-o-book-open') ->action(function (array $data) {

            // dd($data);


            if(in_array(auth()->user()->registration_type, ["Team official","Referee"])){
                $application = new TournamentApplication();
                $application->user_id = auth()->user()->id;
                $application->comment = $data['comment'];
                $application->save();
            }

            Notification::make('Modify application')
            ->body('You have successfully updated application')
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
