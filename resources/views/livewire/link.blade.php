<div class="col-md-6 pe-md-5 side-left">
    <div class="d-grid mb-xxl mt-xxl">
        <button class="btn btn-primary btn-lg text-white" type="button" wire:loading.attr="disabled" wire:target="create"
            wire:click="create">Tambah
            Link
            <div class="spinner-border text-light spinner-border-sm ms-2" role="status" wire:loading
                wire:target="create">
                <span class="sr-only">Loading...</span>
            </div>
        </button>
    </div>
    <ul wire:sortable="updateLinkOrder" class="list-group mb-5">
        @foreach ($data as $item)
            <li wire:sortable.item="{{ $item->id }}" wire:key="item-{{ $item->id }}"
                class="col-12 bg-white p-l mb-l list-group-item rounded-s border border-neutral-20">
                <div class="row mb-l">
                    <div class="col-11">
                        <div class="row">
                            <div class="col-12 mb-s">
                                <input type="text" value="{{ $item->name }}"
                                    wire:change="update($event.target.value, {{ $item->id }},{{ '"name"' }})"
                                    class="form-control border-0 bg-white p-0 shadow-none rounded-0 text-l"
                                    id="title-{{ $item->id }}" placeholder="Title">
                            </div>
                            <div class="col-12">
                                <input type="text" value="{{ $item->url }}"
                                    wire:change="update($event.target.value, {{ $item->id }},{{ '"url"' }})"
                                    class="form-control link border-0 bg-white p-0 shadow-none rounded-0 text-s"
                                    id="title-{{ $item->id }}" placeholder="Url">
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <i class="fa fa-bars float-end fs-5" wire:sortable.handle></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input fs-5" style="margin-left:-2em" type="checkbox"
                                id="flexSwitchCheckChecked" @if ($item->status == 'active' && $item->name != '' && $item->url != '') checked @endif
                                @if ($item->name == '' || $item->url == '') disabled @endif
                                wire:change="update($event.target.checked, {{ $item->id }},{{ '"status"' }})">
                        </div>
                    </div>
                    <div class=" col-6">
                        <i class="fa fa-trash float-end fs-5"
                            wire:click="delete({{ $item->id }}, {{ $item->userId }}, {{ $item->order }})"></i>
                    </div>
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