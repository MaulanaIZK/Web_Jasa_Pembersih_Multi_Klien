<x-layouts.mitra title="Tambah Layanan">
    <h1 class="mp-title">Tambah Layanan</h1>
    <p class="mp-sub" style="margin-bottom:24px">Isi data layanan baru yang akan tampil di katalog pelanggan.</p>

    <div class="mp-card">
        <form method="POST" action="{{ route('client.services.store') }}">
            @csrf
            @include('catalog::client._form')
            <div class="mp-form-aksi">
                <button class="mp-btn">Simpan</button>
                <a href="{{ route('client.services.index') }}" class="mp-btn sekunder">Kembali</a>
            </div>
        </form>
    </div>
</x-layouts.mitra>