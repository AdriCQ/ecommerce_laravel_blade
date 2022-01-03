<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    public $message;
    public $subject;
    public $contact;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contact, $subject, $message)
    {
        $this->contact = $contact;
        $this->subject = $subject;
        $this->message = $message;
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
        return (new MailMessage)
            ->subject('Notificacion de Contacto')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Hemos recibido un comentario')
            ->line($this->contact)
            ->line($this->subject)
            ->line($this->message);
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
            'contact' => $this->contact,
            'subject' => $this->subject,
            'message' => $this->message
        ];
    }
}
