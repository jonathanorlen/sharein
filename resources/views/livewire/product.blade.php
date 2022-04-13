<div class="col-md-6 pe-md-5">
    <div class="d-grid mb-4 mt-5">
        <a class="btn btn-primary btn-lg text-white" href="{{ route('product.create') }}">Tambah
            Produk
            <div wire:loading wire:target="create" class="spinner-border text-light spinner-border-sm ms-2"
                role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </a>
    </div>

    <div class="row">
        @foreach ($data as $item)
            <div class="col-6 col-sm-6 col-md-4">
                <div class="card rounded-3">
                    <div class="image-ratio rounded-top rounded-3"
                        style="background-image:url({{ url('uploads/product/' . $item->image) }})">
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column bd-highlight">
                            <div class="">
                                <span class="fs-5">{{ $item->title }}</span>
                            </div>
                            <div class="">
                                <span class="">{{ $item->price }}</span>
                            </div>
                            <div>
                                <i class="fa fa-trash float-end fs-5" wire:click="delete({{ $item->id }})"></i>
                                <a href="{{ route('product.edit', $item->id) }}">
                                    <i class="fa fa-pencil float-end me-2 fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <div class="col-md-4 rounded-3">
            <div class="card">
                <div class="image-ratio">
                </div>
            </div>
        </div>
        <div class="col-md-4 rounded-3">
            <div class="card">
                <div class="image-ratio">
                </div>
            </div>
        </div> --}}
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
</div>
