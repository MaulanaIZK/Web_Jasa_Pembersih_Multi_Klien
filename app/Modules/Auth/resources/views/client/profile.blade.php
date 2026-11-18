<x-layouts.client title="Profil Bisnis">
    @if (session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('client.profile.update') }}" enctype="multipart/form-data"
          class="flex flex-col md:flex-row gap-8 max-w-3xl">
        @csrf
        @method('PUT')

        {{-- Kartu foto --}}
        <div class="w-44 shrink-0 self-start bg-white rounded-xl shadow-sm border border-gray-200 p-4 text-center">
            <div class="w-28 h-28 mx-auto rounded-full bg-gray-300 overflow-hidden flex items-end justify-center">
                <img id="avatar-preview" src="{{ $client->avatarUrl() }}" alt="Foto profil"
                     class="w-full h-full object-cover {{ $client->avatarUrl() ? '' : 'hidden' }}">
                <svg id="avatar-placeholder" viewBox="0 0 24 24" fill="currentColor"
                     class="w-24 h-24 text-gray-100 {{ $client->avatarUrl() ? 'hidden' : '' }}">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 22c0-4.4 3.6-8 8-8s8 3.6 8 8z"/>
                </svg>
            </div>
            <label for="avatar"
                   class="mt-4 block cursor-pointer rounded-md border border-sky-400 text-sky-600 text-xs font-semibold py-1 hover:bg-sky-50">
                Ubah Foto
            </label>
            <input id="avatar" type="file" name="avatar" accept="image/png,image/jpeg,image/webp" class="hidden">
            <p class="mt-2 text-[11px] text-gray-500">JPG, PNG, atau WebP. Maks. 2 MB.</p>
            @error('avatar') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Kolom data --}}
        <div class="flex-1 space-y-5">
            <div>
                <label class="block text-sm font-semibold mb-1">Nama Bisnis</label>
                <input type="text" name="business_name" value="{{ old('business_name', $client->business_name) }}"
                       class="w-full rounded-lg border border-gray-400 px-3 py-2 text-sm">
                @error('business_name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Nomor HP Bisnis</label>
                <input type="text" name="phone" value="{{ old('phone', $client->phone) }}"
                       class="w-full rounded-lg border border-gray-400 px-3 py-2 text-sm">
                @error('phone') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Email Bisnis</label>
                <input type="email" name="email" value="{{ old('email', $client->user->email) }}"
                       class="w-full rounded-lg border border-gray-400 px-3 py-2 text-sm">
                @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Lokasi Bisnis</label>
                <input type="text" name="service_area" value="{{ old('service_area', $client->service_area) }}"
                       class="w-full rounded-lg border border-gray-400 px-3 py-2 text-sm">
                @error('service_area') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="mt-4 bg-indigo-700 hover:bg-indigo-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg">
                Simpan Perubahan
            </button>
        </div>
    </form>

    <script>
        // Pratinjau foto sebelum disimpan
        document.getElementById('avatar').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (! file) return;
            const img = document.getElementById('avatar-preview');
            img.src = URL.createObjectURL(file);
            img.classList.remove('hidden');
            document.getElementById('avatar-placeholder').classList.add('hidden');
        });
    </script>
</x-layouts.client>