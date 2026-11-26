<div class="mp-field">
    <label for="name">Jenis Layanan</label>
    <input id="name" type="text" name="name" class="mp-input" value="{{ old('name', $service->name ?? '') }}">
    @error('name') <p class="mp-error">{{ $message }}</p> @enderror
</div>
<div class="mp-field">
    <label for="category">Kategori</label>
    <input id="category" type="text" name="category" class="mp-input" value="{{ old('category', $service->category ?? '') }}">
    @error('category') <p class="mp-error">{{ $message }}</p> @enderror
</div>
<div class="mp-field">
    <label for="description">Deskripsi</label>
    <textarea id="description" name="description" rows="4" class="mp-input">{{ old('description', $service->description ?? '') }}</textarea>
    @error('description') <p class="mp-error">{{ $message }}</p> @enderror
</div>
<div class="mp-field">
    <label for="base_price">Harga Dasar (Rp)</label>
    <input id="base_price" type="number" name="base_price" min="1" class="mp-input" value="{{ old('base_price', $service->base_price ?? '') }}">
    @error('base_price') <p class="mp-error">{{ $message }}</p> @enderror
</div>