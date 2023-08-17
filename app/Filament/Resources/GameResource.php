<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Game;
use App\Models\Team;
use Filament\Tables;
use App\Models\Tournament;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\KeyValue;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GameResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GameResource\RelationManagers;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';



    public static function form(Form $form): Form
    {
        $teams = Team::all()->pluck('team_name', 'id')->toArray();
        $tournaments = Tournament::all()->pluck('tournament_name', 'id')->toArray();

        if (empty($teams)) {
            $teams = ['' => 'No teams available'];
        }
        if (empty($tournaments)) {
            $tournaments = ['' => 'No tournaments available'];
        }

        return $form
            ->schema([
                Select::make('tournament_name')
                ->label('Tournament name')
                ->options($tournaments),
                Select::make('home_team')
                ->label('Home team')
                ->options($teams),
                Select::make('away_team')
                ->label('Away team')
                ->options($teams),
                Forms\Components\TextInput::make('home_score')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('away_score')
                    ->required()
                    ->maxLength(255),
                    KeyValue::make('player_scored')
                    ->keyLabel('Player name')
                    ->valueLabel('Goal(s) scored')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tournament_name'),
                Tables\Columns\TextColumn::make('home_team'),
                Tables\Columns\TextColumn::make('away_team'),
                Tables\Columns\TextColumn::make('home_score'),
                Tables\Columns\TextColumn::make('away_score'),
                Tables\Columns\TextColumn::make('player_scored'),
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
