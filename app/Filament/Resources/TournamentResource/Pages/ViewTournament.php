<?php

namespace App\Filament\Resources\TournamentResource\Pages;

use App\Filament\Resources\TournamentResource;
use App\Models\Group;
use App\Models\Pool;
use App\Models\Team;
use App\Models\TournamentApplication;
use Closure;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewTournament extends ViewRecord
{
    protected static string $resource = TournamentResource::class;
    protected static string $view = 'filament.pages.tournament';

    public $client;

    public $tournament_id;
    public $totalTeams;
    public $acceptedTeams;
    public $teamCount;
    public $teams;
    public $numbers;
    public $divisibleNumbers;


    protected function getActions(): array
    {

      return [

        Action::make('create-pooling')
        ->label('Create pools')
        ->color('warning')
        ->icon('heroicon-o-table')->action(function (array $data){
            $pooling = new Pool;
            $pooling->tournament_name =  $this->record->tournament_name;
            $pooling->confirmed_teams = $data['confirmed_teams'];
            $pooling->number_of_groups = $data['number_of_groups'];
                $pooling->groups = '';
                $pooling->save();

            $teams =TournamentApplication::where('tournament_name',$this->record->tournament_name)->where('status','Accepted')->pluck('team_id')->toArray();

            shuffle($teams);

            $alphabet = range('A', 'Z');

            for ($i = 0; $i < $data['number_of_groups']; $i++) {
                $teamIds = array_slice($teams, $i * $data['number_of_groups'], $data['number_of_groups']);

                foreach ($teamIds as $teamId) {
                    $group = new Group();
                    $group->group_name = $alphabet[$i];
                    $group->team_id = $teamId;
                    $group->pool_id = $pooling->id;
                    $group->save();
                }
            }
        }) ->form([
            TextInput::make('confirmed_teams')
            ->label('Available Teams')
            ->numeric()
            ->default(TournamentApplication::where('status','Accepted')->get()->count())
            ->reactive()
            ->disabled(),
            TextInput::make('number_of_groups')
            ->label('Number of groups')
            ->numeric()
            ->required()
            ->rules([
                function (callable $get) {
                    return function (string $attribute, $value, Closure $fail) use ($get) {
                        if ($get('confirmed_teams') % $value !== 0) {
                            $fail('The number of groups must be divisible by available teams.');
                        }
                    };
                },
            ]),
        ])->hidden(function(){
            if(auth()->user()->hasRole('Tournament official')){
                return false;

            }
            else{
                return true;

            }
        }),

        Action::make('Accept')
        ->label('Accept invitation')
        ->color('success')
        ->icon('heroicon-o-shield-check') ->action(function (array $data) {




            if(in_array(auth()->user()->registration_type, ["Team official","Referee"])){


                $application = new TournamentApplication();
                $application->user_id = auth()->user()->id;
                $application->team_id = auth()->user()->id;
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
            return false;

            // $tournament_status = TournamentApplication::where('tournament_creator', $this->record->tournament_creator)->pluck('status')->first();

            // if($tournament_status === "Declined" || $tournament_status === "Accepted" || auth()->user()->hasRole(['Tournament official','Admin','Player','Referee'])){
            //     return true;
            // }

            // else{
            //     return false;
            // }

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

            if($tournament_status === "Declined" || $tournament_status === "Accepted" || auth()->user()->hasRole(['Tournament official','Admin','Player','Referee']) ){
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


    public function mount($record):void {
        parent::mount($record);

        $this->totalTeams = Team::all()->count();
        $this->acceptedTeams = TournamentApplication::where('status','accepted')->get()->count();

    }
}



