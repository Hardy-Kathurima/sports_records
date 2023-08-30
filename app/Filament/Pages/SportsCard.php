<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SportsCard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-identification';

    // public static ?string $label = 'Complete my profile';
    // protected static ?string $pluralLabel = 'Complete my profile';

    protected static string $view = 'filament.pages.sports-card';

    protected static ?string $navigationGroup = 'Manage my profile';
    
    protected static ?int $navigationSort = 1;


    public static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->hasRole('Admin')){
            return false;
        }

        return true;
    }
}
