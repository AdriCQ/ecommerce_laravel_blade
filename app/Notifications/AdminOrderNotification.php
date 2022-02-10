<?php

namespace App\Notifications;

// use App\Models\Shop\Order;

use App\Models\Shop\Config;
use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminOrderNotification extends Notification
{
  use Queueable;
  public $order;
  public $url;
  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($order)
  {
    $this->order = $order;
    $hash = $this->order->getHash();
    $this->url = url('/order/' . $this->order->id . '?hash=' . $hash);
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
      ->from($config['name'])
      ->subject('Notificacion de pedido')
      ->greeting('Hola ' . $notifiable['name'])
      ->line('Le enviamos el informe de un nuevo pedido')
      ->action('Ver pedido', $this->url)
      ->line('Le mantendremos informado de nuestros servicios');
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
      'order' => $this->order,
      'url' => $this->url
    ];
  }
}
