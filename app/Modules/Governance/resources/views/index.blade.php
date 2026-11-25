@php
    $clients = $clients ?? \App\Models\Client::with('user')->latest()->get();
    $counts = $counts ?? collect();
    $status = $status ?? null;
    $menunggu = (int) ($counts['pending'] ?? 0);
    $tabs = [
        '' => 'Semua',
        'pending' => 'Menunggu verifikasi',
        'active' => 'Aktif',
        'suspended' => 'Nonaktif',
        'rejected' => 'Ditolak',
    ];
    $badge = [
        'pending' => ['Menunggu verifikasi', 'bg-amber-100 text-amber-700'],
        'active' => ['Aktif', 'bg-green-100 text-green-700'],
        'suspended' => ['Nonaktif', 'bg-gray-200 text-gray-700'],
        'rejected' => ['Ditolak', 'bg-red-100 text-red-700'],
    ];
@endphp
<x-layouts.admin title="Kelola Mitra Klien">
  <div class="space-y-6">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Kelola Mitra Klien</h1>
      <p class="text-sm text-gray-500 mt-1">Verifikasi pendaftaran mandiri, aktifkan, atau nonaktifkan mitra penyedia jasa di platform CleanerShip.</p>
      <a href="{{ route('admin.clients.create') }}" class="inline-block mt-4 bg-sky-500 hover:bg-sky-600 text-white text-sm font-bold px-4 py-2 rounded-lg">+ Tambah Mitra</a>
    </div>

    @if ($menunggu > 0 && $status !== 'pending')
      <a href="{{ route('admin.clients.index', ['status' => 'pending']) }}" class="block rounded-lg bg-amber-50 border border-amber-200 text-amber-800 text-sm px-4 py-3 hover:bg-amber-100">
        <strong>{{ $menunggu }}</strong> pendaftaran mitra menunggu verifikasi. Klik untuk meninjau.
      </a>
    @endif

    @if (session('success'))
      <div class="rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm px-4 py-3">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
      <div class="rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3">{{ $errors->first() }}</div>
    @endif

    <div class="flex flex-wrap gap-2">
      @foreach ($tabs as $key => $labelTab)
        @php
            $jumlah = $key === '' ? $counts->sum() : (int) ($counts[$key] ?? 0);
            $aktifTab = (string) $status === (string) $key;
        @endphp
        <a href="{{ $key === '' ? route('admin.clients.index') : route('admin.clients.index', ['status' => $key]) }}"
           class="px-3 py-1.5 rounded-full text-xs font-semibold border {{ $aktifTab ? 'bg-sky-500 border-sky-500 text-white' : 'bg-white border-gray-300 text-gray-700 hover:bg-gray-50' }}">
          {{ $labelTab }} ({{ $jumlah }})
        </a>
      @endforeach
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
      <div class="px-5 py-4 border-b border-gray-100 text-sm font-semibold text-gray-700">
        {{ $clients->count() }} mitra ditampilkan
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
              @php
                  $st = strtolower((string) $client->status);
                  if ($st === 'aktif' || $st === 'verified') { $st = 'active'; }
                  [$labelStatus, $kelasStatus] = $badge[$st] ?? [ucfirst($st ?: 'menunggu'), 'bg-amber-100 text-amber-700'];
              @endphp
              <tr class="border-t border-gray-100 align-top">
                <td class="px-4 py-3">
                  <p class="font-semibold text-gray-900">{{ $client->business_name ?: $client->name }}</p>
                  <p class="text-xs text-gray-500">{{ $client->name }}</p>
                  <p class="text-xs text-gray-400 mt-1">Mendaftar {{ $client->created_at?->diffForHumans() }}</p>
                  @if (in_array($st, ['pending', 'rejected'], true))
                    <p class="text-xs text-gray-600 mt-2">KTP: {{ $client->ktp_number ?: 'belum diisi' }}</p>
                    @if ($client->face_verification_url)
                      <a href="{{ $client->face_verification_url }}" target="_blank" rel="noopener" class="text-xs text-sky-600 hover:underline">Lihat verifikasi wajah</a>
                    @else
                      <p class="text-xs text-gray-400">Verifikasi wajah belum diunggah</p>
                    @endif
                  @endif
                </td>
                <td class="px-4 py-3 text-gray-700">
                  <p>{{ $client->phone ?: '-' }}</p>
                  <p class="text-xs text-gray-500">{{ optional($client->user)->email }}</p>
                </td>
                <td class="px-4 py-3 text-gray-700">{{ $client->service_area ?: '-' }}</td>
                <td class="px-4 py-3 text-gray-700">
                  <p>{{ $client->bank_name ?: '-' }}</p>
                  <p class="text-xs text-gray-500">{{ $client->bank_account_number }}</p>
                  <p class="text-xs text-gray-500">{{ $client->bank_account_holder }}</p>
                </td>
                <td class="px-4 py-3">
                  <span class="inline-block rounded-full text-xs font-semibold px-2.5 py-1 {{ $kelasStatus }}">{{ $labelStatus }}</span>
                  @if ($st === 'rejected' && $client->rejection_reason)
                    <p class="text-xs text-red-600 mt-2 max-w-xs">Alasan: {{ $client->rejection_reason }}</p>
                  @endif
                </td>
                <td class="px-4 py-3 text-right whitespace-nowrap">
                  @if ($st === 'pending' || $st === 'rejected')
                    <form method="POST" action="{{ route('admin.clients.verify', $client) }}" class="inline" onsubmit="return confirm('Setujui pendaftaran mitra ini?')">
                      @csrf
                      <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white text-xs font-bold px-3 py-1.5 rounded-md">{{ $st === 'rejected' ? 'Setujui ulang' : 'Setujui' }}</button>
                    </form>
                  @endif
                  @if ($st === 'pending')
                    <details class="inline-block align-top text-left">
                      <summary class="cursor-pointer inline-block bg-white border border-red-300 text-red-600 hover:bg-red-50 text-xs font-bold px-3 py-1.5 rounded-md">Tolak</summary>
                      <form method="POST" action="{{ route('admin.clients.reject', $client) }}" class="mt-2 w-64 space-y-2">
                        @csrf
                        <textarea name="reason" rows="3" required minlength="5" maxlength="500" placeholder="Alasan penolakan" class="w-full rounded-md border border-gray-300 text-xs p-2"></textarea>
                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-md">Kirim penolakan</button>
                      </form>
                    </details>
                  @endif
                  @if ($st === 'suspended')
                    <form method="POST" action="{{ route('admin.clients.toggle-status', $client) }}" class="inline">
                      @csrf
                      <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white text-xs font-bold px-3 py-1.5 rounded-md">Aktifkan</button>
                    </form>
                  @endif
                  @if ($st === 'active')
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
                  @if ($status)
                    Tidak ada mitra pada kategori ini.
                  @else
                    Belum ada mitra terdaftar. Mitra yang mendaftar mandiri akan muncul di sini untuk diverifikasi.
                  @endif
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layouts.admin>