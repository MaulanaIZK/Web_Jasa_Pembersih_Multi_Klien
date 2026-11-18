<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portal Client - Pembersih.id' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased flex min-h-screen">
    <!-- Sidebar Client -->
    <aside class="w-64 bg-slate-900 text-slate-100 flex flex-col">
        <div class="h-16 flex items-center px-6 font-bold text-lg border-b border-slate-800">
            Portal Client
        </div>
        <nav class="flex-1 p-4 space-y-1 text-sm">
            <a href="{{ route('client.services.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Manajemen Jasa</a>
            <a href="{{ route('client.orders.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Pesanan Masuk</a>
            <a href="{{ route('client.payments.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Keuangan & Verifikasi</a>
            <a href="{{ route('client.reports.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Laporan Omset</a>
            <a href="{{ route('client.profile.edit') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Profil Usaha</a>
        </nav>
        <div class="p-4 border-t border-slate-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 text-red-400 hover:bg-slate-800 rounded">Keluar</button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col">
        <header class="h-16 bg-white border-b border-gray-200 px-6 flex items-center justify-between">
            <h1 class="font-semibold text-lg">{{ $title ?? 'Dashboard' }}</h1>
            <span class="text-sm text-gray-500">{{ auth()->user()->name ?? 'Client' }}</span>
        </header>
        <main class="p-6 flex-1">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
