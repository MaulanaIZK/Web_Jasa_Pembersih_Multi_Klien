<x-layouts.client title="Ubah Layanan">
    <div class="max-w-xl bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <form method="POST" action="{{ route('client.services.update', ['service' => $service]) }}"
              onsubmit="return confirm('Apakah Anda yakin mengubah layanan ini?')">
            @csrf
            @method('PUT')
            @include('catalog::client._form')
            <div class="mt-6 flex gap-2">
                <button class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg">Simpan</button>
                <a href="{{ route('client.services.index') }}" class="px-4 py-2 text-sm rounded-lg border border-gray-300 hover:bg-gray-50">Kembali</a>
            </div>
        </form>
    </div>
</x-layouts.client>