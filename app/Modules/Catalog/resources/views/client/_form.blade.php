<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium mb-1">Jenis Layanan</label>
        <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm">
        @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Kategori</label>
        <input type="text" name="category" value="{{ old('category', $service->category ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm">
        @error('category') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea name="description" rows="4"
                  class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm">{{ old('description', $service->description ?? '') }}</textarea>
        @error('description') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Harga Dasar (Rp)</label>
        <input type="number" name="base_price" min="1" value="{{ old('base_price', $service->base_price ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm">
        @error('base_price') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>