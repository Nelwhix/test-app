<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterMessage;
use NotificationChannels\Twitter\TwitterDirectMessage;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class TestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $message = "No message")
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [TwitterChannel::class];
    }

    public function toTwitter(mixed $notifiable): TwitterMessage
    {
        return (new TwitterStatusUpdate('hehehe'))
            ->withImage(storage_path('app/public/larcon-pic.jpg'));
    }
}
