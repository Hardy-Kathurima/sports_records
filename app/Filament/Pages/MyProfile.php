<?php

namespace App\Filament\Pages;



use App\Models\Team;
use App\Models\Player;
use App\Models\Referee;
use App\Models\Position;
use Filament\Pages\Page;
use Actions\CreateAction;
use App\Models\TeamAdmin;
use App\Models\TypeOfSport;
use App\Models\TeamOfficial;
use App\Models\PlayerPosition;
use App\Models\TournamentOfficial;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use App\Notifications\PasswordChanged;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ProfileResource;

class MyProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'filament.pages.my-profile';

    protected static ?string $navigationGroup = 'Manage my profile';

    public $client;

    public $teams;




    public function mount(): void
    {
        $this->client = auth()->user();
    }


    protected function getActions(): array
    {


        return [

            Action::make('Edit profile')
            ->label('Edit my profile')
            ->authorize(function () {
                return !Auth::user()->client;
            })
            ->color('warning')
            ->icon('heroicon-o-pencil') ->authorize(function () {

                $existingOfficial = TeamOfficial::where('user_id', auth()->user()->id)->first();
                $existingAdmin = TeamAdmin::where('user_id', auth()->user()->id)->first();
                $referee = Referee::where('user_id', auth()->user()->id)->first();
                $player = Player::where('user_id', auth()->user()->id)->first();
                $tournament = TournamentOfficial::where('user_id', auth()->user()->id)->first();
                if($existingOfficial || $referee || $player || $tournament || $existingAdmin){
                    return true;
                }

                return false;
            })
            ->mountUsing(function (ComponentContainer $form) {


                $teamOfficial = TeamOfficial::where('user_id', auth()->user()->id)->first();
                $teamAdmin = TeamAdmin::where('user_id', auth()->user()->id)->first();
                $referee = Referee::where('user_id', auth()->user()->id)->first();
                $player = Player::where('user_id', auth()->user()->id)->first();
                $tournament = TournamentOfficial::where('user_id', auth()->user()->id)->first();
              if(auth()->user() && $player){
                $form->fill([
                    'profile_picture' => $player->profile_picture,
                    'type_of_sport' => $player->type_of_sport,
                    'player_position' => $player->player_position,
                    'age' => $player->age,
                    'height' => $player->height,
                    'weight' => $player->weight,

                ]);
              }

              if(auth()->user() && $referee){
                $form->fill([
                    'profile_picture' => $referee->profile_picture,
                    'type_of_sport' => $referee->type_of_sport,
                    'member' => $referee->member,
                    'age' => $referee->age,
                    'height' => $referee->height,
                    'weight' => $referee->weight,

                ]);
              }

              if(auth()->user() && $teamOfficial){
                $form->fill([
                    'profile_picture' => $teamOfficial->profile_picture,
                    'type_of_sport' => $teamOfficial->type_of_sport,
                    'member' => $teamOfficial->member,
                    'age' => $teamOfficial->age,
                    'height' => $teamOfficial->height,
                    'weight' => $teamOfficial->weight,

                ]);
              }
              if(auth()->user() && $teamAdmin){
                $form->fill([
                    'profile_picture' => $teamAdmin->profile_picture,
                    'type_of_sport' => $teamAdmin->type_of_sport,
                    'member' => $teamAdmin->member,
                    'age' => $teamAdmin->age,
                    'height' => $teamAdmin->height,
                    'weight' => $teamAdmin->weight,

                ]);
              }
              if(auth()->user() && $tournament){
                $form->fill([
                    'profile_picture' => $tournament->profile_picture,
                    'type_of_sport' => $tournament->type_of_sport,
                    'member' => $tournament->member,
                    'age' => $tournament->age,
                    'height' => $tournament->height,
                    'weight' => $tournament->weight,

                ]);
              }
            })
            ->action(function (array $data) {

                $teamOfficial = TeamOfficial::where('user_id', auth()->user()->id)->first();
                $teamAdmin = TeamAdmin::where('user_id', auth()->user()->id)->first();
                $referee = Referee::where('user_id', auth()->user()->id)->first();
                $player = Player::where('user_id', auth()->user()->id)->first();
                $tournament = TournamentOfficial::where('user_id', auth()->user()->id)->first();

                if(auth()->user() && $player){
                    $player->update($data);
                  }
                if(auth()->user() && $referee){
                    $referee->update($data);
                  }
                if(auth()->user() && $tournament){
                    $tournament->update($data);
                  }
                if(auth()->user() && $teamOfficial){
                    $teamOfficial->update($data);
                  }

                if(auth()->user() && $teamAdmin){
                    $teamAdmin->update($data);
                  }


                Notification::make('Information Updated')
                    ->body('Your information has been updated successfully')
                    ->success()
                    ->icon('heroicon-o-pencil')
                    ->title('Information Updated')
                    ->send();
            })
            ->form([
                FileUpload::make('profile_picture')
                ->image()->required(),
                Select::make('type_of_sport')
                ->options(TypeOfSport::all()->pluck('name', 'name')),

                Select::make('player_team')
                ->options(Team::all()->pluck('team_name', 'id')->toArray())->hidden(!auth()->user()->hasRole(['Player'])),

                TextInput::make('member')
                    ->maxLength(255) ->hidden(! auth()->user()->hasRole(['Team official','Tournament official','Referee'])),
                    Select::make('player_position')
                ->options(PlayerPosition::all()->pluck('position', 'position')) ->hidden(function () {
                    if(in_array(auth()->user()->registration_type, ["Referee", "Team official", "Tournament official"])){

                        return true;

                    }
                    return false;
                }),
                TextInput::make('age')
                    ->required()
                    ->maxLength(255),
                TextInput::make('height')
                    ->required()
                    ->maxLength(255),
                TextInput::make('weight')
                    ->required()
                    ->maxLength(255),

            ]),

            Action::make('complete-profile')
            ->label('Complete my profile')
            ->icon('heroicon-o-key')
            ->action(function (array $data) {

                $teams = Team::all()->pluck('team_name', 'id')->toArray();

                if (empty($teams)) {
                    $teams = ['' => 'Free agent'];
                }

                if(in_array(auth()->user()->registration_type, ["Team official"])){
                    $teamOfficial = new TeamOfficial();
                    $teamOfficial->user_id = auth()->user()->id;
                    $teamOfficial->profile_picture = $data['profile_picture'];
                    $teamOfficial->type_of_sport = $data['type_of_sport'];
                    $teamOfficial->member = $data['member'];
                    $teamOfficial->age = $data['age'];
                    $teamOfficial->height = $data['height'];
                    $teamOfficial->weight = $data['weight'];
                    $teamOfficial->save();
                }


                if(in_array(auth()->user()->registration_type, ["Team admin"])){
                    $teamAdmin = new TeamAdmin();
                    $teamAdmin->user_id = auth()->user()->id;
                    $teamAdmin->profile_picture = $data['profile_picture'];
                    $teamAdmin->type_of_sport = $data['type_of_sport'];
                    $teamAdmin->member = $data['member'];
                    $teamAdmin->age = $data['age'];
                    $teamAdmin->height = $data['height'];
                    $teamAdmin->weight = $data['weight'];
                    $teamAdmin->save();
                }

                if(in_array(auth()->user()->registration_type, ["Referee"])){
                    $referee = new Referee();
                    $referee->user_id = auth()->user()->id;
                    $referee->profile_picture = $data['profile_picture'];
                    $referee->type_of_sport = $data['type_of_sport'];
                    $referee->member = $data['member'];
                    $referee->age = $data['age'];
                    $referee->height = $data['height'];
                    $referee->weight = $data['weight'];
                    $referee->save();
                }

                if(in_array(auth()->user()->registration_type, ["Tournament official"])){
                    $referee = new TournamentOfficial();
                    $referee->user_id = auth()->user()->id;
                    $referee->profile_picture = $data['profile_picture'];
                    $referee->type_of_sport = $data['type_of_sport'];
                    $referee->member = $data['member'];
                    $referee->age = $data['age'];
                    $referee->height = $data['height'];
                    $referee->weight = $data['weight'];
                    $referee->save();
                }

                if(in_array(auth()->user()->registration_type, ["Player"])){
                    $player = new Player();
                    $player->user_id = auth()->user()->id;
                    $player->player_position = $data['player_position'];
                    $player->profile_picture = $data['profile_picture'];
                    $player->player_team = $data['player_team'];
                    $player->type_of_sport = $data['type_of_sport'];
                    $player->age = $data['age'];
                    $player->height = $data['height'];
                    $player->weight = $data['weight'];
                    $player->save();
                }


                Auth::login($this->client);

                Notification::make('profile information completed')
                ->body('Your profile has been completed')
                ->success()
                ->icon('heroicon-o-user')
                ->title('Profile')
                ->send();
            })
            ->form([
                FileUpload::make('profile_picture')
                ->image()->required(),
                Select::make('type_of_sport')
                ->options(TypeOfSport::all()->pluck('name', 'name'))->required(),
                Select::make('player_team')
                ->options(Team::all()->pluck('team_name', 'id')->toArray())->hidden(!auth()->user()->hasRole(['Player'])),
                TextInput::make('member')
                    ->maxLength(255) ->hidden(! auth()->user()->hasRole(['Team official','Tournament official','Referee','Team admin'])),
                    Select::make('player_position')
                ->options(PlayerPosition::all()->pluck('position', 'position'))->hidden(! auth()->user()->hasRole(['Player'])),
                TextInput::make('age')
                    ->required()
                    ->maxLength(255),
                TextInput::make('height')
                    ->required()
                    ->maxLength(255),
                TextInput::make('weight')
                    ->required()
                    ->maxLength(255),
            ])
            ->color('success')
            ->icon('heroicon-o-pencil') ->authorize(function () {

                $existingOfficial = TeamOfficial::where('user_id', auth()->user()->id)->first();
                $existingAdmin = TeamAdmin::where('user_id', auth()->user()->id)->first();
                $referee = Referee::where('user_id', auth()->user()->id)->first();
                $player = Player::where('user_id', auth()->user()->id)->first();
                $tournament = TournamentOfficial::where('user_id', auth()->user()->id)->first();
                if($existingOfficial || $referee || $player || $tournament || $existingAdmin){
                    return false;
                }

                return true;
            }),




            Action::make('change-password')
            ->label('Change Password')
            ->icon('heroicon-o-key')
            ->action(function (array $data) {
                $this->client->update([
                    'password' => bcrypt($data['new_password']),
                ]);

                Auth::login($this->client);

                $this->client->notify(new PasswordChanged($this->client));
            })
            ->form([
                TextInput::make('current_password')
                    ->label('Current Password')
                    ->required()
                    ->password()
                    ->helperText('Please enter your current password')
                    ->currentPassword(),
                TextInput::make('new_password')
                    ->label('New Password')
                    ->rules(['different:current_password'])
                    ->required()
                    ->helperText('Please enter your new password')
                    ->reactive()
                    ->password(),
            ])
            ->modalSubheading('Ensure the password is strong and unique to this account')
            ->color('primary')
            ->outlined(),


        Action::make('edit-contact-person')
            ->color('success')
            ->authorize(function () {
                return Auth::user()->client;
            })
            ->label('Edit Contact Information')
            ->icon('heroicon-o-phone')
            ->action(function (array $data) {
                Auth::user()->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'profile_picture' => $data['profile_picture'],

                ]);

                Notification::make('Contact Information Updated')
                    ->body('Your contact information has been updated successfully')
                    ->success()
                    ->icon('heroicon-o-phone')
                    ->title('Contact Information Updated')
                    ->send();

                Notification::make('Contact Information Updated')
                    ->body('Your contact information has been updated successfully')
                    ->success()
                    ->icon('heroicon-o-phone')
                    ->title('Contact Information Updated')
                    ->sendToDatabase(Auth::user());
            })
            ->form([
                TextInput::make('name')
                    ->label('Business Name')
                    ->required()
                    ->rules(['required', 'string']),
                TextInput::make('email')
                    ->label('Your Email')
                    ->required()
                    ->email()
                    ->rules(['required', 'email']),

            ])
            ->mountUsing(function (ComponentContainer $form) {
                $contact = Auth::user()->email;
                if ($contact && Auth::user()->client) {
                    $form->fill([
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->phone,
                    ]);
                }
            })
            ->modalSubheading('Edit the contact person details'),

        Action::make('Edit Information')
            ->label('Edit contact information')
            ->authorize(function () {
                return !Auth::user()->client;
            })
            ->color('success')
            ->icon('heroicon-o-pencil')
            ->mountUsing(function (ComponentContainer $form) {
                $form->fill([
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->phone,
                ]);
            })
            ->action(function (array $data) {
                Auth::user()->update($data);

                Notification::make('Information Updated')
                    ->body('Your information has been updated successfully')
                    ->success()
                    ->icon('heroicon-o-pencil')
                    ->title('Information Updated')
                    ->send();
            })
            ->form([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->rules(['required', 'string']),

                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->rules(['required', 'email']),

                TextInput::make('phone')
                    ->label('Phone')
                    ->required()
                    ->rules(['required', 'string']),

            ])
        ];
    }


}
