@props(['title' => 'Dasbor Mitra Klien'])
@php
    $mitra = auth()->user()?->client;
    $menu = [
        ['Dashboard', route('client.dashboard'), 'client.dashboard', '&#127968;'],
        ['Pesanan', $mitra ? route('client.orders.index', $mitra) : '#', 'client.orders.*', '&#129534;'],
        ['Laporan', $mitra ? route('client.reports.index', $mitra) : '#', 'client.reports.*', '&#128203;'],
        ['Layanan', $mitra ? route('client.services.index', $mitra) : '#', 'client.services.*', '&#129529;'],
        ['Profile', Route::has('profile.edit') ? route('profile.edit') : '#', 'profile.*', '&#128100;'],
        ['Pengaturan', '#', 'pengaturan.*', '&#9881;'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - CleanerShip</title>
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Poppins',system-ui,-apple-system,'Segoe UI',sans-serif;background:#fff;color:#111}
        .mp-shell{display:flex;min-height:100vh}
        .mp-side{width:240px;flex:none;background:#25005e;color:#fff;display:flex;flex-direction:column;padding:20px 0}
        .mp-brand{padding:0 20px 18px;margin-bottom:12px;border-bottom:1px solid rgba(255,255,255,.15);font-size:20px;font-weight:700}
        .mp-brand b{color:#22c3ff}
        .mp-nav{flex:1;display:flex;flex-direction:column;gap:2px;padding:0 10px}
        .mp-link{display:flex;align-items:center;gap:12px;width:100%;padding:10px 12px;border:0;border-radius:8px;background:none;color:#e9e2ff;font:inherit;font-size:14px;text-align:left;text-decoration:none;cursor:pointer}
        .mp-link:hover,.mp-link.aktif{background:rgba(255,255,255,.14);color:#fff}
        .mp-link span{width:20px;text-align:center}
        .mp-foot{padding:0 10px}
        .mp-main{flex:1;min-width:0;padding:32px 40px}
        .mp-title{font-size:30px;font-weight:700}
        .mp-sub{margin-top:4px;font-size:16px;color:#6b7280}
        .mp-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin:28px 0 32px}
        .mp-stat{padding:16px 20px;border-radius:12px;background:#fff;box-shadow:0 2px 10px rgba(0,0,0,.12)}
        .mp-stat .l{font-size:13px;color:#374151}
        .mp-stat .v{margin-top:6px;font-size:24px;font-weight:700}
        .mp-h2{margin-bottom:12px;font-size:18px;font-weight:700}
        .mp-table{width:100%;border-collapse:collapse;border-radius:10px;overflow:hidden;box-shadow:0 2px 10px rgba(0,0,0,.12);font-size:14px}
        .mp-table th{padding:12px 16px;background:#ececec;text-align:left;font-weight:600}
        .mp-table td{padding:12px 16px;border-top:1px solid #e5e7eb}
        .mp-badge{display:inline-block;padding:3px 12px;border-radius:999px;font-size:12px;font-weight:600}
        .mp-badge.menunggu{background:#fde7b0;color:#8a5a00}
        .mp-badge.diproses{background:#d7ecff;color:#0a5a99}
        .mp-badge.selesai{background:#d4f5df;color:#1a7a3e}
        @@media(max-width:768px){.mp-shell{flex-direction:column}.mp-side{width:100%}.mp-main{padding:20px}.mp-stats{grid-template-columns:1fr}}
    </style>
</head>
<body>
<div class="mp-shell">
    <aside class="mp-side">
        <div class="mp-brand">Cleaner<b>Ship</b></div>
        <nav class="mp-nav">
            @foreach ($menu as [$label, $url, $pola, $ikon])
                <a href="{{ $url }}" class="mp-link {{ request()->routeIs($pola) ? 'aktif' : '' }}"><span>{!! $ikon !!}</span>{{ $label }}</a>
            @endforeach
        </nav>
        <div class="mp-foot">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="mp-link"><span>&#128682;</span>Keluar</button>
            </form>
        </div>
    </aside>

    <div class="mp-main">
        {{ $slot }}
    </div>
</div>
</body>
</html>