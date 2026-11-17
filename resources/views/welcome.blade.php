@php
    $img = function ($n) {
        foreach (['png', 'jpg', 'jpeg', 'webp'] as $e) {
            if (file_exists(public_path("images/landing/$n.$e"))) return asset("images/landing/$n.$e");
        }
        return null;
    };
    $layanan = [
        ['ruangan',   '🛋️', 'Ruangan',   'Layanan kebersihan untuk berbagai jenis ruang: rumah, kamar, dan ruang kerja.', 'from-amber-100 to-orange-200'],
        ['bangunan',  '🏢', 'Bangunan',  'Pembersihan area luas seperti gedung, fasad kaca, dan lobi perkantoran.',      'from-sky-200 to-blue-300'],
        ['kendaraan', '🚗', 'Kendaraan', 'Cuci dan perawatan mobil atau motor langsung di lokasi Anda.',                  'from-stone-200 to-stone-400'],
        ['lainnya',   '🌿', 'Lainnya',   'Butuh layanan lain? Ketik sendiri kebutuhan Anda dan mitra akan membantu.',    'from-green-200 to-emerald-300'],
    ];
    $alasan = [
        ['Profesional & Terpercaya', 'Layanan dikerjakan penyedia jasa yang sudah terverifikasi.'],
        ['Pemesanan Mudah',          'Pesan layanan kebersihan dengan beberapa langkah saja.'],
        ['Berbagai Pilihan Layanan', 'Dari ruangan, bangunan, hingga kendaraan tersedia di satu tempat.'],
        ['Sesuai Kebutuhan',         'Pilih layanan dan jadwal sesuai kebutuhan Anda.'],
        ['Mudah Dihubungi',          'Hubungi mitra langsung lewat platform kapan saja.'],
    ];
    $tenant = [
        ['CleanPro',  '🏠', 'Rp 150.000', '4.8', '1.2K'],
        ['BersihYuk', '💧', 'Rp 130.000', '4.8', '832'],
        ['AutoClean', '🚗', 'Rp 100.000', '4.7', '645'],
    ];
