<?php

namespace App\Filament\Resources\TournamentOfficialResource\Pages;

use App\Filament\Resources\TournamentOfficialResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use App\Notifications\PasswordChanged;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class ListTournamentOfficials extends ListRecords
{
    protected static string $resource = TournamentOfficialResource::class;

}
