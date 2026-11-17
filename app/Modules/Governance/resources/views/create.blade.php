<x-layouts.admin title="Tambah Mitra Klien">
  @php
    $kelas = 'w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400';
    $akun = [
      ['name', 'Nama Pemilik / Penanggung Jawab', 'text'],
      ['email', 'Email Login Mitra', 'email'],
      ['password', 'Kata Sandi Awal (min. 8 karakter)', 'password'],
      ['password_confirmation', 'Ulangi Kata Sandi', 'password'],
    ];
    $usaha = [
      ['business_name', 'Nama Usaha', 'text'],
      ['phone', 'Nomor Telepon', 'text'],
      ['service_area', 'Area Layanan', 'text'],
      ['ktp_number', 'Nomor KTP (opsional)', 'text'],
    ];
    $bank = [
      ['bank_name', 'Nama Bank', 'text'],
      ['bank_account_number', 'Nomor Rekening', 'text'],
      ['bank_account_holder', 'Nama Pemilik Rekening', 'text'],
    ];
  @endphp

  <div class="space-y-6 max-w-3xl">
    <div>
      <a href="{{ route('admin.clients.index') }}" class="text-sm text-sky-600 hover:underline">&larr; Kembali ke daftar mitra</a>
      <h1 class="text-2xl font-bold text-gray-900 mt-2">Tambah Mitra Klien</h1>
      <p class="text-sm text-gray-500 mt-1">Isi data mitra yang sudah menandatangani kontrak. Mitra langsung berstatus aktif dan dapat masuk memakai email dan kata sandi di bawah.</p>
    </div>

    @if ($errors->any())
      <div class="rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3">Periksa kembali isian yang ditandai merah.</div>
    @endif

    <form method="POST" action="{{ route('admin.clients.store') }}" class="space-y-6">
      @csrf

      <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-4">
        <h2 class="font-bold text-gray-800">Akun Login Mitra</h2>
        @foreach ($akun as [$nama, $label, $tipe])
          <div>
            <label for="{{ $nama }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
            <input id="{{ $nama }}" name="{{ $nama }}" type="{{ $tipe }}" value="{{ $tipe === 'password' ? '' : old($nama) }}" class="{{ $kelas }}" required>
            @if ($nama !== 'password_confirmation')
              @error($nama)<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            @endif
          </div>
        @endforeach
      </div>

      <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-4">
        <h2 class="font-bold text-gray-800">Data Usaha</h2>
        @foreach ($usaha as [$nama, $label, $tipe])
          <div>
            <label for="{{ $nama }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
            <input id="{{ $nama }}" name="{{ $nama }}" type="{{ $tipe }}" value="{{ old($nama) }}" class="{{ $kelas }}" {{ $nama === 'ktp_number' ? '' : 'required' }}>
            @error($nama)<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
          </div>
        @endforeach
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Usaha (opsional)</label>
          <textarea id="description" name="description" rows="3" class="{{ $kelas }}">{{ old('description') }}</textarea>
          @error('description')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
      </div>

      <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-4">
        <h2 class="font-bold text-gray-800">Rekening Pencairan</h2>
        @foreach ($bank as [$nama, $label, $tipe])
          <div>
            <label for="{{ $nama }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
            <input id="{{ $nama }}" name="{{ $nama }}" type="{{ $tipe }}" value="{{ old($nama) }}" class="{{ $kelas }}" required>
            @error($nama)<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
          </div>
        @endforeach
      </div>

      <div class="flex items-center gap-3">
        <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white text-sm font-bold px-5 py-2.5 rounded-lg">Daftarkan Mitra</button>
        <a href="{{ route('admin.clients.index') }}" class="text-sm font-semibold text-gray-600 hover:underline">Batal</a>
      </div>
    </form>
  </div>
</x-layouts.admin>