<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamAdminResource\Pages;
use App\Filament\Resources\TeamAdminResource\RelationManagers;
use App\Models\TeamAdmin;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamAdminResource extends Resource
{
    protected static ?string $model = TeamAdmin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTeamAdmins::route('/'),
            'create' => Pages\CreateTeamAdmin::route('/create'),
            'edit' => Pages\EditTeamAdmin::route('/{record}/edit'),
        ];
    }
}
