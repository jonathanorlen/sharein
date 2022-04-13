<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @stack('styles')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-light" style="overflow: hidden">
    <x-jet-banner />
    @livewire('navigation-menu')

    <!-- Page Heading -->
    <header class="d-flex py-3 bg-white shadow-sm border-bottom">
        <div class="container">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                    <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/link*') ? 'active' : '' }}"
                        href="{{ route('link') }}">
                        Link
                    </a>
                </li>
                <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                    <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/banner*') ? 'active' : '' }}"
                        href="{{ route('banner') }}">
                        Banner
                    </a>
                </li>
                <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                    <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/social-media*') ? 'active' : '' }}"
                        href="{{ route('socialMedia') }}">
                        Social Media
                    </a>
                </li>
                <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                    <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/product*') ? 'active' : '' }}"
                        href="{{ route('product') }}">
                        Produk
                    </a>
                </li>
                <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                    <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/category*') ? 'active' : '' }}"
                        href="{{ route('category') }} ">
                        Kategori
                    </a>
                </li>
                <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                    <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0 {{ request()->is('panel/gallery*') ? 'active' : '' }}"
                        href="{{ route('gallery') }}">
                        Galeri
                    </a>
                </li>
                <li class="list-group-item border-0 py-2 ps-0 pr-2 mx-0">
                    <a class="list-group-item border-0 py-0 ps-0 pr-0 mx-0" href=" http://127.0.0.1:8000/dashboard">
                        Pengaturan
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <!-- Page Content -->
    <main class="container">
        <div class="row">
            {{ $slot }}
            <div class="col-md-6 d-flex align-items-center">
                <iframe src="http://127.0.0.1:8000/{{ auth()->user()->domain }}" title="description"
                    class="col-md-5 col-sm-7 mx-auto" style="height: 85%" id="frame"></iframe>
            </div>
        </div>
    </main>

    @stack('modals')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @stack('scripts')

    <script>
        window.addEventListener('refreshIframe', event => {
            document.getElementById('frame').contentDocument.location.reload(true);
        });
        feather.replace()
    </script>
</body>

</html>
