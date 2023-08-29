<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TeamAdminCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $client_content;

    /**
     * Create a new notification instance.
     */
    public function __construct($client_content)
    {
        $this->client_content = $client_content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Team admin notification')
        ->greeting($this->client_content['greeting'])
        ->line($this->client_content['body'])
        ->line($this->client_content['admin_email'])
        ->line($this->client_content['admin_password'])
        ->action('Complete my profile', url('http://127.0.0.1:8000/admin'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
