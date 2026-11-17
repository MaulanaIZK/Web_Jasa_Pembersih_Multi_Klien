<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::latest('created_at')->get();
        return view('admin::clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin::clients.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.clients.index');
    }

    public function edit($idClient)
    {
        $client = Client::findOrFail($idClient);
        return view('admin::clients.edit', compact('client'));
    }
}
