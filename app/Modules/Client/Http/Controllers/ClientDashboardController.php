<?php

namespace App\Modules\Client\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientDashboardController extends Controller
{
    public function index(Request $request): View
    {
        $client = $request->user()->client;

        return view('client.dashboard', compact('client'));
    }
}
