<?php

namespace App\Notifications;

use App\Models\Shop\Config;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FindOrderNotification extends Notification
{
  use Queueable;

  public $email;
  public $name;
  public $order;
  public $url;
  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($name, $email, $order)
  {
    $this->name = $name;
    $this->email = $email;
    $this->order = $order;
    $hash = $order->getHash();
    $this->url = url('/order/' . $order->id . '?hash=' . $hash);
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
    $config = Config::query()->first();
    return (new MailMessage)
      // ->from(env('MAIL_FROM_ADDRESS'), $config['name'])
      ->subject('Notificacion de Rastreo')
      ->greeting('Solicitud de Rastreo')
      ->line('El cliente ' . $this->name . ' ha solicitado rastrear su pedido')
      ->action('Buscar pedido', url($this->url))
      ->line('Para responderle puede enviarle un email a ' . $this->email);
    // ->action('Responder', 'mailto:' . $this->email);
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
