<?php

namespace App\Filament\Resources\PlayerResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PasswordChanged;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PlayerResource;

class ListPlayers extends ListRecords
{
    protected static string $resource = PlayerResource::class;

}
