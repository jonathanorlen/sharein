<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Upload Gambar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
            @if ($image)
                <img id="blah" src="{{ $image->temporaryUrl() }}" class="w-100" alt="your image" />
            @else
                <img src="{{ asset('attribute/image/placeholder-image.jpg') }}" alt="" class="w-100"
                    id="imageplaceholder">
            @endif
            <div class="mb-3 mt-3 p-3">
                <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror"
                    id="imgInp" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="modal-footer">
            <div class="row w-100">
                <div class="col-6">
                    <div class="d-grid">
                        <button type="button" class="btn btn-lg btn-light" data-bs-dismiss="modal">Batal</button>
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

@push('scripts')
    <script>
        window.addEventListener('hide-modal', event => {
            var modal = document.getElementById('galleryFormModal') // relatedTarget
            // myModal.hide(modal)
            var myModal = new bootstrap.Modal(document.getElementById('galleryFormModal'), {})
            myModal.hide(modal)
            document.querySelectorAll('.modal-backdrop').forEach(function(a) {
                a.remove()
            })
        })
    </script>
@endpush
