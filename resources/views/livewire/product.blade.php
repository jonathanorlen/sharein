<div class="col-md-6 pe-md-5 side-left">
    <div class="d-grid mb-xxl mt-xxl">
        <a class="btn btn-primary btn-lg text-white" href="{{ route('product.create') }}">Tambah
            Produk
            <div wire:loading wire:target="create" class="spinner-border text-light spinner-border-sm ms-2"
                role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </a>
    </div>

    <div class="row gx-3 gy-3">
        @foreach ($data as $item)
            <div class="col-6 col-sm-6 col-md-4 ">
                <div class="card rounded-3 border-neutral-20 border">
                    <div class="image-ratio rounded-top rounded-3"
                        style="background-image:url({{ url('uploads/product/' . $item->image) }})">
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column bd-highlight">
                            <div class="">
                                <span class="h3 truncate-overflow ">{{ $item->title }}</span>
                            </div>
                            <div class="">
                                <span class="text-m text-primary">{{ format_rupiah($item->price) }}</span>
                            </div>
                            <div class="mt-2">
                                <img src="{{ asset('icons/trash-2.svg') }}"
                                    wire:click="setDelete({{ $item->id }})"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    alt="menu" class="float-end">
                                <a href="{{ route('product.edit', $item->id) }}">
                                    <img src="{{ asset('icons/edit-3.svg') }}" alt="menu" class="float-end me-2">
                                </a>
                                <a href="{{ route('product.link', $item->id) }}">
                                    <img src="{{ asset('icons/link.svg') }}" alt="menu" class="float-end me-2">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @livewire('component.modal-delete')
</div>


@push('styles')
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

    .draggable-mirror {
        background-color: white !important;
        width: 50%;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        list-style-type: none;
    }

    .side-left {
        height: calc(100vh - 110px);
        overflow-y: scroll;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 4px;
        border-radius: 10px
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

</style>
@endpush