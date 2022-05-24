<div class="col-12 col-sm-6 col-md-5">
    <div class="d-flex flex-column align-items-center mb-5">
        <img src="@if ($user->profile_picture) {{ asset('uploads/profile/' . $user->profile_picture) }}  @else {{ asset('attribute/image/placeholder-image.jpg') }} @endif"
            class="mb-4" alt="logo" style="width: 108px;height: 108px;border-radius: 50%;display: block;">
        <div class="d-flex flex-column align-items-center gap-0 @if (@$social_media->unanswered_question_count > 4) mb-3 @endif">
            <span class="h3 text-center mb-1" style="font-weight: 600;">
                {{ $user->profile_title ?? 'My Bisnis' }}
            </span>
            <span class="h6 text-center text-neutral-70" style="font-weight: 400;">
                {!! $user->bio !!}
            </span>
        </div>
        <div class="d-flex gap-2 flex-wrap justify-content-center">
            @if (@$social_media->whatsapp)
                <a href="http://wa.me/62{{ $social_media->whatsapp }}" target="_blank"
                    class="btn btn-circle btn-circle-color btn-links"
                    wire:click="addVisitor({{ $userId }},'social:whatsapp')"><i class="bx bxl-whatsapp"
                        style=""></i></a>
            @endif
            @if (@$social_media->instagram)
                <a href="https://instagram.com/{{ $social_media->instagram }}" target="_blank"
                    class="btn btn-circle btn-circle-color btn-links" target="_blank"
                    wire:click="addVisitor({{ $userId }},'social:instagram')"><i class="bx bxl-instagram"
                        style=""></i></a>
            @endif
            @if (@$social_media->tiktok)
                <a href="https://www.tiktok.com/@{{ $social_media - > tiktok }}" target="_blank"
                    class="btn btn-circle btn-circle-color btn-links" target="_blank"
                    wire:click="addVisitor({{ $userId }},'social:tiktok')"><i class="bx bxl-tiktok"
                        style=""></i></a>
            @endif
            @if (@$social_media->twitter)
                <a href="https://www.twitter.com/{{ $social_media->twitter }}" target="_blank"
                    class="btn btn-circle btn-circle-color btn-links" target="_blank"
                    wire:click="addVisitor({{ $userId }},'social:twitter')"><i class="bx bxl-twitter"
                        style=""></i></a>
            @endif
            @if (@$social_media->email)
                <a href="mailto:{{ $social_media->email }}" target="_blank"
                    class="btn btn-circle btn-circle-color btn-links" target="_blank"
                    wire:click="addVisitor({{ $userId }},'social:email')"><i class="bx bx-envelope"
                        style=""></i></a>
            @endif
            @if (@$social_media->facebook)
                <a href="https://facebook.com/{{ $social_media->facebook }}" target="_blank"
                    class="btn btn-circle btn-circle-color btn-links" target="_blank"
                    wire:click="addVisitor({{ $userId }},'social:facebook')"><i class="bx bxl-facebook"
                        style=""></i></a>
            @endif
            @if (@$social_media->telegram)
                <a href="https://t.me/{{ $social_media->telegram }}"
                    class="btn btn-circle btn-circle-color btn-links" target="_blank"
                    wire:click="addVisitor({{ $userId }},'social:telegram')"><i class="bx bxl-telegram"
                        style=""></i></a>
            @endif
            @if (@$social_media->youtube)
                <a href="https://www.youtube.com/c/{{ $social_media->youtube }}"
                    class="btn btn-circle btn-circle-color btn-links" target="_blank"
                    wire:click="addVisitor({{ $userId }},'social:youtube')"><i class="bx bxl-youtube"
                        style=""></i></a>
            @endif
        </div>
    </div>
    {{-- <div style="overflow-x: auto"> --}}
    <div>
        <ul class="nav nav-tabs mb-3 d-flex justify-content-center flex-nowrap" id="myTab" role="tablist">
            @if ($total_product > 0 || !$links->isEmpty() || !$banners->isEmpty())
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Home</a>
                </li>
            @endif
            @if (!$galleries->isEmpty())
                <li class="nav-item">
                    <a class="nav-link" id="gallery-tab" data-bs-toggle="tab" href="#galeri" role="tab"
                        aria-controls="galeri" aria-selected="false">Galeri</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" id="tentang_kami-tab" data-bs-toggle="tab" href="#tentang_kami" role="tab"
                    aria-controls="tentang_kami" aria-selected="false">Tentang Kami</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane container fade show active p-1 p-md-3" id="home" role="tabpanel"
            aria-labelledby="home-tab">
            <div class="mb-4">
                <div class="owl-carousel owl-theme">
                    @foreach ($banners as $item)
                        <div>
                            <a @if ($item->link) href="{{ $item->link }}" target="_blank" @endif>
                                <img src="{{ asset('uploads/banner/' . $item->image) }}" alt="" srcset="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-grid gap-3 @if ($links->count() <= $user->link_limit) mb-5 @endif" id="list-link">
                @foreach ($links as $item)
                    <a href="{{ $item->url }}" target="_blank"
                        class="btn btn-links btn-color smooth-transation @if ($loop->iteration > $user->link_limit) d-none @else d-flex @endif align-items-center justify-content-center"
                        type="button" style="height: 50px" wire:click="addVisitor({{ $item->id }},'link')">
                        {{ $item->name }}</a>
                @endforeach
            </div>
            @if ($links->count() > $user->link_limit)
                <div onclick="showLink()" class="mb-5 text-color text-center mt-l text-l" id="show-more">Lainnya <i
                        class='bx bx-chevron-down' id="show-more-icon"></i></div>
                <div onclick="showLink()" class="mb-5 text-color text-center mt-l text-l d-none" id="show-more-close">
                    Kurangi
                    <i class='bx bx-chevron-up' id="show-more-icon"></i>
                </div>
            @endif
            @if ($total_product > 0)
                <div class="mb-2">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Cari Produk"
                        wire:model="search">
                </div>
                @if ($categories->count() > 0)
                    <div>
                        <div class="menu container col-md-12 py-0 px-0">
                            <ul class="list-group list-group-horizontal py-2">
                                <li class="list-group-item border-0 p-0 mx-0 bg-transparent">
                                    <input type="radio" class="btn-check" name="category" id="semua"
                                        autocomplete="off" checked value="" wire:model="select_category">
                                    <label class="btn btn-outline-color pt-s pb-s rounded-pill text-m me-m"
                                        for="semua">Semua</label>
                                </li>
                                @foreach ($categories as $item)
                                    <li class="list-group-item border-0 p-0 mx-0 bg-transparent">
                                        <input type="radio" class="btn-check" name="category"
                                            id="{{ $item->title . $item->order }}" value="{{ $item->id }}"
                                            autocomplete="off" wire:model="select_category">
                                        <label class=" btn btn-outline-color pt-s pb-s rounded-pill text-m me-m"
                                            for="{{ $item->title . $item->order }}">{{ $item->title }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="row mt-l gx-3 gy-3">
                    @foreach ($products as $item)
                        <a href="{{ route('landing_page_product', [$userDomain, $item->id]) }}"
                            class="col-6 text-decoration-none">
                            <div class="card rounded-3">
                                <div class="image-ratio rounded-top rounded-3"
                                    style="background-image:url({{ url('uploads/product/' . $item->image) }})">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column bd-highlight">
                                        <div class="">
                                            <h3 class="truncate-overflow text-neutral-100">{{ $item->title }}</h3>
                                        </div>
                                        <div class="">
                                            <span class="text-m text-color">{{ format_rupiah($item->price) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="tab-pane container fade p-1 p-md-3" id="galeri" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row gx-2 gy-2 masonry-container" data-masonry='{"percentPosition": true }' id="my-gallery">
                @foreach ($galleries as $item)
                    <a href="{{ asset('uploads/gallery/' . $item->image) }}" data-pswp-width="800"
                        data-pswp-height="1500" target="_blank" class="col-6 masonry-item">
                        <img src="{{ asset('uploads/gallery/' . $item->image) }}" class="w-100" alt="">
                    </a>
                @endforeach
            </div>
        </div>
        <div class="tab-pane container fade p-1 p-md-3" id="tentang_kami" role="tabpanel" aria-labelledby="contact-tab">
            <span class="text-l text-neutral-80 w-100 text-justify">
                {{ $user->about }}
            </span>
            <div class="maps mt-xl mb-xl">
                {!! $user->maps !!}
                <div class="text-l text-neutral-100 mt-l">
                    {{ $user->address }}
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-transparent position-absolute top-0 end-0 mt-2 me-2 mt-md-4 me-md-4 p-2" id="share-button"
        onclick="toastSuccess()"><i class="bx bx-share-alt fs-4" style=""></i></button>
</div>
@push('style')
    <style>
        :root {
            --landing-background-color: {{ $user->background_color }};
            --landing-color: {{ $user->color }};
            --landing-background: {{ $user->background ?: '#FFFFFF' }};
        }

    </style>
@endpush
@push('script')
    <script>
        const showLink = () => {
            let linkList = document.getElementById('list-link')
            for (i = 1; i <= linkList.children.length; i++) {
                document.getElementById('show-more').classList.toggle("d-none")
                document.getElementById('show-more-close').classList.toggle("d-none")
                if (i >= {{ $user->link_limit }}) {
                    linkList.children[i].classList.toggle("d-flex")
                    linkList.children[i].classList.toggle("d-none")
                }
            }

        }
    </script>
@endpush
