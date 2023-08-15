<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Role;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                Forms\Components\TextInput::make('profile_picture')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                    Select::make('userType')
                    ->label('User type')
                    ->options(Role::all()->pluck('name', 'id'))
                    ->searchable(),
                    Select::make('type_of_sport')
                    ->options([
                        'football' => 'Football',
                        'handball' => 'Handball',
                        'basketball' => 'Basketball',
                        'volleyball' => 'Volleyball',
                        'rugby' => 'Rugby',
                    ]),
                // Forms\Components\TextInput::make('player_position')
                //     ->maxLength(255),
                Select::make('player_position')
                ->options([
                    'goalkeeper' => 'goalkeeper',
                    'defender' => 'defender',
                    'forward' => 'forward',
                    'midfielder' => 'midfielder',
                ])->when('userType','Player'),
                Forms\Components\TextInput::make('member')
                    ->maxLength(255),
                Forms\Components\TextInput::make('member_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('age')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('height')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('weight')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('profile_picture'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('userType'),
                Tables\Columns\TextColumn::make('type_of_sport'),
                Tables\Columns\TextColumn::make('player_position'),
                Tables\Columns\TextColumn::make('member'),
                Tables\Columns\TextColumn::make('member_id'),
                Tables\Columns\TextColumn::make('age'),
                Tables\Columns\TextColumn::make('height'),
                Tables\Columns\TextColumn::make('weight'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
