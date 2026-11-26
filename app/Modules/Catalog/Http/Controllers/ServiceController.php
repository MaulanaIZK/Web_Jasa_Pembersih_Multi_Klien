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
        $query = Service::query()
            ->where('is_active', true)
            ->with('client')
            ->when($request->filled('q'), function ($q) use ($request) {
                $kata = '%'.$request->input('q').'%';
                $q->where(fn ($w) => $w->where('name', 'like', $kata)->orWhere('description', 'like', $kata));
            })
            ->when($request->filled('kategori'), fn ($q) => $q->where('category', $request->input('kategori')))
            ->when($request->filled('harga'), function ($q) use ($request) {
                $q->where(function ($w) use ($request) {
                    foreach ((array) $request->input('harga') as $range) {
                        [$min, $max] = array_pad(explode('-', (string) $range), 2, '');
                        $w->orWhere(function ($r) use ($min, $max) {
                            if ($min !== '') {
                                $r->where('base_price', '>=', (int) $min);
                            }
                            if ($max !== '') {
                                $r->where('base_price', '<', (int) $max);
                            }
                        });
                    }
                });
            });

        match ($request->input('urutan')) {
            'termurah' => $query->orderBy('base_price'),
            'termahal' => $query->orderByDesc('base_price'),
            default => $query->latest(),
        };

        $services = $query->get();

        return view('catalog::customer.index', compact('services'));
    }

    public function publicShow(Service $service): View
    {
        $service->load('client');

        return view('catalog::customer.show', compact('service'));
    }

    // Untuk Portal Client (Penyedia Jasa)
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Service::class);
        
        $client = $request->user()->client;
        $services = $client->services()->latest()->get();

        return view('catalog::client.index', compact('client', 'services'));
    }

    public function create(Request $request): View
    {
        $this->authorize('create', Service::class);
       
        $client = $request->user()->client;

        return view('catalog::client.create', compact('client'));
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        $this->authorize('create', Service::class);

        $client = $request->user()->client;

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

    public function edit(Request $request, Service $service): View
    {
        $this->authorize('update', $service);

        $client = $request->user()->client;

        return view('catalog::client.edit', compact('client', 'service'));
    }

    public function update(ServiceRequest $request, Service $service): RedirectResponse
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

    public function toggleStatus(Service $service): RedirectResponse
    {
        $this->authorize('update', $service);

        $service->update(['is_active' => ! $service->is_active]);

        return back()->with('success', 'Status layanan berhasil diubah!');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $this->authorize('delete', $service);

        $service->delete();

        return redirect()->route('client.services.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }
}