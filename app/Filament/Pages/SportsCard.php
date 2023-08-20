<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SportsCard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-identification';

    // public static ?string $label = 'Complete my profile';
    // protected static ?string $pluralLabel = 'Complete my profile';

    protected static string $view = 'filament.pages.sports-card';


    protected static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->registration_type != "Admin"){
            return true;
        }
        return false;
    }
}
