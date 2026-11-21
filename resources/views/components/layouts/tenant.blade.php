@props(['title' => 'Portal Mitra Jasa'])
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - CleanerShip Mitra</title>
    <script src="[suspicious link removed]"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-800 font-sans antialiased flex">
    <aside class="w-64 bg-sky-950 text-sky-100 flex flex-col hidden md:flex">
        <div class="h-16 flex items-center px-6 font-bold text-lg border-b border-sky-900 text-sky-400">
            Mitra CleanerShip
        </div>
        <nav class="flex-1 p-4 space-y-1 text-sm">
            <a href="{{ route('client.dashboard') }}" class="block px-3 py-2 rounded hover:bg-sky-900">Dasbor Mitra</a>
            <a href="{{ route('client.services.index') }}" class="block px-3 py-2 rounded hover:bg-sky-900">Kelola Layanan & Harga</a>
        </nav>
    </aside>
    <div class="flex-1 flex flex-col min-w-0">
        <header class="h-16 bg-white border-b border-gray-200 px-6 flex items-center justify-between">
            <h1 class="font-semibold text-lg text-gray-800">{{ $title }}</h1>
            <span class="text-sm text-gray-500">{{ auth()->user()->name ?? 'Penyedia Jasa' }}</span>
        </header>
        <main class="p-6 flex-1 max-w-6xl mx-auto w-full">{{ $slot }}</main>
    </div>
</body>
</html>
