<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;
use App\Mail\TestSendMail;
use App\Models\Hour;

class SendEmail extends Notification
{
    use Queueable;

    protected $hour;
    protected $to;
    protected $subject;
    // protected $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(hour $hour, $to=null, $subject=null)
    {
        $this->hour = $hour;
        $this->to = 'example@example.com';
        $this->subject = '時間登録内容';
        // $this->body = $body;
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
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');

        return Mail::to($this->to)->send(new TestSendMail($this->subject, $this->body));
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
