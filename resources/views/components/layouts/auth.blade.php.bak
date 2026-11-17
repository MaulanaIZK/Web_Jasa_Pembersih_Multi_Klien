<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Autentikasi' }} - CleanerShip</title>
    <!-- Tailwind Play CDN -->
    <script src="[suspicious link removed]"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fallback Styling lokal jika CDN / Vite belum aktif -->
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; background-color: #0f172a; color: #f8fafc; margin: 0; }
        .auth-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 1.5rem; background: linear-gradient(to bottom right, #0c4a6e, #0f172a, #111827); }
        .auth-card { background: #ffffff; color: #1e293b; border-radius: 1rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4); padding: 2rem; width: 100%; max-width: 26rem; border: 1px solid #f1f5f9; }
        .input-field { width: 100%; padding: 0.75rem 1rem; border-radius: 0.75rem; border: 1px solid #cbd5e1; font-size: 0.875rem; margin-top: 0.25rem; outline: none; box-sizing: border-box; }
        .input-field:focus { border-color: #0284c7; box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.2); }
        .btn-primary { width: 100%; background: #0284c7; color: #ffffff; font-weight: 700; padding: 0.75rem; border-radius: 0.75rem; border: none; cursor: pointer; font-size: 0.875rem; margin-top: 1rem; transition: background 0.2s; }
        .btn-primary:hover { background: #0369a1; }
    </style>
</head>
<body>
    <div class="auth-container">
        {{ $slot }}
    </div>
</body>
</html>