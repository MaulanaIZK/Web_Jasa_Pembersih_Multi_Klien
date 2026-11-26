<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use App\Modules\Governance\Notifications\ClientRegistered;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Notification;

/**
 * Data uji: satu Client berstatus pending, lalu admin diberi notifikasi email.
 * Jalankan: php artisan db:seed --class=PendingClientSeeder
 */
class PendingClientSeeder extends Seeder
{
    public function run(): void
    {
        $kode = now()->timestamp;

        $user = User::create([
            'name' => 'Budi Santoso',
            'email' => "budi.pending{$kode}@example.com",
            'password' => 'password123',
            'role' => 'client',
            'status' => 'pending',
        ]);

        $client = Client::create([
            'user_id' => $user->id,
            'name' => 'Budi Santoso',
            'slug' => "bersih-jaya-{$kode}",
            'phone' => '081234567890',
            'business_name' => 'CV Bersih Jaya '.$user->id,
            'bank_name' => 'BCA',
            'bank_account_number' => '1234567890',
            'bank_account_holder' => 'Budi Santoso',
            'service_area' => 'Jember',
            'status' => 'pending',
        ]);

        Notification::send(
            User::where('role', 'admin')->where('status', 'active')->get(),
            new ClientRegistered($client)
        );
    }
}