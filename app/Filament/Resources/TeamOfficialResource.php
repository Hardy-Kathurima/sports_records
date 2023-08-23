<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\Team;
use Filament\Tables;
use App\Models\Player;
use App\Models\TypeOfSport;
use App\Models\TeamOfficial;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TeamOfficialResource\Pages;
use Awcodes\DropInAction\Forms\Components\DropInAction;
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
                DropInAction::make('add team')
                    ->execute(function (Closure $get, Closure $set) {
                        return Action::make('action')
                            ->label('Add team')
                            ->icon('heroicon-o-plus')
                            ->action(function (array $data) {
                                Team::updateOrCreate([

                                    'team_name' => $data['team_name'],
                                ]);

                                Notification::make('Team added')
                                    ->success()
                                    ->title('Success')
                                    ->body('Team  has been added successfully')
                                    ->send();
                            }) ->form([
                                Forms\Components\TextInput::make('team_name')
                                ->required()
                                ->maxLength(255),
                                FileUpload::make('team_logo')
                                ->image()->maxSize(200)->preserveFilenames()->imageCropAspectRatio('1:1')
                                ->imageResizeTargetWidth('100')
                                ->imageResizeTargetHeight('100'),
                                Select::make('team_players')
                                ->multiple()
                                ->relationship('player', 'user.name')
                                ->preload(),
                                Select::make('team_officials')
                                ->multiple()
                                ->options([
                                    'Official 1' => 'Official 1',
                                    'Official 2' => 'Official 2',
                                    'Official 3' => 'Official 3',
                                    'Official 4' => 'Official 4',
                                ])->preload(),
                            ]);
                    }),
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
