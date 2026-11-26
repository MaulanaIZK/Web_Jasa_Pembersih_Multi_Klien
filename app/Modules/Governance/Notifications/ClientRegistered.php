<?php

namespace App\Modules\Governance\Notifications;

use App\Models\Client;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * UC-29: admin diberi tahu ada Client yang mendaftar mandiri dan perlu diverifikasi.
 */
class ClientRegistered extends Notification
{
    public function __construct(public Client $client) {}

    /** @return array<int, string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Client baru menunggu verifikasi: '.$this->client->business_name)
            ->line($this->client->business_name.' mendaftar sebagai Client di wilayah '.$this->client->service_area.'.')
            ->line('Pemilik: '.$this->client->name.' ('.$this->client->phone.')')
            ->action('Tinjau pendaftaran', route('admin.clients.index'));
    }
}
