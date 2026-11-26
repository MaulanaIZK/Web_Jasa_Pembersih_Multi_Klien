<x-layouts.mitra title="Layanan">
    <div class="mp-head">
        <div>
            <h1 class="mp-title">Layanan</h1>
            <p class="mp-sub">Kelola layanan pembersih yang Anda tawarkan.</p>
        </div>
        <a href="{{ route('client.services.create') }}" class="mp-btn">+ Tambah Layanan</a>
    </div>

    @if (session('success'))
        <div class="mp-alert sukses">{{ session('success') }}</div>
    @endif

    <table class="mp-table">
        <thead>
            <tr>
                <th>Layanan</th>
                <th>Kategori</th>
                <th>Harga Dasar</th>
                <th>Status</th>
                <th class="kanan">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td>
                        <strong>{{ $service->name }}</strong>
                        <div class="mp-muted">{{ \Illuminate\Support\Str::limit($service->description, 70) }}</div>
                    </td>
                    <td>{{ $service->category }}</td>
                    <td>Rp {{ number_format($service->base_price, 0, ',', '.') }}</td>
                    <td>
                        @if ($service->is_active)
                            <span class="mp-badge aktif">Aktif</span>
                        @else
                            <span class="mp-badge libur">Libur</span>
                        @endif
                    </td>
                    <td>
                        <div class="mp-aksi">
                            <form method="POST" action="{{ route('client.services.toggle', ['service' => $service]) }}"
                                  onsubmit="return confirm('Apakah Anda ingin {{ $service->is_active ? 'menonaktifkan' : 'mengaktifkan' }} layanan ini?')">
                                @csrf
                                <button class="mp-btn kecil sekunder">{{ $service->is_active ? 'Liburkan' : 'Aktifkan' }}</button>
                            </form>
                            <a href="{{ route('client.services.edit', ['service' => $service]) }}" class="mp-btn kecil sekunder">Ubah</a>
                            <form method="POST" action="{{ route('client.services.destroy', ['service' => $service]) }}"
                                  onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="mp-btn kecil bahaya">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="mp-kosong">Belum ada layanan. Klik "Tambah Layanan" untuk memulai.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.mitra>
