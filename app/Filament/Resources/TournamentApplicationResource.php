<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use App\Models\TournamentApplication;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TournamentApplicationResource\Pages;
use App\Filament\Resources\TournamentApplicationResource\RelationManagers;

class TournamentApplicationResource extends Resource
{
    protected static ?string $model = TournamentApplication::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('comment')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Applicant name'),
                TextColumn::make('tournament_name')->label('Tournament name'),
                TextColumn::make('status')->label('Tournament status'),
                TextColumn::make('comment'),

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
            'index' => Pages\ListTournamentApplications::route('/'),
            'create' => Pages\CreateTournamentApplication::route('/create'),
            'edit' => Pages\EditTournamentApplication::route('/{record}/edit'),
        ];
    }


    // public static function getEloquentQuery(): Builder
    // {
    //     $query = parent::getEloquentQuery();

    //     // If the user is logged in and has a normal user role, filter the query to only include records created by that user.
    //     if (Auth::check() && Auth::user()->hasRole(['Tournament official'])) {
    //         $tournament_creator = TournamentApplication::where('user_id', Auth::user()->id)->pluck('user_id')->first();

    //         $query->where('tournament_creator', $tournament_creator);
    //     }

    //     return $query;
    // }
}
