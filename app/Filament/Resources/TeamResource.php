<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Team;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TeamResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TeamResource\RelationManagers;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('team_name')
                    ->required()
                    ->maxLength(255),
                    FileUpload::make('team_logo')
                    ->image()->maxSize(200)->preserveFilenames()->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('100')
                    ->imageResizeTargetHeight('100'),
                    Select::make('team_players')
                    ->multiple()
                    ->options([
                        'Ronaldo' => 'Ronaldo',
                        'Messi' => 'Messi',
                        'Ronny' => 'Ronny',
                        'Dibala' => 'Dibala',
                    ])->preload(),
                    Select::make('team_officials')
                    ->multiple()
                    ->options([
                        'Official 1' => 'Official 1',
                        'Official 2' => 'Official 2',
                        'Official 3' => 'Official 3',
                        'Official 4' => 'Official 4',
                    ])->preload(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('team_logo')
                ->defaultImageUrl(url('https://placehold.co/200x200'))->circular(),
                Tables\Columns\TextColumn::make('team_name'),


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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'view' => Pages\ViewTeam::route('/{record}'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
