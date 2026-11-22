<x-layouts.customer title="Daftar - Pembersih.id">
    <div class="max-w-2xl mx-auto my-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">Daftar sebagai apa?</h2>
        <p class="text-sm text-gray-600 mb-8 text-center">Pilih jenis akun yang sesuai kebutuhan Anda.</p>

        <div class="grid gap-4 sm:grid-cols-2">
            <a href="{{ route('register.customer') }}" class="block bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:border-blue-500 transition">
                <h3 class="font-bold text-lg text-gray-900">Pelanggan</h3>
                <p class="text-sm text-gray-600 mt-1">Saya ingin memesan jasa pembersih.</p>
            </a>
            <a href="{{ route('register.client') }}" class="block bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:border-blue-500 transition">
                <h3 class="font-bold text-lg text-gray-900">Mitra Klien</h3>
                <p class="text-sm text-gray-600 mt-1">Saya penyedia jasa pembersih. Pendaftaran akan diverifikasi admin.</p>
            </a>
        </div>

        <p class="text-sm text-gray-600 mt-6 text-center">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Masuk</a>
        </p>
    </div>
</x-layouts.customer>