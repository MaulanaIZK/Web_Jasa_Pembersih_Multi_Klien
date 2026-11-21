<x-layouts.admin title="Manajemen Mitra Klien & Komisi">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-900">Daftar Mitra Penyedia Jasa</h2>
                <p class="text-sm text-gray-500">Kelola profil mitra, status keaktifan, dan deskripsi layanan</p>
            </div>
            <a href="{{ route('admin.clients.create') }}" class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded-lg text-sm shadow-sm transition">
                + Tambah Mitra Baru
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-gray-700 uppercase text-xs font-semibold border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3">ID Client</th>
                        <th class="px-4 py-3">Nama Client</th>
                        <th class="px-4 py-3">Nama Pebisnis</th>
                        <th class="px-4 py-3">No. Telepon</th>
                        <th class="px-4 py-3">Layanan</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($clients as $client)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-mono text-xs text-gray-500">#{{ $client->idClient }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-900">{{ $client->namaClient }}</td>
                            <td class="px-4 py-3">{{ $client->namaPebisnis }}</td>
                            <td class="px-4 py-3">{{ $client->noTelepon }}</td>
                            <td class="px-4 py-3">{{ $client->layanan }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2.5 py-0.5 text-xs font-bold rounded-full {{ strtolower($client->status) === 'aktif' || strtolower($client->status) === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ strtoupper($client->status ?? 'Aktif') }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.clients.edit', $client->idClient) }}" class="text-sky-600 font-bold hover:underline">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-400">
                                Belum ada Mitra Klien terdaftar di basis data.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
