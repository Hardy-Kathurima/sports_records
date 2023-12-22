<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PoolResource\Pages;
use App\Filament\Resources\PoolResource\RelationManagers;
use App\Models\Pool;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PoolResource extends Resource
{
    protected static ?string $model = Pool::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function shouldRegisterNavigation(): bool
    {

        if(auth()->user()->hasRole('Tournament official')){
            return true;
        }


        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tournament_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('confirmed_teams')
                    ->required(),
                Forms\Components\TextInput::make('pool_status')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tournament_name'),
                Tables\Columns\TextColumn::make('confirmed_teams'),
                Tables\Columns\TextColumn::make('pool_status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPools::route('/'),
            'create' => Pages\CreatePool::route('/create'),
            'view' => Pages\ViewPool::route('/{record}'),
            'edit' => Pages\EditPool::route('/{record}/edit'),
        ];
    }
}
