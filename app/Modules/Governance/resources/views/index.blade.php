@php
    $clients = $clients ?? \App\Models\Client::with('user')->latest()->get();
@endphp
<x-layouts.admin title="Kelola Mitra Klien">
  <div class="space-y-6">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Kelola Mitra Klien</h1>
      <p class="text-sm text-gray-500 mt-1">Verifikasi, aktifkan, atau nonaktifkan mitra penyedia jasa di platform CleanerShip.</p>
      <a href="{{ route('admin.clients.create') }}" class="inline-block mt-4 bg-sky-500 hover:bg-sky-600 text-white text-sm font-bold px-4 py-2 rounded-lg">+ Tambah Mitra</a>
    </div>

    @if (session('success'))
      <div class="rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
      <div class="rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3">{{ $errors->first() }}</div>
    @endif

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
      <div class="px-5 py-4 border-b border-gray-100 text-sm font-semibold text-gray-700">
        {{ $clients->count() }} mitra terdaftar
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
            <tr>
              <th class="px-4 py-3 text-left">Mitra</th>
              <th class="px-4 py-3 text-left">Kontak</th>
              <th class="px-4 py-3 text-left">Area Layanan</th>
              <th class="px-4 py-3 text-left">Bank</th>
              <th class="px-4 py-3 text-left">Status</th>
              <th class="px-4 py-3 text-right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($clients as $client)
              <tr class="border-t border-gray-100">
                <td class="px-4 py-3">
                  <p class="font-semibold text-gray-900">{{ $client->business_name ?: $client->name }}</p>
                  <p class="text-xs text-gray-500">{{ $client->name }}</p>
                </td>
                <td class="px-4 py-3 text-gray-700">
                  <p>{{ $client->phone ?: '-' }}</p>
                  <p class="text-xs text-gray-500">{{ optional($client->user)->email }}</p>
                </td>
                <td class="px-4 py-3 text-gray-700">{{ $client->service_area ?: '-' }}</td>
                <td class="px-4 py-3 text-gray-700">
                  <p>{{ $client->bank_name ?: '-' }}</p>
                  <p class="text-xs text-gray-500">{{ $client->bank_account_holder }}</p>
                </td>
                <td class="px-4 py-3">
                  @if ($client->isActive())
                    <span class="inline-block rounded-full bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1">Aktif</span>
                  @else
                    <span class="inline-block rounded-full bg-amber-100 text-amber-700 text-xs font-semibold px-2.5 py-1">{{ $client->status ?: 'Menunggu' }}</span>
                  @endif
                </td>
                <td class="px-4 py-3 text-right whitespace-nowrap">
                  @if (! $client->isActive())
                    <form method="POST" action="{{ route('admin.clients.verify', $client) }}" class="inline">
                      @csrf
                      <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white text-xs font-bold px-3 py-1.5 rounded-md">Verifikasi</button>
                    </form>
                  @else
                    <form method="POST" action="{{ route('admin.clients.toggle-status', $client) }}" class="inline" onsubmit="return confirm('Nonaktifkan mitra ini?')">
                      @csrf
                      <button type="submit" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-xs font-bold px-3 py-1.5 rounded-md">Nonaktifkan</button>
                    </form>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="px-4 py-12 text-center text-gray-500">
                  Belum ada mitra terdaftar. Klik tombol Tambah Mitra untuk mendaftarkan mitra yang sudah menandatangani kontrak.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layouts.admin>