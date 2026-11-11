<x-layouts.customer title="Daftar Pelanggan - Pembersih.id">
    <div class="max-w-md mx-auto my-8 bg-white p-8 rounded-xl shadow-md border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">Pendaftaran Pelanggan</h2>
        <p class="text-sm text-gray-500 mb-6 text-center">Buat akun untuk mulai memesan layanan pembersih</p>

        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 p-3 rounded-lg text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon / WA</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="08xxxxxxxxxx" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Domisili (Opsional)</label>
                <textarea name="address" rows="2" placeholder="Jl. Raya Kebersihan No. 12" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('address') }}</textarea>
            </div>

            <div>
                <div class="flex justify-between items-center mb-1">
                    <label class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <span class="text-xs text-gray-500 font-normal">Minimal 8 karakter</span>
                </div>
                <input type="password" name="password" required placeholder="Minimal 8 karakter" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" required placeholder="Ulangi kata sandi" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- TOMBOL DAFTAR UTAMA -->
            <div class="pt-2 text-center">
                <button type="submit" 
                        style="background-color: #2563eb; color: #ffffff; width: 100%; padding: 10px 16px; border-radius: 8px; font-weight: 600; border: none; cursor: pointer;"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-lg text-base shadow transition cursor-pointer">
                    Daftar Pelanggan
                </button>
            </div>
        </form>

        <!-- TAUTAN ALIH KE HALAMAN LOGIN -->
        <div class="mt-6 pt-6 border-t border-gray-100 text-center space-y-3">
            <p class="text-sm text-gray-600">Sudah memiliki akun?</p>
            <a href="{{ route('login') }}" 
               style="display: block; width: 100%; padding: 8px 16px; border: 1px solid #2563eb; color: #2563eb; border-radius: 8px; text-decoration: none; font-weight: 500; text-align: center;"
               class="w-full inline-block px-4 py-2 border border-blue-600 text-blue-600 hover:bg-blue-50 rounded-lg text-sm font-medium transition text-center">
                Sudah Punya Akun (Masuk)
            </a>
        </div>
    </div>
</x-layouts.customer>
