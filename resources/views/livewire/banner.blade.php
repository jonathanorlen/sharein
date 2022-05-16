<div class="col-md-6 pe-md-5 side-left">
    <div class="d-grid mb-xxl mt-xxl">
        <button class="btn btn-primary btn-lg text-white" type="button" data-bs-toggle="modal"
            data-bs-target="#bannerFormModal">Tambah
            Banner</button>
    </div>
    <div wire:sortable="updateLinkOrder">
        @foreach ($data as $item)
            <div class="col-md-12 mb-4" wire:sortable.item="{{ $item->id }}">
                <div class=" card border-neutral-20 border">
                    <div class="image-ratio rounded-top rounded-3"
                        style="background-image:url('{{ url('uploads/banner/' . $item->image) }}')">
                        <div style="width: 40px; height:40px; background-color:#fff; border-radius:100px; top: 13% !important;"
                            class="d-flex aligns-items-center justify-content-center position-absolute end-0 translate-middle"
                            wire:sortable.handle>
                            <img src="{{ asset('icons/menu.svg') }}" alt="menu" style="width: 24px">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column bd-highlight">
                            <div class="">
                                <input type="text" value="{{ $item->link }}"
                                    wire:change="update($event.target.value, {{ $item->id }},{{ '"link"' }})"
                                    class="form-control border-0 bg-white p-0 shadow-none rounded-0 fs-5"
                                    placeholder="Link">
                                    @error('link_'.$item->id)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input fs-5" style="margin-left:-2em" type="checkbox"
                                            id="flexSwitchCheckChecked" @if ($item->status == 'active') checked @endif
                                            wire:change="update($event.target.checked, {{ $item->id }},{{ '"status"' }})">
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <img src="{{ asset('icons/trash-2.svg') }}"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        wire:click="setDelete({{ $item->id }}, {{ $item->userId }}, {{ $item->order }})"
                                        alt="menu" class="float-end">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="bannerFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        @livewire('banner-form')

    </div>
    <div class="mt-5"></div>
    @livewire('component.modal-delete')

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
            /* 1:1 Aspect Ratio */
            position: relative;
            /* If you want text inside of it */
        }

    </style>
@endpush


@push('scripts')
    <script>
        window.addEventListener('hide-modal', event => {
            var modal = document.getElementById('bannerFormModal') // relatedTarget
            // myModal.hide(modal)
            var myModal = new bootstrap.Modal(document.getElementById('bannerFormModal'), {})
            myModal.hide(modal)
            document.querySelectorAll('.modal-backdrop').forEach(function(a) {
                a.remove()
            })
        })
    </script>
@endpush
