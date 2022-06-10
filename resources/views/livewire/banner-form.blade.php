<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
            @if ($image)
                {{-- <img id="blah" src="{{ $image->temporaryUrl() }}" class="w-100" alt="your image" /> --}}
                <div style="background-image:url('{{ $image->temporaryUrl() }}') " class="image-ratio">

                </div>
            @else
                <img src="{{ asset('attribute/image/rectangle.jpg') }}" alt="" class="w-100"
                    id="imageplaceholder">
            @endif
            <div class="mb-3 mt-3 p-3">
                <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror"
                    id="imgInp" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 p-3">
                <label for="validationServer02" class="form-label">Link</label>
                <input type="text" wire:model="link" class="form-control @error('link') is-invalid @enderror" id="link"
                    aria-describedby="linkHelp">
                @error('link')
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <div class="row w-100">
                <div class="col-6">
                    <div class="d-grid">
                        <button type="button" class="btn btn-lg btn-light" data-dismiss="modal">Batal</button>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-grid">
                        <button type="button" class="btn btn-lg btn-primary" wire:click="create">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <style>
        .image-ratio {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("{{ asset('attribute/image/placeholder-image.jpg') }}");
            width: 100%;
            padding-top: 50%;
            /* padding-left: 0%; */
            /* 1:1 Aspect Ratio */
            position: relative;
            /* If you want text inside of it */
        }
    </style>
@endpush
