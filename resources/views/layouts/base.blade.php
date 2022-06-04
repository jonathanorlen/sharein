<html>

<head>
    <meta charset="utf-8">
    <title>{{ $data['profile_title'] }} | ShareIn </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if ($data['seo_title'])
        <meta name="og:title" property="og:title" content="{{ $data['seo_title'] }}">
    @endif
    @if ($data['seo_description'])
        <meta name="description" content="{{ $data['seo_description'] }}">
    @endif
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('plugin/owlcarousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/owlcarousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/photoswipe/photoswipe.css') }}">
    @livewireStyles
    <style>
        :root {
            --landing-background-color: {{ $data['background_color'] }};
            --landing-color: {{ $data['color'] }};
            --landing-background: {{ $data['background'] }};
        }

    </style>
    @stack('style')
</head>

<body class="background-color">
    <div class="container @if (request()->segment(2)) px-0 px-md-2 @endif">
        <div class="row justify-content-md-center @if (request()->segment(2)) pt-0 @else pt-5 @endif">
            {{-- <div class="col-md-6 col-12"> --}}
            {{ $slot }}
            {{-- </div> --}}
        </div>
    </div>
    <div class="position-fixed bottom-0 start-50 translate-middle-x p-3" style="z-index: 1800">
        <div class="toast align-items-center text-white bg-success border-0" id="toast-success" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Link berhasil di copy
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    {{-- <button class="btn btn-primary position-absolute top-0 end-0">Oke</button> --}}
    <script src="{{ asset('plugin/owlcarousel/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('plugin/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script type="module">
        import PhotoSwipeLightbox from '{{ asset('plugin/photoswipe/photoswipe-lightbox.esm.min.js') }}';
        const lightbox = new PhotoSwipeLightbox({
            bgOpacity: 0.6,
            gallery: '#my-gallery',
            children: 'a',
            pswpModule: () => import('{{ asset('plugin/photoswipe/photoswipe.esm.js') }}')
        });
        lightbox.init();

        const share_button = document.querySelector('#share-button');
        share_button.addEventListener('click', () => {
            const URL = window.location.href.slice(7);

            navigator.clipboard.writeText(URL);
        });
    </script>
    <script>
        function toastSuccess() {
            var toastLiveExample = document.getElementById('toast-success')
            var toast = new bootstrap.Toast(toastLiveExample)
            console.log("oke");
            toast.show()
        }

        $(document).ready(function() {

            $('.grid-masonry').masonry({
                itemSelector: '.grid-item'
            });

            $(".owl-carousel").owlCarousel({
                loop: true,
                items: 1,
                center: true,
                dots: true,
                dotsEach: true,
                autoplay: true,
                autoplayTimeout: 4000
            });
        });

        var $container = $('.masonry-container');

        $('a[data-bs-toggle=tab]').each(function() {
            var $this = $(this);
            $this.on('shown.bs.tab', function() {
                $container.imagesLoaded(function() {
                    $container.masonry({
                        columnWidth: '.masonry-item',
                        itemSelector: '.masonry-item'
                    });
                });
            });
        });
    </script>
    @livewireScripts

    @stack('script')

    <!-- Meta Pixel Code -->
    @if ($data['facebook_pixel_id'])
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $data['facebook_pixel_id'] }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ $data['facebook_pixel_id'] }}&ev=PageView&noscript=1" /></noscript>
    @endif
    <!-- End Meta Pixel Code -->
</body>

</html>
