<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BookedOrder extends Notification
{
    use Queueable;
    protected $theproduct;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($theproduct)
    {
        $this->theproduct = $theproduct;
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
        ->subject('AfriFashion: Booking')
        ->line('Thank you for your Booking')
        ->line('We got your booking for this: '. $this->theproduct->productname . ' which cost: $'. $this->theproduct->productprice)
        ->line('Your order will be shipped to you soon')
        // ->action('Confirm Account', url($url))
        ->line('Thank you for using Afri Fashion!');
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
