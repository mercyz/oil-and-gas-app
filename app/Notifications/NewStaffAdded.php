<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewStaffAdded extends Notification
{
    use Queueable;
    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $newStaff = $this->data;
        return (new MailMessage)
                    ->subject('Welcome on Board!')
                    ->greeting('Congrats! '. $newStaff->firstname ." ". $newStaff->lastname)
                    ->line('Email: '. $newStaff->email)
                    ->line('Password: '. $newStaff->password)
                    ->line('Please do login with the following details above and reset your password. after Clicking the Verify Account button below')
                    ->action('Verify Account', url('/verfy'.$newStaff->token))
                    ->line('Welcome on borad once again! having an Issue? Please Feel Free to contact support@hallmarkgroupng.com');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
