<div class="col-md-6 pe-md-5 side-left">
    <div class="d-grid mb-xxl mt-xxl">
        <button wire:loading.attr="disabled" wire:target="create" class="btn btn-primary btn-lg text-white" type="button"
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
                class="col-12 bg-white px-4 py-3 mb-2 list-group-item border-neutral-20 border">
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
                        {{-- <img src="{{ asset('icons/eye.svg') }}"
                            alt="menu" class="float-end me-2"> --}}
                        <img src="{{ asset('icons/trash-2.svg') }}"
                            wire:click="setDelete({{ $item->id }}, {{ $item->userId }}, {{ $item->order }})"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="menu" class="float-end me-4">
                        <img src="{{ asset('icons/menu.svg') }}" wire:sortable.handle alt="menu"
                            class="float-end" wire:sortable.handle>
                    </div>
                    {{-- <div class="col-1">
                        <i class="fa fa-bars float-end fs-5" wire:sortable.handle></i>
                    </div> --}}
                </div>
            </li>
        @endforeach
    </ul>
    <div class="mt-5" style="height: 100px"></div>
    @livewire('component.modal-delete')

</div>
