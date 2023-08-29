<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Team;
use App\Models\User;
use Filament\Tables;
use App\Models\Tournament;
use App\Models\TeamOfficial;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TournamentResource\Pages;
use App\Filament\Resources\TournamentResource\RelationManagers;

class TournamentResource extends Resource
{
    protected static ?string $model = Tournament::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([


                Forms\Components\TextInput::make('tournament_name')
                    ->required()
                    ->maxLength(255),
                    Select::make('status')
                ->options([
                    'active' => 'active',
                    'suspended' => 'suspended',
                    'completed' => 'completed',
                ]),
                // Select::make('tournament_teams')
                // ->multiple(function (){
                //     if(Team::all()->count() > 1){
                //         return true;
                //     }
                //     return false;
                // })
                // ->required()
                // ->options(Team::all()->pluck('team_name','team_name'))->preload(),
                // Select::make('tournament_officials')
                // ->multiple( function (){
                //     if(User::Where('registration_type','Team official')->count() > 1){
                //         return true;
                //     }
                //     return false;
                // })
                // ->options(User::Where('registration_type','Team official')->pluck('name','name'))->preload(),
                // Select::make('tournament_referees')
                // ->multiple( function (){
                //     if(User::Where('registration_type','Referee')->count() > 1){
                //         return true;
                //     }
                //     return false;
                // })
                // ->options(User::Where('registration_type','Referee')->pluck('name','name'))->preload(),
                Forms\Components\DatePicker::make('start_application_date')
                    ->required(),
                Forms\Components\DatePicker::make('application_deadline_date')
                    ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tournament_name'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('start_date')
                    ->date(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date(),

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
            'index' => Pages\ListTournaments::route('/'),
            'create' => Pages\CreateTournament::route('/create'),
            'edit' => Pages\EditTournament::route('/{record}/edit'),
            'view' => Pages\ViewTournament::route('/{record}'),

        ];
    }
}
