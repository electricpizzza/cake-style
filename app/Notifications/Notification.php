<?php

namespace App\Notifications;

use App\Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class Notification extends Notification
{
    use Queueable;
    public $order,$user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order,User $user)
    {
        $this->order = $order;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $info = $this->order;
        dd($info);
        $info = [
            "id"=> $info->id,
            "user"=>$this->user->id
        ];
        return $info;
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
