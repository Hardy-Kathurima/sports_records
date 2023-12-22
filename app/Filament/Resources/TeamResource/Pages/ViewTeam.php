<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Models\User;
use App\Models\Player;
use App\Models\TeamAdmin;
use App\Models\Tournament;
use Filament\Pages\Actions;
use App\Models\TeamOfficial;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\TeamResource;
use Filament\Resources\Pages\ViewRecord;

class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;
    protected static string $view = 'filament.pages.team';

    public $teamOfficial;

    public $team = '';
    public $playerIds = [];
    public $teamAdminIds;
    public $teamAdmins;
    public $teamAdminsDetails;
    public $players;
    public $teamOfficialDetails;
    public $playerDetails;
    public $tournaments;

    public $teamOfficialProfile;

    public function mount($record):void {
        parent::mount($record);




        foreach($this->record->team_players as $teamPlayer) {
            $playerIds [] = $teamPlayer;
            // dd($teamPlayer);
        }
        foreach($this->record->team_officials as $teamAdmin) {
            $teamAdminIds [] = $teamAdmin;
        }


        $this->teamOfficial = TeamOfficial::where('user_id',$this->record->team_official_id)->first();
        $this->teamOfficialDetails = User::where('id',$this->record->team_official_id)->first();
        $this->players = User::whereIn('id', $playerIds)->get();
        $this->teamAdmins = User::whereIn('id', $teamAdminIds)->get();
        $this->playerDetails = Player::whereIn('user_id', $playerIds)->get();
        $this->teamAdminsDetails = TeamAdmin::whereIn('user_id', $teamAdminIds)->get();
        $this->tournaments = Tournament::all();
    }

}
