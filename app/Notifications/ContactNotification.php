<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    public $admin;
    public $request;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $admin, array $request)
    {
        $this->admin = $admin;
        $this->admin->email = static_setting('email');
        $this->request = $request;
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
            ->subject(config('app.name'))
            ->greeting('Salam! '.$this->admin->name)
            ->markdown('mail.contact', ['request' => $this->request,'user_name'=>$this->admin->name])
            ->salutation('Hörmətlə, '. config('app.name'));
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
