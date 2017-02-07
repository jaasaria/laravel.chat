<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewsNoti extends Notification implements ShouldQueue
{
    use Queueable;
    public $noti;

    public function __construct($noti)
    {
        $this->noti = $noti;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
         // mail, database, broadcast, nexmo, and slack channels.
        if($this->noti->with_email == '1'){
            return ['mail','database', 'broadcast'];
        }
        return ['database', 'broadcast'];

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/notifications/info/'. $this->noti->id);
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', $url)
                    ->line('Thank you for using our application!');            
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //save to the database - table (notifications)
        return [
            'id' => $this->noti->id,
            'title' => $this->noti->title,
            'description' => $this->noti->description
        ];
    }

    public function toDatabase($notifiable)
    {
        //save to the database - table (notifications)
        return [
            'id' => $this->noti->id,
            'title' => $this->noti->title,
            'description' => 'this is a description 123'
        ];
    }


  

}
