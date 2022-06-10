<div class="col-md-6 mt-4 offset-md-3">
    <div class="card p-4">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <img src="@if ($image) {{ $image->temporaryUrl() }} @elseif($old_image) {{ url('uploads/product/' . $old_image) }} @endif"
                    alt="" class="w-100">
                {{-- <div class="image-ratio rounded-top rounded-3"
                    style="background-image:url({{ url('uploads/product/' . $old_image) }})">
                </div> --}}
            </div>
        </div>
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Gambar<span
                    class="text-danger">*</span></label>
            <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror"
                id="exampleFormControlInput1" placeholder="" wire:loading.attr="disabled" wire:target="create,update">
            @error('image')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk<span
                    class="text-danger">*</span></label>
            <input type="text" wire:model.lazy="title" class="form-control  @error('title') is-invalid @enderror"
                id="exampleFormControlInput1" placeholder="" wire:loading.attr="disabled" wire:target="create,update">
            @error('title')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Kategori</label>
            <select wire:model.lazy="category" class="form-control  @error('category') is-invalid @enderror"
                wire:loading.attr="disabled" wire:target="create,update">
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
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Harga<span
                    class="text-danger">*</span></label>
            <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror"
                id="exampleFormControlInput1" placeholder="" wire:loading.attr="disabled" wire:target="create,update">
        </div>
        {{-- <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea wire:model.lazy="description" class="form-control @error('description') is-invalid @enderror"
                id="exampleFormControlTextarea1" rows="3" wire:loading.attr="disabled"
                wire:target="create,update"></textarea>
        </div> --}}
        <div class="" wire:ignore>
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea id="summernote" wire:model.lazy="description">
            </textarea>
        </div>
    </div>
    {{-- <div class="mt-xxl h3 text-neutral-90 fw-bold">SEO</div>
    <div class="card p-4 mt-1">
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="" id="" class="form-control" wire:model="seo_title">
            @error('seo_title')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <input type="text" id="seo_description" class="form-control" wire:model="seo_description">
            @error('seo_description')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="mt-xxl h3 text-neutral-90 fw-bold">Analitik</div>
    <div class="card p-4 mt-1">
        <div class="">
            <label for="exampleFormControlInput1" class="form-label">Facebook Pixel ID</label>
            <input type="text" name="" id="" class="form-control" wire:model="facebook_pixel_id">
            @error('facebook_pixel_id')
                <span class=" text-danger error">{{ $message }}</span>
            @enderror
        </div>
    </div> --}}

    <div class="d-grid mb-xxl mt-xl">
        <button @if ($type != 'edit') wire:click="create"@else wire:click="update" @endif
            class="btn btn-primary btn-lg" type="button" wire:loading.attr="disabled" wire:target="create,update">Simpan
            <div wire:loading wire:target="create,update" class="spinner-border text-light spinner-border-sm ms-2"
                role="status">
                <span class="visually-hidden"></span>
            </div>
        </button>
    </div>
</div>
@push('styles')
    <link href="{{ asset('plugin/summernote/summernote.min.css') }}" rel="stylesheet">
    <style>
        .image-ratio {
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
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('plugin/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            console.clear();
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ],
                height: 200,
                callbacks: {
                    onChange: function(e) {
                        @this.set('description', e);
                    },
                }
            });
        });
    </script>
@endpush
