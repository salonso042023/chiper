<?php

namespace App\Notifications;

//Added Step 07 - SA
use App\Models\Chirp;

use Illuminate\Bus\Queueable;
//Added Step 07 - SA
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewChirp extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    //Added Step 07 - SA
    public function __construct(public Chirp $chirp)
    {
        //
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
        //Added Step 07 - SA
        return (new MailMessage)
                    ->subject("New Chirp from {$this->chirp->user->name}")
                    ->greeting("New Chirp from {$this->chirp->user->name}")
                    ->line(Str::limit($this->chirp->message, 50))
                    ->action('Go to Chirper', url('/'))
                    ->line('Thank you for using our application!');
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
