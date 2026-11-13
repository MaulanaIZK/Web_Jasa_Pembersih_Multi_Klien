<?php

namespace App\Modules\Catalog\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Service;
use App\Modules\Catalog\Http\Requests\ServiceRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    use AuthorizesRequests;

    // Untuk Portal Pelanggan (Customer)
    public function publicIndex(Request $request): View
    {
        $services = Service::where('is_active', true)
            ->with('client')
            ->latest()
            ->get();

        return view('catalog::customer.index', compact('services'));
    }

    public function publicShow(Service $service): View
    {
        $service->load('client');

        return view('catalog::customer.show', compact('service'));
    }

    // Untuk Portal Client (Penyedia Jasa)
    public function index(Client $client): View
    {
        $this->authorize('viewAny', Service::class);
        
        $services = $client->services()->latest()->get();

        return view('catalog::client.index', compact('client', 'services'));
    }

    public function create(Client $client): View
    {
        $this->authorize('create', Service::class);
       
        return view('catalog::client.create', compact('client'));
    }

    public function store(ServiceRequest $request, Client $client): RedirectResponse
    {
        $this->authorize('create', Service::class);

        $client->services()->create($request->validated() + ['is_active' => true]);

        return redirect()->route('client.services.index')
            ->with('success', 'Layanan berhasil ditambahkan!');

        // $validated = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'category' => ['required', 'string', 'max:100'],
        //     'description' => ['required', 'string'],
        //     'base_price' => ['required', 'numeric', 'min:0'],
        // ]);

        // $client->services()->create([
        //     'name' => $validated['name'],
        //     'category' => $validated['category'],
        //     'description' => $validated['description'],
        //     'base_price' => (int) $validated['base_price'],
        //     'is_active' => true,
        // ]);
    }

    public function edit(Client $client, Service $service): View
    {
        $this->authorize('update', $service);

        return view('catalog::client.edit', compact('client', 'service'));
    }

    public function update(ServiceRequest $request, Client $client, Service $service): RedirectResponse
    {
        $this->authorize('update', $service);

        // $validated = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'category' => ['required', 'string', 'max:100'],
        //     'description' => ['required', 'string'],
        //     'base_price' => ['required', 'numeric', 'min:0'],
        // ]);

        $service->update($request->validated());

        return redirect()->route('client.services.index')
            ->with('success', 'Layanan berhasil diperbarui!');
    }

    public function toggleStatus(Client $client, Service $service): RedirectResponse
    {
        $this->authorize('update', $service);

        $service->update(['is_active' => ! $service->is_active]);

        return back()->with('success', 'Status layanan berhasil diubah!');
    }

    public function destroy(Client $client, Service $service): RedirectResponse
    {
        $this->authorize('delete', $service);

        $service->delete();

        return redirect()->route('client.services.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }
}