<div class="col-md-6 pe-md-5 side-left">
    <div class="d-grid mb-4 mt-5">
        <button class="btn btn-primary btn-lg text-white" type="button" data-bs-toggle="modal"
            data-bs-target="#bannerFormModal">Tambah
            Banner</button>
    </div>
    @foreach ($data as $item)
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="image-ratio rounded-top rounded-3"
                    style="background-image:url('{{ url('uploads/banner/' . $item->image) }}')">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column bd-highlight">
                        <div class="">
                            <input type="text" value="{{ $item->link }}"
                                wire:change="update($event.target.value, {{ $item->id }},{{ '"link"' }})"
                                class="form-control border-0 bg-white p-0 shadow-none rounded-0 fs-5" placeholder="Link">
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
                                <i class="fa fa-trash float-end fs-5"
                                    wire:click="delete({{ $item->id }}, {{ $item->userId }}, {{ $item->order }})"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="bannerFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        @livewire('banner-form')

    </div>
    <div class="mt-5" style="height: 100px"></div>
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
