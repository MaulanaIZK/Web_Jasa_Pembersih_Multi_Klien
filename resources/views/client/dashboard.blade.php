@php
    $nama = $client->business_name ?? auth()->user()->name ?? 'Mitra';
    $layananAktif = $client ? \App\Models\Service::where('client_id', $client->id)->where('is_active', true)->count() : 0;
    $pesananTerbaru = [
        ['ORD-2026-001', 'Budi Santoso', 'Deep Cleaning Rumah', 'menunggu', 'Menunggu'],
        ['ORD-2026-002', 'Siti Rahma', 'Pembersihan AC 2 Unit', 'diproses', 'Diproses'],
        ['ORD-2026-003', 'Ahmad Razi', 'Cuci Sofa & Karpet', 'selesai', 'Selesai'],
    ];
@endphp
<x-layouts.mitra title="Dasbor Mitra Klien">
    <h1 class="mp-title">Selamat datang, {{ $nama }} &#128075;</h1>
    <p class="mp-sub">Berikut ringkasan aktivitas anda hari ini.</p>

    <div class="mp-stats">
        <div class="mp-stat">
            <div class="l">Pesanan hari ini</div>
            <div class="v">8</div>
        </div>
        <div class="mp-stat">
            <div class="l">Pendapatan bulan ini</div>
            <div class="v">Rp 4.250.000</div>
        </div>
        <div class="mp-stat">
            <div class="l">Layanan aktif</div>
            <div class="v">{{ $layananAktif }}</div>
        </div>
    </div>

    <h2 class="mp-h2">Pesanan Terbaru</h2>
    <table class="mp-table">
        <thead>
            <tr><th>ID</th><th>Pelanggan</th><th>Layanan</th><th>Status</th></tr>
        </thead>
        <tbody>
            @foreach ($pesananTerbaru as [$id, $pelanggan, $layanan, $kelas, $status])
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $pelanggan }}</td>
                    <td>{{ $layanan }}</td>
                    <td><span class="mp-badge {{ $kelas }}">{{ $status }}</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.mitra>