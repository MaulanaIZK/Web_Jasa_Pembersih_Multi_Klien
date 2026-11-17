@php
    $services = $services ?? \App\Models\Service::where('is_active', true)->with('client')->latest()->get();
    $categories = $services->pluck('category')->filter()->unique()->values();
    $hasDetail = \Illuminate\Support\Facades\Route::has('customer.services.show');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Layanan - CleanerShip</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 antialiased">

    <!-- Header -->
    <header class="border-b border-gray-200 bg-white sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between gap-6">
            <a href="/" class="text-xl font-black text-blue-600 whitespace-nowrap">Cleaner<span class="text-gray-900">Ship</span></a>
            <input id="q" type="search" placeholder="Cari layanan, lokasi, atau mitra..."
                   class="hidden sm:block flex-1 max-w-md border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            @auth
                <a href="{{ route('dashboard') }}" class="w-9 h-9 rounded-full bg-blue-500 text-white flex items-center justify-center text-sm font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-bold text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg whitespace-nowrap">Masuk</a>
            @endauth
        </div>
    </header>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-gray-900 via-blue-900 to-blue-700 text-white">
        <div class="max-w-6xl mx-auto px-6 py-14">
            <h1 class="font-serif text-4xl sm:text-5xl font-black tracking-tight">Semua Layanan</h1>
            <p class="mt-2 text-sm sm:text-base text-blue-100">Pilih layanan sesuai dengan kebutuhan Anda.</p>
        </div>
    </section>

    <!-- Ikon kategori -->
    <section class="border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-6 py-6 flex justify-between sm:justify-center sm:gap-16 overflow-x-auto gap-6">
            @foreach ([['rumah','🏠','Rumah'],['kantor','🏢','Kantor'],['mobil','🚗','Mobil'],['gudang','🏭','Gudang'],['lainnya','⋯','Lainnya']] as [$key,$icon,$label])
                <button type="button" data-type="{{ $key }}" class="type-btn flex flex-col items-center gap-1 text-sm font-bold text-gray-700 hover:text-blue-600 min-w-[56px]">
                    <span class="text-3xl text-blue-500">{{ $icon }}</span>
                    <span>{{ $label }}</span>
                </button>
            @endforeach
        </div>
    </section>

    <!-- Konten -->
    <main class="max-w-6xl mx-auto px-6 py-8 grid grid-cols-1 lg:grid-cols-[220px_1fr] gap-8">

        <!-- Sidebar filter -->
        <aside class="space-y-5 text-sm">
            <h2 class="font-bold text-gray-900">Filter</h2>

            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 space-y-2">
                <p class="font-bold text-gray-900">Harga</p>
                <label class="flex items-center gap-2"><input type="checkbox" class="price-f" value="a"> &lt; Rp 150.000</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="price-f" value="b"> Rp 150.000 - Rp 250.000</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="price-f" value="c"> Rp 250.000 - Rp 500.000</label>
                <label class="flex items-center gap-2"><input type="checkbox" class="price-f" value="d"> &gt; Rp 500.000</label>
            </div>

            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 space-y-2">
                <p class="font-bold text-gray-900">Kategori</p>
                <select id="cat" class="w-full border border-gray-300 rounded-md px-2 py-1.5 text-sm bg-white">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ \Illuminate\Support\Str::lower($cat) }}">{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
        </aside>

        <!-- Daftar layanan -->
        <section>
            <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
                <p class="font-bold text-gray-900"><span id="count">{{ $services->count() }}</span> Layanan Ditemukan</p>
                <select id="sort" class="border border-gray-300 rounded-md px-3 py-2 text-sm bg-white">
                    <option value="new">Urutkan: Terbaru</option>
                    <option value="low">Urutkan: Harga Terendah</option>
                    <option value="high">Urutkan: Harga Tertinggi</option>
                </select>
            </div>

            <div id="list" class="space-y-4">
                @foreach ($services as $i => $service)
                    @php
                        $attrs  = $service->getAttributes();
                        $img    = $attrs['image_url'] ?? null;
                        $rating = $attrs['rating'] ?? null;
                        $mitra  = optional($service->client)->name ?: 'Mitra';
                        $detail = $hasDetail ? route('customer.services.show', $service) : route('login');
                    @endphp
                    <article class="svc bg-sky-500 rounded-xl p-3 flex gap-4 items-stretch"
                             data-price="{{ (int) $service->base_price }}"
                             data-order="{{ $i }}"
                             data-category="{{ \Illuminate\Support\Str::lower($service->category) }}"
                             data-search="{{ \Illuminate\Support\Str::lower($service->name.' '.$service->category.' '.$mitra) }}">
                        @if ($img)
                            <img src="{{ $img }}" alt="{{ $service->name }}" class="w-28 h-28 sm:w-32 sm:h-28 rounded-lg object-cover shrink-0">
                        @else
                            <div class="w-28 h-28 sm:w-32 sm:h-28 rounded-lg bg-gradient-to-br from-sky-200 to-blue-300 flex items-center justify-center text-4xl shrink-0">🧹</div>
                        @endif
                        <div class="flex-1 min-w-0 flex flex-col justify-between text-white">
                            <div>
                                <p class="font-extrabold text-sm sm:text-base truncate">{{ $mitra }}</p>
                                <p class="text-xs sm:text-sm font-semibold truncate">{{ $service->name }}</p>
                                <p class="text-xs text-sky-100 mt-0.5">{{ $service->category }}</p>
                                @if ($rating)
                                    <p class="text-xs mt-1">⭐ {{ $rating }}</p>
                                @endif
                            </div>
                            <p class="text-xs sm:text-sm">Mulai dari Rp {{ number_format($service->base_price, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex items-end">
                            <a href="{{ $detail }}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold px-5 py-2 rounded-md">Detail</a>
                        </div>
                    </article>
                @endforeach
            </div>

            <p id="empty" class="hidden text-center text-sm text-gray-500 py-12">Tidak ada layanan yang cocok dengan filter.</p>
        </section>
    </main>

    <script>
        const list = document.getElementById('list');
        const cards = [...document.querySelectorAll('.svc')];
        const ranges = { a: [0, 150000], b: [150000, 250000], c: [250000, 500000], d: [500000, Infinity] };
        const kw = { rumah: ['rumah', 'home'], kantor: ['kantor', 'office'], mobil: ['mobil', 'car'], gudang: ['gudang', 'warehouse'] };
        let type = '';

        const matchType = (text, t) => t === 'lainnya'
            ? !Object.values(kw).flat().some(k => text.includes(k))
            : kw[t].some(k => text.includes(k));

        function apply() {
            const q = document.getElementById('q').value.trim().toLowerCase();
            const cat = document.getElementById('cat').value;
            const prices = [...document.querySelectorAll('.price-f:checked')].map(c => ranges[c.value]);
            const sort = document.getElementById('sort').value;

            let shown = cards.filter(c => {
                const p = +c.dataset.price, s = c.dataset.search;
                if (q && !s.includes(q)) return false;
                if (cat && c.dataset.category !== cat) return false;
                if (type && !matchType(s, type)) return false;
                if (prices.length && !prices.some(([lo, hi]) => p >= lo && p < hi)) return false;
                return true;
            });

            shown.sort((a, b) => sort === 'low' ? a.dataset.price - b.dataset.price
                              : sort === 'high' ? b.dataset.price - a.dataset.price
                              : a.dataset.order - b.dataset.order);

            cards.forEach(c => c.classList.add('hidden'));
            shown.forEach(c => { c.classList.remove('hidden'); list.appendChild(c); });
            document.getElementById('count').textContent = shown.length;
            document.getElementById('empty').classList.toggle('hidden', shown.length > 0);
        }

        document.querySelectorAll('.type-btn').forEach(b => b.addEventListener('click', () => {
            type = (type === b.dataset.type) ? '' : b.dataset.type;
            document.querySelectorAll('.type-btn').forEach(x => x.classList.toggle('text-blue-600', x.dataset.type === type));
            apply();
        }));
        ['q', 'cat', 'sort'].forEach(id => document.getElementById(id).addEventListener('input', apply));
        document.querySelectorAll('.price-f').forEach(c => c.addEventListener('change', apply));
    </script>
</body>
</html>