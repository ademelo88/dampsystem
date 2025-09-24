<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class QuoteSent extends Notification
{
    use Queueable;

    public function via($notifiable){ return ['mail']; }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Quote is Ready')
            ->line('Please review your Good/Better/Best options in the portal.')
            ->action('Open Portal', url('/portal'));
    }
}
