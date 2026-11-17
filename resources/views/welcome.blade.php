<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanerShip - Platform Jasa Kebersihan Multi-Klien</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">

    <!-- Header Navbar Lanskap Desktop -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-8 h-20 flex items-center justify-between">
            <div class="flex items-center gap-10">
                <a href="/" class="text-2xl font-black text-blue-500 tracking-tight flex items-center gap-2">
                    <span class="bg-blue-500 text-white p-2 rounded-lg text-base">✨</span>
                    <span>Cleaner<span class="text-gray-900">Ship</span></span>
                </a>
                <nav class="hidden lg:flex items-center gap-8 text-sm font-bold text-gray-600">
                    <a href="#beranda" class="hover:text-blue-600 transition">Beranda</a>
                    <a href="#keunggulan" class="hover:text-blue-600 transition">Keunggulan</a>
                    <a href="#layanan" class="hover:text-blue-600 transition">Katalog Layanan</a>
                    <a href="#cara-kerja" class="hover:text-blue-600 transition">Cara Kerja</a>
                    <a href="#gabung-mitra" class="hover:text-blue-600 transition">Jadi Mitra</a>
                </nav>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700 hover:text-blue-600 px-4 py-2.5 transition">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="text-sm font-bold text-white bg-blue-500 hover:bg-blue-600 px-5 py-2.5 rounded-xl shadow-md transition">
                    Daftar Akun
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section Lanskap -->
    <section id="beranda" class="bg-gradient-to-br from-blue-900 via-blue-800 to-gray-900 text-white py-20 px-8 relative">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <span class="inline-block bg-blue-500/20 text-blue-300 border border-blue-400/30 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider">
                    Pusat Informasi Jasa Kebersihan Multi-Klien
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black leading-tight tracking-tight">
                    Solusi Bersih Profesional untuk Rumah &amp; Kantor
                </h1>
                <p class="text-blue-100 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Hubungkan kebutuhan pembersihan tempat tinggal dan bisnis Anda dengan mitra penyedia jasa terverifikasi secara langsung. Transparan, bergaransi, dan aman.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4">
                    <a href="#layanan" class="bg-blue-500 hover:bg-blue-400 text-white font-extrabold px-8 py-4 rounded-xl shadow-lg transition text-center text-sm">
                        Jelajahi Katalog Layanan
                    </a>
                    <a href="#gabung-mitra" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold px-8 py-4 rounded-xl transition text-center text-sm">
                        Daftarkan Mitra Jasa Anda
                    </a>
                </div>
            </div>

            <!-- Kartu Info Statistik -->
            <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                <div class="bg-white/10 border border-white/15 p-6 rounded-2xl text-center">
                    <p class="text-3xl font-extrabold text-blue-400">500+</p>
                    <p class="text-xs text-blue-100 mt-1 font-medium uppercase tracking-wider">Mitra Terverifikasi</p>
                </div>
                <div class="bg-white/10 border border-white/15 p-6 rounded-2xl text-center">
                    <p class="text-3xl font-extrabold text-green-400">15.000+</p>
                    <p class="text-xs text-blue-100 mt-1 font-medium uppercase tracking-wider">Pesanan Selesai</p>
                </div>
                <div class="bg-white/10 border border-white/15 p-6 rounded-2xl text-center">
                    <p class="text-3xl font-extrabold text-yellow-400">4.9 ★</p>
                    <p class="text-xs text-blue-100 mt-1 font-medium uppercase tracking-wider">Rating Pelanggan</p>
                </div>
                <div class="bg-white/10 border border-white/15 p-6 rounded-2xl text-center">
                    <p class="text-3xl font-extrabold text-blue-300">100%</p>
                    <p class="text-xs text-blue-100 mt-1 font-medium uppercase tracking-wider">Garansi Bersih</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan Platform -->
    <section id="keunggulan" class="py-16 px-8 max-w-7xl mx-auto w-full">
        <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
            <h2 class="text-3xl font-black text-gray-900">Mengapa Memilih CleanerShip?</h2>
            <p class="text-gray-600 text-sm">Platform kami dirancang untuk memberikan standar kebersihan tinggi dengan kemudahan akses penuh.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center font-bold text-xl">🛡️</div>
                <h3 class="text-xl font-bold text-gray-900">Mitra Terverifikasi &amp; Terlatih</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Seluruh teknisi pembersih melewati tahap audit verifikasi resmi dan jaminan keahlian.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center font-bold text-xl">💳</div>
                <h3 class="text-xl font-bold text-gray-900">Pembayaran QRIS &amp; Split Ledger</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Sistem transaksi aman dengan gateway otomatis tanpa biaya tersembunyi.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center font-bold text-xl">📅</div>
                <h3 class="text-xl font-bold text-gray-900">Pre-Order &amp; Sesi Fleksibel</h3>
                <p class="text-sm text-gray-600 leading-relaxed">Atur jadwal kedatangan tim kebersihan sesuai jam luang Anda dengan alokasi slot pasti.</p>
            </div>
        </div>
    </section>

    <!-- Showcase Layanan Utama Lanskap -->
    <section id="layanan" class="py-16 bg-gray-100 px-8">
        <div class="max-w-7xl mx-auto space-y-12">
            <div class="flex flex-col md:flex-row justify-between items-end gap-4">
                <div>
                    <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Katalog Unggulan</span>
                    <h2 class="text-3xl font-black text-gray-900 mt-1">Pilihan Layanan Kebersihan</h2>
                </div>
                <a href="{{ route('login') }}" class="text-sm font-bold text-blue-600 hover:underline">
                    Lihat Semua Layanan Katalog →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                    <span class="text-3xl">🧹</span>
                    <h3 class="text-lg font-bold text-gray-900">Home Cleaning Standar</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Pembersihan ruangan rumah, penyapuan, pengepelan lantai, &amp; kerapihan area keluarga.</p>
                    <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="font-black text-blue-600 text-base">Rp 150.000</span>
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold px-4 py-2 rounded-lg">Pesan</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                    <span class="text-3xl">🧽</span>
                    <h3 class="text-lg font-bold text-gray-900">Deep Cleaning Disinfeksi</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Pembersihan mendalam kerak toilet, dapur, serta sterilisasi disinfektan ruang.</p>
                    <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="font-black text-blue-600 text-base">Rp 350.000</span>
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold px-4 py-2 rounded-lg">Pesan</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                    <span class="text-3xl">❄️</span>
                    <h3 class="text-lg font-bold text-gray-900">Cuci &amp; Service AC</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Pembersihan filter indoor, cuci kompresor outdoor, &amp; pembersihan saluran air.</p>
                    <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="font-black text-blue-600 text-base">Rp 90.000</span>
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold px-4 py-2 rounded-lg">Pesan</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm space-y-4">
                    <span class="text-3xl">🛋️</span>
                    <h3 class="text-lg font-bold text-gray-900">Cuci Sofa &amp; Kasur</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Vakum kuman tungau, pencucian busa basah, &amp; pengeringan kompresor.</p>
                    <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="font-black text-blue-600 text-base">Rp 250.000</span>
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold px-4 py-2 rounded-lg">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Lanskap -->
    <footer class="bg-white border-t border-gray-200 py-8 mt-auto text-center text-xs text-gray-500">
        <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p>&copy; {{ date('Y') }} CleanerShip Platform - Jasa Kebersihan Multi-Klien.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:underline">Kebijakan Privasi</a>
                <a href="#" class="hover:underline">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </footer>
</body>
</html>
