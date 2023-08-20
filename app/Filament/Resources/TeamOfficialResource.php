<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\TypeOfSport;
use App\Models\TeamOfficial;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TeamOfficialResource\Pages;
use App\Filament\Resources\TeamOfficialResource\RelationManagers;

class TeamOfficialResource extends Resource
{
    protected static ?string $model = TeamOfficial::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static ?string $label = 'Team official';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('profile_picture')
                ->image(),
                Select::make('type_of_sport')
                ->options(TypeOfSport::all()->pluck('name', 'name')),
                Forms\Components\TextInput::make('member')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_picture')
                ->defaultImageUrl(url('https://placehold.co/200x200'))->circular(),
                Tables\Columns\TextColumn::make('type_of_sport'),
                Tables\Columns\TextColumn::make('member'),
                Tables\Columns\TextColumn::make('age'),
                Tables\Columns\TextColumn::make('height'),
                Tables\Columns\TextColumn::make('weight'),
             
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
            'index' => Pages\ListTeamOfficials::route('/'),
            'create' => Pages\CreateTeamOfficial::route('/create'),
            'edit' => Pages\EditTeamOfficial::route('/{record}/edit'),
        ];
    }
}
