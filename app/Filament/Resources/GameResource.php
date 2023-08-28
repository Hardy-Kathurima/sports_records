<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Game;
use App\Models\Team;
use App\Models\User;
use Filament\Tables;
use App\Models\Tournament;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
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
                ->required()
                ->label('Tournament name')
                ->options($tournaments),
                Select::make('home_team')
                ->required()
                ->label('Home team')
                ->options($teams),
                Select::make('away_team')
                ->required()
                ->label('Away team')
                ->options($teams),
                Forms\Components\TextInput::make('home_score')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('away_score')
                    ->required()
                    ->maxLength(255),
                    Select::make('game_referee')
                ->multiple( function (){
                    if(User::Where('registration_type','Referee')->count() > 1){
                        return true;
                    }
                    return false;
                })
                ->options(User::Where('registration_type','Referee')->pluck('name','name'))->preload(),

                Select::make('game_location')
                ->required()
                ->options([
                    'Nairobi'=>'Nairobi',
                    'Nakuru'=>'Nakuru',
                    'Kisumu'=>'Kisumu',
                    'Mombasa'=>'Mombasa',
                    'Eldoret'=>'Eldoret',
                ])->columnSpan('full'),
                Repeater::make('goal')
            ->schema([
                Select::make('player_name')
                    ->options([
                        'Hardy' => 'Hardy',
                        'Ronaldo' => 'Ronaldo',
                        'Messi' => 'Messi',
                    ])
                    ->required(),
                Select::make('player_team')
                    ->options([
                        'Sofapaka' => 'Sofapaka',
                        'Ulinzi' => 'Ulinzi',
                        'Gormahia' => 'Gormahia',
                    ])
                    ->required(),
                                TimePicker::make('time_scored')
                ])
                ->columnSpan('full'),
                Textarea::make('comment')
                ->required()->columnSpan('full')
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
                Tables\Actions\ViewAction::make(),
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
