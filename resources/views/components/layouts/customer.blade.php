@props(['title' => 'Pelanggan'])
<!DOCTYPE html>
<html lang="id" class="antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - CleanerShip</title>
    <script src="[suspicious link removed]"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-sky-50 text-gray-800 font-sans antialiased">
    <div class="mx-auto flex min-h-screen w-full max-w-md flex-col bg-white shadow-sm border-x border-gray-100">
        <header class="sticky top-0 z-10 flex min-h-14 items-center justify-between border-b border-gray-200 bg-white px-4">
            <span class="text-base font-extrabold text-sky-500">Cleaner<span class="text-gray-900">Ship</span></span>
            <span class="text-sm font-semibold text-gray-700">{{ $title }}</span>
        </header>
        <main class="flex-1 p-4">{{ $slot }}</main>
        <footer class="border-t border-gray-200 p-4 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} CleanerShip Platform
        </footer>
    </div>
</body>
</html>
