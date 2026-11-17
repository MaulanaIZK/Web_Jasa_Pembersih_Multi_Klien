<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Portal' }} - CleanerShip</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-800 font-sans antialiased flex">
    <aside class="w-64 bg-slate-900 text-slate-100 flex flex-col hidden md:flex min-h-screen">
        <div class="h-16 flex items-center px-6 font-bold text-lg border-b border-slate-800 text-sky-400">
            CleanerShip Admin
        </div>
        <nav class="flex-1 p-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Dasbor Utama</a>
            <a href="{{ route('admin.clients.index') }}" class="block px-3 py-2 rounded hover:bg-slate-800">Kelola Mitra Klien</a>
        </nav>
    </aside>
    <div class="flex-1 flex flex-col min-w-0">
        <header class="h-16 bg-white border-b border-gray-200 px-6 flex items-center justify-between">
            <h1 class="font-semibold text-lg text-gray-800">{{ $title ?? 'Admin' }}</h1>
            <span class="text-sm font-semibold text-sky-600">Administrator Platform</span>
        </header>
        <main class="p-6 flex-1 max-w-7xl mx-auto w-full">{{ $slot }}</main>
    </div>
</body>
</html>
