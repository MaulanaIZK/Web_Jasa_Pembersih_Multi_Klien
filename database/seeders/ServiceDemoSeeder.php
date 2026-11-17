<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceDemoSeeder extends Seeder
{
    public function run(): void
    {
        $client = Client::first();
        if (! $client) {
            $this->command->error('Belum ada Client. Buat mitra dulu.');
            return;
        }

        $items = [
            ['Pembersihan Rumah Standar', 'Rumah', 'Saput, pel, lap debu perabot, & pembersihan kamar mandi utama.', 150000],
            ['Deep Cleaning & Disinfeksi', 'Rumah', 'Pembersihan kerak kamar mandi, dapur, & penyemprotan disinfektan steril.', 350000],
            ['Cuci AC Split (1-2 PK)', 'Lainnya', 'Cuci evaporator, filter udara, & pembersihan unit outdoor AC.', 90000],
            ['Cuci Sofa & Karpet Busa', 'Rumah', 'Pembersihan sofa dan karpet dengan busa khusus.', 200000],
            ['Pembersihan Kantor Harian', 'Kantor', 'Pembersihan lantai, meja kerja, dan toilet kantor.', 500000],
            ['Cuci Mobil Detailing', 'Mobil', 'Cuci eksterior, vakum interior, dan semir dashboard.', 120000],
            ['Pembersihan Gudang', 'Gudang', 'Pembersihan debu, sampah, dan penataan area gudang.', 750000],
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