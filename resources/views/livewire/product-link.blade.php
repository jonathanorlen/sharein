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
                                @if ($item->status == 'active' && $item->title != '' && $item->url != '') checked @endif
                                @if ($item->title == '' || $item->url == '') disabled @endif
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
    @livewire('component.modal-delete')
</div>
@push('styles')
    <style>
        .image-ratio {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100%;
            padding-top: 100%;
            /* 1:1 Aspect Ratio */
            position: relative;
            /* If you want text inside of it */
        }
    </style>
@endpush
