<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Certificate extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.certificate';

    protected static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->registration_type != "Admin"){
            return true;
        }
        return false;
    }
}
