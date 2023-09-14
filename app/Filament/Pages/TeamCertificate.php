<?php

namespace App\Filament\Pages;

use App\Models\Team;
use Filament\Pages\Page;

class TeamCertificate extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.team-certificate';


    public $teams;


    public function mount(): void
    {
        $this->teams = Team::where('team_official_id',auth()->user()->id)->get();
    }

    public static function shouldRegisterNavigation(): bool
    {

        if(auth()->user()->hasRole('Team official')){
            return true;
        }


        return false;
    }

}
