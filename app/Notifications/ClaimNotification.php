<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;

class ClaimNotification extends Notification
{
    use Queueable;
    public $causer, $subject, $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($causer, $data, $subject)
    {
        $this->causer = $causer;
        $this->data = $data;
        $this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get thedata to insert into the database.
     *
     * @param  mixed  $notifiable
     * @return $data
     */
    public function toDatabase($notifiable)
    {
        return [
            'causer' => $this->causer,
            'data' => $this->data,
            'subject' => $this->subject
        ];
    }

    public function toBroadcast($notifiable) 
    {
        return new BroadcastMessage([ 
            'invoice_id' => $this->invoice->id, 
            'amount' => $this->invoice->amount, 
            ]);
    }
}
