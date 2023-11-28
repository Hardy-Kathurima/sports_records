<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Certificate extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.certificate';

    protected static ?string $navigationGroup = 'Manage my profile';

    public static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->hasRole('Admin')){
            return false;
        }

        return false;
    }
}
