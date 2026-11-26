<x-layouts.mitra title="Ubah Layanan">
    <h1 class="mp-title">Ubah Layanan</h1>
    <p class="mp-sub" style="margin-bottom:24px">Perubahan langsung berlaku pada katalog pelanggan.</p>

    <div class="mp-card">
        <form method="POST" action="{{ route('client.services.update', ['service' => $service]) }}"
              onsubmit="return confirm('Apakah Anda yakin mengubah layanan ini?')">
            @csrf
            @method('PUT')
            @include('catalog::client._form')
            <div class="mp-form-aksi">
                <button class="mp-btn">Simpan</button>
                <a href="{{ route('client.services.index') }}" class="mp-btn sekunder">Kembali</a>
            </div>
        </form>
    </div>
</x-layouts.mitra>