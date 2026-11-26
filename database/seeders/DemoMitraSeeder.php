<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoMitraSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'mitra.demo@cleanership.test'],
            [
                'name' => 'Mitra Demo',
                'password' => 'Mitra12345',
                'role' => 'client',
                'status' => 'active',
            ]
        );

        $client = Client::firstOrCreate(
            ['user_id' => $user->id],
            [
                'name' => 'Mitra Demo',
                'slug' => 'bersihyuk-demo',
                'phone' => '081234567890',
                'business_name' => 'BersihYuk Demo',
                'bank_name' => 'BCA',
                'bank_account_number' => '1234567890',
                'bank_account_holder' => 'Mitra Demo',
                'description' => 'Akun demo untuk uji coba platform.',
                'service_area' => 'Surabaya',
                'status' => 'active',
            ]
        );

        if (Service::where('client_id', $client->id)->count() === 0) {
            $items = [
                ['Pembersihan Rumah Standar', 'Rumah', 'Saput, pel, lap debu perabot, & pembersihan kamar mandi utama.', 150000],
                ['Deep Cleaning & Disinfeksi', 'Rumah', 'Pembersihan kerak kamar mandi, dapur, & penyemprotan disinfektan steril.', 350000],
                ['Pembersihan Kantor Harian', 'Kantor', 'Pembersihan lantai, meja kerja, dan toilet kantor.', 500000],
                ['Cuci Mobil Detailing', 'Mobil', 'Cuci eksterior, vakum interior, dan semir dashboard.', 120000],
            ];

            foreach ($items as [$name, $category, $description, $price]) {
                Service::create([
                    'client_id' => $client->id,
                    'name' => $name,
                    'category' => $category,
                    'description' => $description,
                    'base_price' => $price,
                    'is_active' => true,
                ]);
            }
        }
    }
}
