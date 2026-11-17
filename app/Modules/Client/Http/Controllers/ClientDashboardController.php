<?php

namespace App\Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $orders = [
            ['id' => 'ORD-2026-001', 'customer' => 'Budi Santoso', 'service' => 'Deep Cleaning Rumah', 'status' => 'PENDING', 'amount' => 350000],
            ['id' => 'ORD-2026-002', 'customer' => 'Siti Rahma', 'service' => 'Pembersihan AC 2 Unit', 'status' => 'IN_PROGRESS', 'amount' => 180000],
            ['id' => 'ORD-2026-003', 'customer' => 'Ahmad Razi', 'service' => 'Cuci Sofa & Karpet', 'status' => 'COMPLETED', 'amount' => 450000],
        ];

        return view('client.dashboard', compact('orders'));
    }
}
