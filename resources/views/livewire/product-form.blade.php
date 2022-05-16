<div class="col-md-6 mt-4 offset-md-3">
    <div class="card p-4">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <img src="{{ url('uploads/product/' . $old_image) }}" alt="" class="w-100">
                {{-- <div class="image-ratio rounded-top rounded-3"
                    style="background-image:url({{ url('uploads/product/' . $old_image) }})">
                </div> --}}
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Gambar</label>
            <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror"
                id="exampleFormControlInput1" placeholder="">
            @error('image')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
            <input type="text" wire:model="title" class="form-control  @error('title') is-invalid @enderror"
                id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kategori</label>
            <select wire:model="category" class="form-control  @error('category') is-invalid @enderror">
                <option value="" hidden>Pilih Kategori</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->title }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror"
                id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button @if ($type != 'edit') wire:click="create"@else wire:click="update" @endif
            class="btn btn-primary btn-lg" type="button">Simpan
            <div wire:loading wire:target="create" class="spinner-border text-light spinner-border-sm ms-2"
                role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </button>
    </div>
</div>
    @push('styles')
        <style>
            <style>.image-ratio {
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                width: 100%;
                padding-top: 100%;
                /* 1:1 Aspect Ratio */
                position: relative;
                /* If you want text inside of it */
            }

        </style>
    @endpush
