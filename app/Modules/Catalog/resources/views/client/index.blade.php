<x-layouts.client title="Manajemen Jasa">
    @if (session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-4">
        <p class="text-sm text-gray-600">Kelola layanan pembersih yang Anda tawarkan.</p>
        <a href="{{ route('client.services.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg">
            + Tambah Layanan
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-4 py-3">Layanan</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Harga Dasar</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($services as $service)
                    <tr>
                        <td class="px-4 py-3">
                            <div class="font-medium text-gray-900">{{ $service->name }}</div>
                            <div class="text-xs text-gray-500 line-clamp-1">{{ $service->description }}</div>
                        </td>
                        <td class="px-4 py-3">{{ $service->category }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($service->base_price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            @if ($service->is_active)
                                <span class="px-2 py-1 text-xs rounded-md bg-green-50 text-green-700">Aktif</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-md bg-gray-100 text-gray-600">Libur</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <form method="POST" action="{{ route('client.services.toggle', ['service' => $service]) }}"
                                      onsubmit="return confirm('Apakah Anda ingin {{ $service->is_active ? 'menonaktifkan' : 'mengaktifkan' }} layanan ini?')">
                                    @csrf
                                    <button class="px-3 py-1 text-xs rounded-md border border-gray-300 hover:bg-gray-50">
                                        {{ $service->is_active ? 'Liburkan' : 'Aktifkan' }}
                                    </button>
                                </form>
                                <a href="{{ route('client.services.edit', ['service' => $service]) }}"
                                   class="px-3 py-1 text-xs rounded-md border border-blue-300 text-blue-700 hover:bg-blue-50">Ubah</a>
                                <form method="POST" action="{{ route('client.services.destroy', ['service' => $service]) }}"
                                      onsubmit="return confirm('Hapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 text-xs rounded-md border border-red-300 text-red-700 hover:bg-red-50">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                            Belum ada layanan. Klik "Tambah Layanan" untuk memulai.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.client>