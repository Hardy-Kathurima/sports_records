<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Player;
use App\Models\TypeOfSport;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\PlayerPosition;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PlayerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PlayerResource\RelationManagers;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static ?string $label = 'Player profile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('profile_picture')
                ->image(),
                Select::make('type_of_sport')
                ->options(TypeOfSport::all()->pluck('name', 'id')),

                Select::make('player_position')
                ->options(PlayerPosition::all()->pluck('position', 'id')),
                Forms\Components\TextInput::make('age')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('height')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('weight')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_picture')
                ->defaultImageUrl(url('https://placehold.co/200x200'))->circular(),
                Tables\Columns\TextColumn::make('type_of_sport'),
                Tables\Columns\TextColumn::make('player_position'),
                Tables\Columns\TextColumn::make('age'),
                Tables\Columns\TextColumn::make('height'),
                Tables\Columns\TextColumn::make('weight'),
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
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
