<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class ApprovedApplication extends Notification
{
    use Queueable;
    public $job;
    public $application;
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($job,$application,$name)
    {
        $this->job = $job;
        $this-> application = $application;
        // $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
        'mail',
        "database "
        ,'nexmo'
    ];
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
                    ->line('Your Job Application Has  Been Approved.')
                    // ->line("$this->name just suggested:",$this->application->content)
                    ->action('Notification Action', url('/p'))
                    ->line('Thank you for using our application!');
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
              ->content("$this->name just approved your application");
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
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [

            'job'=>$this->application->job,
            // $this->job = $job,
        ];
    }
}
