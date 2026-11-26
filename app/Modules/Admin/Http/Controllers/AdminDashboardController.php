<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_clients' => Client::count(),
            'active_clients' => Client::whereIn('status', ['active', 'aktif', 'Aktif'])->count(),
            'total_revenue' => 125000000,
            'platform_commission' => 12500000,
        ];

        $recentClients = Client::latest('created_at')->take(5)->get();

        return view('admin::dashboard', compact('stats', 'recentClients'));
    }
}
