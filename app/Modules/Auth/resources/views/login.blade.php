<x-layouts.customer title="Masuk - Pembersih.id">
    <div class="max-w-md mx-auto my-12 bg-white p-8 rounded-xl shadow-sm border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Masuk ke Akun Anda</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 p-3 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center justify-between text-sm mb-2">
                <label class="flex items-center gap-2 text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600"> Ingat Saya
                </label>
            </div>

            <!-- TOMBOL MASUK UTAMA -->
            <div class="pt-2 text-center">
                <button type="submit" 
                        style="background-color: #2563eb; color: #ffffff; width: 100%; padding: 10px 16px; border-radius: 8px; font-weight: 600; border: none; cursor: pointer;"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-lg text-base shadow transition cursor-pointer">
                    Masuk
                </button>
            </div>
        </form>

        <!-- TAUTAN ALIH KE PENDAFTARAN -->
        <div class="mt-6 pt-6 border-t border-gray-100 text-center space-y-3">
            <p class="text-sm text-gray-600">Belum memiliki akun pelanggan?</p>
            <a href="{{ route('register') }}" 
               style="display: block; width: 100%; padding: 8px 16px; border: 1px solid #2563eb; color: #2563eb; border-radius: 8px; text-decoration: none; font-weight: 500; text-align: center;"
               class="w-full inline-block px-4 py-2 border border-blue-600 text-blue-600 hover:bg-blue-50 rounded-lg text-sm font-medium transition text-center">
                Daftar Akun Pelanggan
            </a>
            <p class="text-xs text-gray-400 mt-2">
                *Pendaftaran Klien / Penyedia Jasa dilakukan secara manual oleh Admin Platform.
            </p>
        </div>
    </div>
</x-layouts.customer>
