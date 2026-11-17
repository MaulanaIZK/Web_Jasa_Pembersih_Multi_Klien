<?php

namespace App\Modules\Governance\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class GovernanceController extends Controller
{
    public function index(Request $request)
    {
        $clients = class_exists(Client::class) ? Client::latest()->get() : [];

        if (view()->exists('governance::index')) {
            return view('governance::index', compact('clients'));
        }

        return redirect()->route('admin.dashboard');
    }
}
