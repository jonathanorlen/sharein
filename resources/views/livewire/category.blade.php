<div class="col-md-6 pe-md-5 side-left">
    <div class="d-grid mb-4 mt-5">
        <button wire:loading.attr="disabled" wire:target="store" class="btn btn-primary btn-lg text-white" type="button"
            wire:click="create">Tambah
            Kategori
            <div wire:loading wire:target="create" class="spinner-border text-light spinner-border-sm ms-2"
                role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </button>
    </div>
    <ul wire:sortable="updateOrder" class="list-group mb-5">
        @foreach ($data as $item)
            <li wire:sortable.item="{{ $item->id }}" wire:key="item-{{ $item->id }}"
                class="col-12 bg-white px-4 py-3 mb-2 list-group-item">
                <div class="row">
                    <div class="col-12 d-flex align-items-center">
                        <input type="text" value="{{ $item->title }}"
                            wire:change="update($event.target.value, {{ $item->id }},{{ '"title"' }})"
                            class="form-control border-0 bg-white p-0 shadow-none rounded-0"
                            id="title-{{ $item->id }}" placeholder="Title">
                        {{-- <div class="row">
                            <div class="col-12 mb-1">
                                <input type="text" value="{{ $item->title }}"
                                    wire:change="update($event.target.value, {{ $item->id }},{{ '"title"' }})"
                                    class="form-control border-0 bg-white p-0 shadow-none rounded-0"
                                    id="title-{{ $item->id }}" placeholder="Title">
                            </div>
                        </div> --}}
                        <i class="fa fa-eye float-end fs-5 me-2"></i>
                        <i class="fa fa-trash float-end fs-5 me-4"
                            wire:click="delete({{ $item->id }}, {{ $item->userId }}, {{ $item->order }})"></i>
                        <i class="fa fa-bars float-end fs-5" wire:sortable.handle></i>
                    </div>
                    {{-- <div class="col-1">
                        <i class="fa fa-bars float-end fs-5" wire:sortable.handle></i>
                    </div> --}}
                </div>
            </li>
        @endforeach
    </ul>
    <div class="mt-5" style="height: 100px"></div>

    @push('styles')
        <style>
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
