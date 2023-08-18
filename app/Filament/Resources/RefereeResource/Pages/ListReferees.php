<?php

namespace App\Filament\Resources\RefereeResource\Pages;

use App\Filament\Resources\RefereeResource;
use Filament\Pages\Actions;


use App\Models\Position;
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

class ListReferees extends ListRecords
{
    protected static string $resource = RefereeResource::class;

    public $client;

    public function mount(): void
    {
        $this->client = auth()->user();
    }

    protected function getActions(): array
    {
        return [
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
                ->label('Edit Information')
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
