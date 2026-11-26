<?php

namespace App\Modules\Governance\Notifications;

use App\Models\Client;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Client diberi tahu hasil verifikasi pendaftarannya oleh admin.
 */
class ClientReviewed extends Notification
{
    public function __construct(
        public Client $client,
        public bool $approved = true,
        public ?string $reason = null,
    ) {}

    /** @return array<int, string> */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        if ($this->approved) {
            return (new MailMessage)
                ->subject('Pendaftaran Client Anda disetujui')
                ->line('Akun '.$this->client->business_name.' sudah diverifikasi admin dan aktif.')
                ->action('Masuk ke akun', route('login'));
        }

        return (new MailMessage)
            ->subject('Pendaftaran Client Anda belum dapat disetujui')
            ->line('Pendaftaran '.$this->client->business_name.' ditolak oleh admin.')
            ->line('Alasan: '.$this->reason)
            ->line('Silakan hubungi admin atau daftar ulang dengan data yang sudah diperbaiki.');
    }
}