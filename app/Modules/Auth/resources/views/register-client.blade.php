<x-layouts.customer title="Daftar Mitra Penyedia Jasa - Pembersih.id">
    <div class="max-w-lg mx-auto my-8 bg-white p-8 rounded-xl shadow-sm border border-gray-200">
        <!-- Tab Navigasi Atas -->
        <div class="flex border-b border-gray-200 mb-6 text-sm font-medium text-center">
            <a href="{{ route('login') }}" class="w-1/3 pb-3 border-b-2 border-transparent text-gray-500 hover:text-gray-700">Masuk</a>
            <a href="{{ route('register.customer') }}" class="w-1/3 pb-3 border-b-2 border-transparent text-gray-500 hover:text-gray-700">Pelanggan</a>
            <span class="w-1/3 pb-3 border-b-2 border-blue-600 text-blue-600 font-bold">Mitra Klien</span>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">Pendaftaran Mitra Klien</h2>
        <p class="text-sm text-gray-600 mb-6 text-center">Bergabunglah sebagai penyedia jasa pembersih profesional</p>

        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 p-3 rounded-lg text-sm">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.client') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik / Penanggung Jawab</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Usaha / Brand Pembersih</label>
                <input type="text" name="business_name" value="{{ old('business_name') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Usaha</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">No. HP / WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Cakupan Wilayah Layanan</label>
                <input type="text" name="service_area" value="{{ old('service_area') }}" placeholder="Contoh: Jakarta Selatan, Depok" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
            </div>
            <div class="grid grid-cols-3 gap-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bank</label>
                    <input type="text" name="bank_name" placeholder="BCA / Mandiri" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">No. Rekening</label>
                    <input type="text" name="bank_account_number" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik Rekening</label>
                <input type="text" name="bank_account_holder" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg transition">Daftarkan Mitra Klien</button>
        </form>

        <!-- Tombol Alih Halaman Bawah -->
        <div class="mt-6 pt-6 border-t border-gray-100 text-center space-y-3">
            <p class="text-sm text-gray-600">Sudah punya akun mitra atau mendaftar sebagai pelanggan?</p>
            <div class="flex flex-col sm:flex-row gap-2 justify-center">
                <a href="{{ route('login') }}" class="w-full inline-flex justify-center items-center px-4 py-2 border border-blue-600 text-blue-600 hover:bg-blue-50 rounded-lg text-sm font-medium transition">
                    Sudah Punya Akun (Masuk)
                </a>
                <a href="{{ route('register.customer') }}" class="w-full inline-flex justify-center items-center px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg text-sm font-medium transition">
                    Daftar Sebagai Pelanggan
                </a>
            </div>
        </div>
    </div>
</x-layouts.customer>
