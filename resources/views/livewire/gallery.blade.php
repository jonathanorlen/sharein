<div class="col-md-6 pe-md-5 side-left">
    <div class="d-grid mb-xxl mt-xxl">
        <button class="btn btn-primary btn-lg text-white" type="button" data-bs-toggle="modal"
            data-bs-target="#galleryFormModal">Tambah
            Galeri</button>
    </div>
    <div class="row gx-3 gy-3">
        @foreach ($data as $item)
            <div class="col-6 col-md-4 col-xs-6">
                <div class="card">
                    <div class="image-ratio rounded-top rounded-3"
                        style="background-image:url('{{ url('uploads/gallery/' . $item->image) }}') !important">
                        <div style="width: 40px; height:40px; background-color:#fff; border-radius:100px; bottom: 0% !important;"
                            class="d-flex aligns-items-center justify-content-center position-absolute end-0 translate-middle">
                            <img src="{{ asset('icons/trash-2.svg') }}" alt="menu" style="width: 24px"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                wire:click="setDelete({{ $item->id }})">
                        </div>
                        {{-- <div style="width: 40px; height:40px; background-color:#fff; border-radius:100px; bottom: -1% !important; right: 48px"
                            class="d-flex aligns-items-center justify-content-center position-absolute translate-middle">
                            <img src="{{ asset('icons/edit-3.svg') }}" alt="menu" style="width: 24px">
                        </div> --}}
                    </div>
                    {{-- <div class="card-body">
                        <div class="d-flex flex-column bd-highlight">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input fs-5" style="margin-left:-2em" type="checkbox"
                                            id="flexSwitchCheckChecked" @if ($item->status == 'active') checked @endif
                                            wire:change="update($event.target.checked, {{ $item->id }},{{ '"status"' }})">
                                    </div>
                                </div>
                                <div class=" col-6">
                                    <i class="fa fa-trash float-end fs-5"
                                        wire:click="delete({{ $item->id }}, {{ $item->userId }}, {{ $item->order }})"></i>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="galleryFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        @livewire('gallery-form')
    </div>
    @livewire('component.modal-delete')
    <div class="mt-5"></div>

</div>

@push('styles')
    <style>
        .image-ratio {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("{{ asset('attribute/image/placeholder-image.jpg') }}");
            width: 100%;
            padding-top: 100%;
            /* padding-left: 0%; */
            /* 1:1 Aspect Ratio */
            position: relative;
            /* If you want text inside of it */
        }

    </style>
@endpush
