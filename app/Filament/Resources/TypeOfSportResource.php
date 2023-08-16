<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\TypeOfSport;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\PlayerPosition;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TypeOfSportResource\Pages;
use App\Filament\Resources\TypeOfSportResource\RelationManagers;

class TypeOfSportResource extends Resource
{
    protected static ?string $model = TypeOfSport::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Select::make('player_positions')
                    ->options(PlayerPosition::all()->pluck('position', 'id'))
                    ->multiple()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
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
            'index' => Pages\ListTypeOfSports::route('/'),
            'create' => Pages\CreateTypeOfSport::route('/create'),
            'edit' => Pages\EditTypeOfSport::route('/{record}/edit'),
        ];
    }
}