@endphp
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanerShip - Platform Jasa Kebersihan Multi-Klien</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 antialiased" style="font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif;">

    <!-- Navbar -->
    <header class="bg-white sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="text-xl font-extrabold text-cyan-500">Cleaner<span class="text-gray-900">Ship</span></a>
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-gray-900">
                <a href="#beranda" class="hover:text-indigo-600">Beranda</a>
                <a href="#layanan" class="hover:text-indigo-600">Layanan</a>
                <a href="#tentang" class="hover:text-indigo-600">Tentang</a>
                <a href="#bantuan" class="hover:text-indigo-600">Bantuan</a>
            </nav>
            <a href="{{ route('login') }}" class="bg-indigo-700 hover:bg-indigo-800 text-white text-sm font-bold px-5 py-2 rounded-md">Login</a>
        </div>
    </header>

    <!-- Hero -->
    <section id="beranda" class="bg-indigo-100">
        <div class="max-w-6xl mx-auto px-6 py-14 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="space-y-4">
                <h1 class="text-3xl sm:text-4xl font-bold leading-tight text-gray-900">Jasa Kebersihan Profesional,<br>Pesan Lebih Mudah</h1>
                <p class="text-sm text-gray-700 max-w-md">Temukan dan pesan jasa pembersih terbaik untuk berbagai kebutuhan: rumah, bangunan, kendaraan, dan lainnya.</p>
                <a href="{{ route('login') }}" class="inline-block bg-indigo-700 hover:bg-indigo-800 text-white text-sm font-bold px-5 py-2.5 rounded-md">Pesan Sekarang</a>
            </div>
            <div class="flex justify-center">
                @if ($img('hero'))
                    <img src="{{ $img('hero') }}" alt="Perlengkapan kebersihan" class="max-h-64 object-contain">
                @else
                    <div class="w-64 h-56 rounded-3xl bg-white/60 flex items-center justify-center text-7xl">🪣🧽</div>
                @endif
            </div>
        </div>
    </section>

    <!-- Layanan yang kami miliki -->
    <section id="layanan" class="py-14 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="font-serif italic text-3xl text-gray-900">Layanan yang kami miliki</h2>
            <p class="mt-3 text-sm text-gray-700 max-w-2xl mx-auto">CleanerShip menyediakan berbagai pilihan layanan yang dapat disesuaikan dengan kebutuhan pelanggan. Mulai dari membersihkan ruangan, bangunan, kendaraan, hingga kebutuhan kebersihan lainnya.</p>

            <div class="mt-8 grid grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($layanan as [$slug, $icon, $judul, $desk, $grad])
                    <a href="{{ route('login') }}" class="bg-gray-100 rounded-md overflow-hidden text-center block hover:shadow-md transition">
                        @if ($img($slug))
                            <img src="{{ $img($slug) }}" alt="{{ $judul }}" class="w-full h-32 object-cover">
                        @else
                            <div class="w-full h-32 bg-gradient-to-br {{ $grad }} flex items-center justify-center text-5xl">{{ $icon }}</div>
                        @endif
                        <div class="p-3 space-y-1">
                            <h3 class="font-bold text-sm text-gray-900">{{ $judul }}</h3>
                            <p class="text-[11px] text-gray-600 leading-snug">{{ $desk }}</p>
                            <span class="inline-block pt-1 text-[11px] font-semibold text-gray-900">Lihat detail</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Mengapa memilih -->
    <section id="tentang" class="bg-sky-100 py-14 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900">Mengapa Memilih Layanan Kami?<br>Solusi kebersihan yang mudah, praktis, dan terpercaya.</h2>

            <div class="mt-10 grid grid-cols-2 lg:grid-cols-5 gap-4 items-start">
                @foreach ($alasan as $i => [$judul, $desk])
                    <div class="bg-white rounded-md border-t-4 border-sky-400 shadow p-4 text-center {{ $i % 2 ? 'lg:mt-10' : '' }}">
                        <h3 class="font-bold text-sm text-gray-900">{{ $judul }}</h3>
                        <p class="mt-2 text-[11px] text-gray-600 leading-snug">{{ $desk }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Tenant populer -->
    <section class="py-14 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-end justify-between">
                <h2 class="text-2xl sm:text-3xl font-black tracking-wide text-gray-900">Tenant Populer</h2>
                <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Lihat semua &rsaquo;</a>
            </div>

            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach ($tenant as [$nama, $ikon, $harga, $rating, $ulasan])
                    <div class="border border-gray-200 rounded-lg p-6 text-center space-y-3">
                        @if ($img(strtolower($nama)))
                            <img src="{{ $img(strtolower($nama)) }}" alt="{{ $nama }}" class="h-20 mx-auto object-contain">
                        @else
                            <div class="h-20 flex flex-col items-center justify-center">
                                <span class="text-4xl">{{ $ikon }}</span>
                                <span class="text-sm font-extrabold text-sky-600">{{ $nama }}</span>
                            </div>
                        @endif
                        <p class="font-medium text-gray-900">Mulai {{ $harga }}</p>
                        <p class="text-sm"><span class="text-yellow-400">★</span> <span class="font-bold">{{ $rating }}</span> <span class="text-gray-400">({{ $ulasan }})</span></p>
                        <a href="{{ route('login') }}" class="block border-t border-gray-200 pt-3 text-sm text-gray-600 hover:text-indigo-600">Lihat detail</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="bantuan" class="bg-indigo-100 pt-10 pb-6 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-5 gap-8 text-sm">
            <div class="col-span-2 md:col-span-1 space-y-2">
                <p class="text-xl font-extrabold text-cyan-500">Cleaner<span class="text-gray-900">Ship</span></p>
                <p class="text-xs text-gray-700">Solusi mudah untuk memenuhi kebutuhan kebersihan Anda.</p>
            </div>
            <div class="space-y-2">
                <p class="font-bold text-gray-900">Layanan</p>
                <a href="{{ route('login') }}" class="block text-xs text-gray-700 hover:underline">Ruangan</a>
                <a href="{{ route('login') }}" class="block text-xs text-gray-700 hover:underline">Bangunan</a>
                <a href="{{ route('login') }}" class="block text-xs text-gray-700 hover:underline">Kendaraan</a>
                <a href="{{ route('login') }}" class="block text-xs text-gray-700 hover:underline">Lainnya</a>
            </div>
            <div class="space-y-2">
                <p class="font-bold text-gray-900">Tentang</p>
                <a href="#tentang" class="block text-xs text-gray-700 hover:underline">Tentang Kami</a>
                <a href="#tentang" class="block text-xs text-gray-700 hover:underline">Cara Kerja</a>
                <a href="#" class="block text-xs text-gray-700 hover:underline">Mitra Kami</a>
            </div>
            <div class="space-y-2">
                <p class="font-bold text-gray-900">Bantuan</p>
                <a href="#" class="block text-xs text-gray-700 hover:underline">Pusat Bantuan</a>
                <a href="#" class="block text-xs text-gray-700 hover:underline">FAQ</a>
                <a href="#" class="block text-xs text-gray-700 hover:underline">Hubungi Kami</a>
            </div>
            <div class="space-y-2">
                <p class="font-bold text-gray-900">Ikuti CleanerShip</p>
                <p class="text-xs text-gray-700">Dapatkan informasi terbaru dan promo menarik dari kami.</p>
            </div>
        </div>
        <p class="mt-8 text-center text-[11px] text-gray-500">&copy; {{ date('Y') }} CleanerShip. All rights reserved.</p>
    </footer>
</body>
</html>
