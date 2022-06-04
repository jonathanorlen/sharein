<header class="d-flex py-3 bg-white shadow-sm border-bottom">
    <div class="menu container ps-0 pe-0">
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0 ms-3">
                <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/website/link*') ? 'active' : '' }}"
                    href="{{ route('link') }}">
                    Link
                </a>
            </li>
            <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/website/banner*') ? 'active' : '' }}"
                    href="{{ route('banner') }}">
                    Banner
                </a>
            </li>
            <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/website/social-media*') ? 'active' : '' }}"
                    href="{{ route('socialMedia') }}">
                    Social Media
                </a>
            </li>
            <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/website/product*') ? 'active' : '' }}"
                    href="{{ route('product') }}" data-turbolinks-action="replace">
                    Produk
                </a>
            </li>
            <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/website/category*') ? 'active' : '' }}"
                    href="{{ route('category') }} ">
                    Kategori
                </a>
            </li>
            <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/website/gallery*') ? 'active' : '' }}"
                    href="{{ route('gallery') }}">
                    Galeri
                </a>
            </li>
            <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/website/setting*') ? 'active' : '' }}"
                    href="{{ route('setting') }}">
                    Pengaturan
                </a>
            </li>
            <li class="list-group-item border-0 ms-auto">
                <div class="list-group-item border-0 py-0 ps-0 pr-0 mx-0">
                    <b> ShareIn : </b>
                    <span class="text-neutral-80">
                        {{ url('/' . auth()->user()->domain) }}
                    </span>
                    {{-- <button class="btn p-0 m-0" id="share-button" onclick="toastSuccess()"></button> --}}
                    <i class='bx bx-copy-alt h3 p-0 m-0' style="margin-bottom: -20px"></i>
                </div>
            </li>
        </ul>
    </div>
</header>
