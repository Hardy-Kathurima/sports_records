<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Models\User;
use Filament\Pages\Actions;
use App\Models\TeamOfficial;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\TeamResource;
use Filament\Resources\Pages\ViewRecord;

class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;
    protected static string $view = 'filament.pages.team';
    public $myName ="";
    public $teamOfficial;

    public $team = '';
    public $teamIds = [];
    public $users;

    public function mount($record):void {
        parent::mount($record);

        $this->myName = 'fabian';

        foreach($this->record->team_players as $teamPlayer) {
            $teamIds [] = $teamPlayer['team_player'];
        }

        $this->teamOfficial = TeamOfficial::where('user_id',$this->record->team_official_id)->first();
        $this->teamOfficial1 = User::where('id',$this->record->team_official_id)->first();

        $this->users = User::whereIn('id', $teamIds)->get();
    }

}
