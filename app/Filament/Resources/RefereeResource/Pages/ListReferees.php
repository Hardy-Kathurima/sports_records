<?php

namespace App\Filament\Resources\RefereeResource\Pages;

use App\Filament\Resources\RefereeResource;
use Filament\Pages\Actions;


use App\Models\Position;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use App\Notifications\PasswordChanged;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ProfileResource;

class ListReferees extends ListRecords
{
    protected static string $resource = RefereeResource::class;

}
