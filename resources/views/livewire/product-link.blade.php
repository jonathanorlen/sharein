<div class="col-md-6 mt-4 offset-md-3">
    <div class="card p-2">
        <div class="d-flex flex-row gap-3">
            <img src="{{ url('uploads/product/' . $image) }}" alt="" style="width: 15% !important;height: auto; ">
            <div class="d-flex flex-column">
                <span class="h4">{{ $title }}</span>
                <span>{{ $price }}</span>
            </div>
        </div>
    </div>
    <div class="d-grid mb-xl mt-xxl">
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
        @foreach ($links as $item)
            <li wire:sortable.item="{{ $item->id }}" wire:key="item-{{ $item->id }}"
                class="col-12 bg-white p-l mb-l list-group-item rounded-s border border-neutral-20">
                <div class="row mb-l">
                    <div class="col-10">
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
                        <img src="{{ asset('icons/trash-2.svg') }}" wire:click="setDelete({{ $item->id }})"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            wire:click="delete({{ $item->id }}, {{ $item->userId }}, {{ $item->order }})"
                            alt="menu" class="float-end">
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    @livewire('component.modal-delete')
</div>
@push('styles')
    <style>
        <style>.image-ratio {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            padding-top: 100%;
            /* 1:1 Aspect Ratio */
            position: relative;
            /* If you want text inside of it */
        }

    </style>
@endpush
