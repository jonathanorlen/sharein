<div class="col-md-6 pe-md-5 side-left">
    <div class="d-grid mb-xxl mt-xxl">
        <button class="btn btn-primary btn-lg text-white" type="button" wire:loading.attr="disabled" wire:target="create"
            wire:click="create">Tambah
            Link
            <div class="spinner-border text-light spinner-border-sm ms-2" role="status" wire:loading
                wire:target="create">
                <span class="sr-only"></span>
            </div>
        </button>
    </div>
    <ul wire:sortable="updateLinkOrder" class="list-group mb-5">
        @foreach ($data as $item)
            <li wire:sortable.item="{{ $item->id }}" wire:key="item-{{ $item->id }}"
                class="col-12 bg-white p-l mb-l list-group-item rounded-s border border-neutral-20">
                <div class="row mb-l">
                    <div class="col-10">
                        <div class="row">
                            <div class="col-12 mb-s">
                                <label for="title-{{ $item->id }}" class="form-label d-none">Title Link</label>
                                <input type="text" value="{{ $item->title }}"
                                    wire:change="update($event.target.value, {{ $item->id }},{{ '"title"' }})"
                                    class="form-control border-0 bg-white p-0 shadow-none rounded-0 text-l"
                                    id="title-{{ $item->id }}" placeholder="Title">
                            </div>
                            <div class="col-12">
                                <label for="urk-{{ $item->id }}" class="form-label d-none">Link</label>
                                <input type="text" value="{{ $item->url }}"
                                    wire:change="update($event.target.value, {{ $item->id }},{{ '"url"' }})"
                                    class="form-control link border-0 bg-white p-0 shadow-none rounded-0 text-s"
                                    id="urk-{{ $item->id }}" placeholder="Url">
                                @error('url_' . $item->id)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('icons/menu.svg') }}" wire:sortable.handle alt="menu"
                            class="float-end">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check form-switch">
                            <input class="form-check-input fs-5 text-neutral-100" style="margin-left:-2em"
                                type="checkbox" id="flexSwitchCheckChecked"
                                @if ($item->status == 'active' && $item->name != '' && $item->url != '') checked @endif
                                @if ($item->name == '' || $item->url == '') disabled @endif
                                wire:change="update($event.target.checked, {{ $item->id }},{{ '"status"' }})">
                        </div>
                    </div>
                    <div class=" col-6">
                        <img src="{{ asset('icons/trash-2.svg') }}" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"
                            wire:click="setDelete({{ $item->id }}, {{ $item->userId }}, {{ $item->order }})"
                            alt="menu" class="float-end">
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="mt-5"></div>
    @livewire('component.modal-delete')
</div>
@push('scripts')
    <script>
        console.clear();
    </script>
@endpush
@push('styles')
    <style>
        .draggable-mirror {
            background-color: white !important;
            width: 50%;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            list-style-type: none;
        }

        .side-left {
            /* height: 100%; */
            height: calc(100vh - 140px);
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
