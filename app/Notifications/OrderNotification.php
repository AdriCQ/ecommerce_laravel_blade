<?php

namespace App\Notifications;

use App\Models\Shop\Client;
use App\Models\Shop\Config;
use App\Models\Shop\Order;
use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
  use Queueable;

  public $order;
  public $url;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(Order $order)
  {
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
   * @param Client $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail(Client $notifiable)
  {
    $config = Config::query()->first();
    return (new MailMessage)
      // ->from(env('MAIL_FROM_ADDRESS'), $config['name'])
      ->subject('Notificacion de Pedido')
      ->greeting('Hola ' . $notifiable->name)
      ->line('Le enviamos el informe de su pedido')
      ->action('Ver pedido', $this->url)
      ->line('Gracias por usar nuestros servicios');
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
