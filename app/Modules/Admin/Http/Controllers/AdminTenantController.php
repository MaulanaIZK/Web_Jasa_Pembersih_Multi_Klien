<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class AdminTenantController extends Controller
{
    public function index(Request $request)
    {
        $tenants = Client::latest('created_at')->get();
        return view('admin::tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('admin::tenants.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.tenants.index');
    }

    public function edit($idClient)
    {
        $tenant = Client::findOrFail($idClient);
        return view('admin::tenants.edit', compact('tenant'));
    }
}
