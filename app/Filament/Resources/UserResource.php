<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Filament\Tables;
use App\Models\TypeOfSport;
use App\Models\TeamOfficial;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\PlayerPosition;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Awcodes\DropInAction\Forms\Components\DropInAction;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                    Select::make('registration_type')
                    ->label('Registration type')
                    ->options(Role::all()->pluck('name', 'name'))
                    ->searchable()->disabled(auth()->user()->hasRole(['Team official']))->default('Team admin')->preload(),
                    Select::make('role')
                    ->label('Role')
                    ->options(Role::all()->pluck('name', 'name'))
                    ->disabled(auth()->user()->hasRole(['Team official']))
                    ->default('Team admin')
                    ->preload(),

                Forms\Components\TextInput::make('password')
                ->password()->dehydrateStateUsing(fn ($state) => Hash::make($state))->dehydrated(fn ($state)=>filled($state))
                ->same('password_confirmation')
                ->required(fn (Page $livewire) =>($livewire instanceof CreateUser))
                ->maxLength(255),

                TextInput::make('password_confirmation')
                ->password()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('registration_type'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
