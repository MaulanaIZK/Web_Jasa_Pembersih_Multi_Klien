<x-layouts.admin title="Dasbor Admin Platform">
  <div class="space-y-8">
    <div>
      <h1 class="text-2xl font-bold text-gray-900">Selamat datang, Administrator CleanerShip 👋</h1>
      <p class="text-sm text-gray-500 mt-1">Berikut adalah ringkasan performa platform dan transaksi mitra hari ini.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Total Mitra Klien</p>
        <p class="mt-2 text-xl xl:text-2xl font-bold whitespace-nowrap text-gray-900">{{ $stats['total_clients'] ?? 0 }} Mitra</p>
        <p class="mt-2 text-sm text-green-600">● {{ $stats['active_clients'] ?? 0 }} Aktif Beroperasi</p>
      </div>
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Total Transaksi Platform</p>
        <p class="mt-2 text-xl xl:text-2xl font-bold whitespace-nowrap text-blue-600">Rp {{ number_format($stats['total_revenue'] ?? 0, 0, ',', '.') }}</p>
        <p class="mt-2 text-sm text-gray-500">Bulan ini</p>
      </div>
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Komisi Platform (10%)</p>
        <p class="mt-2 text-xl xl:text-2xl font-bold whitespace-nowrap text-emerald-600">Rp {{ number_format($stats['platform_commission'] ?? 0, 0, ',', '.') }}</p>
        <p class="mt-2 text-sm text-emerald-600">Terverifikasi ledger</p>
      </div>
      <div class="bg-white rounded-xl shadow-sm border p-6">
        <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Pending Payouts</p>
        <p class="mt-2 text-xl xl:text-2xl font-bold whitespace-nowrap text-amber-500">3 Mitra</p>
        <p class="mt-2 text-sm text-amber-600">Menunggu verifikasi bank</p>
      </div>
    </div>
  </div>
</x-layouts.admin>
