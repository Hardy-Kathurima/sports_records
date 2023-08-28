<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\Team;
use App\Models\User;
use Filament\Tables;
use App\Models\Player;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Filament\Pages\MyProfile;
use Filament\Resources\Pages\Page;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Route;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Actions\Action;
use App\Filament\Resources\TeamResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Awcodes\DropInAction\Forms\Components\DropInAction;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use Filament\Forms\Components\Actions\Action as FormAction;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public $players;



    public static function form(Form $form): Form
    {



        $players = Player::where('player_status', '=', 'Verified')
        ->where('user_id', '=', auth()->user()->id)
        ->get();
        return $form
            ->schema([

                DropInAction::make('add team players')
                    ->hiddenOn('view')
                    ->hidden(function(){

                        $admin = User::where('registration_type', '=', 'Player')
                        ->where('creator_id', '=', auth()->user()->id)->get();

                        if($admin->count() < 12){
                            return false;
                        }
                        return true;
                    })
                    ->execute(function (Closure $get, Closure $set) {
                        return FormAction::make('action')
                            ->label('Add team player')
                            ->icon('heroicon-o-plus')
                            ->action(function (array $data) {



                                User::updateOrCreate( [
                                    'name' => $data['name'],
                                    'email' => $data['email'],
                                    'phone' => $data['phone'],
                                    'registration_type' => $data['registration_type'],
                                    'creator_id'=> auth()->user()->id,
                                    'password' => $data['password'],
                                ]);

                                $recipient = User::where('email','=',$data['email'])->get();
                                $recipient2 = User::where('email', '=', $data['email'])->first();

                                $recipient2->assignRole('Player');



                                Notification::make()
                                ->success()
                                ->title('Assigned team')
                                ->body('You have been added as a player. Please complete your profile')
                                ->actions([
                                    Action::make('Complete my profile')

                                        ->url('/admin/my-profile'),
                                ])
                                ->sendToDatabase($recipient);


                                Notification::make('Team player Added')
                                    ->success()
                                    ->title('Success')
                                    ->body('Team player has been added successfully')
                                    ->send();
                            })
                            ->form([
                                TextInput::make('name')
                                    ->required()
                                    ->autofocus()
                                    ->placeholder('Enter player name'),

                                    TextInput::make('email')
                                    ->required()
                                    ->autofocus()
                                    ->email()
                                    ->placeholder('Enter player email'),

                                    TextInput::make('phone')
                                    ->required()
                                    ->autofocus()
                                    ->placeholder('Enter player phone'),
                                    Select::make('registration_type')
                                    ->label('Registration type')
                                    ->options(Role::all()->pluck('name', 'name'))
                                    ->searchable()->disabled(auth()->user()->hasRole(['Team official']))->default('Player')->preload(),
                                    Forms\Components\TextInput::make('password')
                                    ->password()->dehydrateStateUsing(fn ($state) => Hash::make($state))->dehydrated(fn ($state)=>filled($state))
                                    ->same('password_confirmation')
                                    ->required(fn (Page $livewire) =>($livewire instanceof CreateUser))
                                    ->maxLength(255),

                                    TextInput::make('password_confirmation')
                                    ->password()

                            ]);
                    }),

                    DropInAction::make('add team admin')
                    ->hiddenOn('view')
                    ->hidden(function(){

                        $admin = User::where('registration_type', '=', 'Team admin')
                        ->where('creator_id', '=', auth()->user()->id)->get();

                        if($admin->count() < 2){
                            return false;
                        }
                        return true;
                    })
                    ->execute(function (Closure $get, Closure $set) {
                        return FormAction::make('action')
                            ->label('Add team admin')
                            ->icon('heroicon-o-plus')
                            ->action(function (array $data) {



                                User::updateOrCreate( [
                                    'name' => $data['name'],
                                    'email' => $data['email'],
                                    'phone' => $data['phone'],
                                    'registration_type' => $data['registration_type'],
                                    'creator_id'=> auth()->user()->id,
                                    'password' => $data['password'],
                                ]);

                                $recipient = User::where('email','=',$data['email'])->get();


                                $recipient2 = User::where('email', '=', $data['email'])->first();

                                $recipient2->assignRole('Team admin');



                                Notification::make('Team admin Added')
                                    ->success()
                                    ->title('Assigned team admin')
                                    ->body('You have been added as a team admin. Please complete your profile')
                                    ->actions([
                                        Action::make('Complete my profile')
                                            ->url('/admin/my-profile'),
                                    ])
                                    ->sendToDatabase($recipient);



                                    Notification::make('Team admin Added')
                                    ->success()
                                    ->title('Success')
                                    ->body('Team admin has been added successfully')
                                    ->send();
                            })
                            ->form([
                                TextInput::make('name')
                                    ->required()
                                    ->autofocus()
                                    ->placeholder('Enter admin name'),

                                    TextInput::make('email')
                                    ->required()
                                    ->autofocus()
                                    ->email()
                                    ->placeholder('Enter admin email'),

                                    TextInput::make('phone')
                                    ->required()
                                    ->autofocus()
                                    ->placeholder('Enter admin phone'),
                                    Select::make('registration_type')
                                    ->label('Registration type')
                                    ->options(Role::all()->pluck('name', 'name'))
                                    ->searchable()->disabled(auth()->user()->hasRole(['Team official']))->default('Team admin')->preload(),
                                    Forms\Components\TextInput::make('password')
                                    ->password()->dehydrateStateUsing(fn ($state) => Hash::make($state))->dehydrated(fn ($state)=>filled($state))
                                    ->same('password_confirmation')
                                    ->required(fn (Page $livewire) =>($livewire instanceof CreateUser))
                                    ->maxLength(255),

                                    TextInput::make('password_confirmation')
                                    ->password()

                            ]);
                    }),

                Forms\Components\TextInput::make('team_name')
                    ->required()
                    ->maxLength(255),
                    Repeater::make('team_players')
                    ->label('team_players')
                    ->schema([
                        Select::make('team_player')
                        ->reactive()
                        ->required()
                        ->label('team players')
                        ->options(User::where('registration_type', '=', 'Player')
                            ->where('creator_id', '=', auth()->user()->id)
                            ->pluck('name', 'id'))
                        ->reactive(),
                    ]) ->defaultItems(2)->maxItems(11),
                    FileUpload::make('team_logo')
                    ->image()->maxSize(200)->preserveFilenames()->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('100')
                    ->imageResizeTargetHeight('100')->required(),
                    Select::make('team_players')
                    ->multiple()
                    ->options(Player::where('player_status', '=', 'Verified')
                    ->where('user_id', '=', auth()->user()->id)
                    ->get())->hidden(function(){
                        if(!Player::where('player_status', '=', 'Verified')
                        ->where('user_id', '=', auth()->user()->id)
                        ->get()){
                            return false;
                        }
                        return true;
                    })->preload(),

                    Repeater::make('team_officials')
                    ->label('team_admins')
                    ->schema([
                        Select::make('team_admins')
                        ->reactive()
                        ->required()
                        ->label('team admins')
                        ->options(User::where('registration_type', '=', 'Team admin')
                            ->where('creator_id', '=', auth()->user()->id)
                            ->pluck('name', 'id'))
                        ->reactive(),
                    ]) ->defaultItems(2)->maxItems(2),




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
