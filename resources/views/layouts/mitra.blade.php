<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dasbor Mitra Klien') - CleanerShip</title>
    <script src="[suspicious link removed]"></script>
    <style>
        .page-title { font-size: 1.5rem; font-weight: 700; color: #1e293b; }
        .page-sub { color: #64748b; font-size: 0.875rem; margin-bottom: 1.5rem; }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1rem; margin-bottom: 2rem; }
        .stat { background: #ffffff; padding: 1.25rem; border-radius: 0.75rem; border: 1px solid #e2e8f0; shadow-sm; }
        .stat .label { font-size: 0.75rem; font-weight: 600; text-transform: uppercase; color: #64748b; }
        .stat .value { font-size: 1.5rem; font-weight: 800; margin-top: 0.25rem; }
        .stat .value.text-blue { color: #0284c7; }
        .stat .value.text-green { color: #16a34a; }
        .stat .note { font-size: 0.75rem; color: #64748b; margin-top: 0.25rem; }
        .section-title { font-size: 1.125rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem; }
        .table-wrap { background: #ffffff; border-radius: 0.75rem; border: 1px solid #e2e8f0; overflow-x: auto; }
        table { width: 100%; text-align: left; border-collapse: collapse; font-size: 0.875rem; }
        th { background: #f8fafc; padding: 0.75rem 1rem; text-transform: uppercase; font-size: 0.75rem; color: #475569; font-weight: 600; border-bottom: 1px solid #e2e8f0; }
        td { padding: 0.875rem 1rem; border-bottom: 1px solid #f1f5f9; color: #334155; }
        td.code { font-family: monospace; font-weight: 700; color: #0f172a; }
        .badge { padding: 0.25rem 0.625rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; display: inline-block; }
        .badge.menunggu { background: #fef3c7; color: #92400e; }
        .badge.diproses { background: #e0f2fe; color: #075985; }
        .badge.selesai { background: #dcfce7; color: #166534; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen text-gray-800 font-sans antialiased p-6">
    <div class="max-w-6xl mx-auto">
        @yield('content')
    </div>
</body>
</html>
