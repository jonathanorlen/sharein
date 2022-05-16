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
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @stack('styles')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-light" style="overflow: hidden; position: relative;">
    <x-jet-banner />
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @include('layouts.component.header')

    <!-- Page Content -->
    <main class="container">
        <div class="row">
            {{ $slot }}
            <div class="col-md-6 d-md-flex align-items-center d-none">
                <iframe src="http://127.0.0.1:8000/{{ auth()->user()->domain }}" title="description"
                    class="col-md-5 col-sm-7 mx-auto" style="height: 85%" id="frame"></iframe>
            </div>
        </div>
    </main>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    @stack('modals')
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1800">
        <div id="warningToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-warning text-light">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto" id="warningHeader">Warning!</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="warningBody">
                Hello, world! This is a toast message.
            </div>
        </div>
        <div id="dangerToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-light">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto" id="dangerHeader">Fail!</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="dangerBody">
                Hello, world! This is a toast message.
            </div>
        </div>

        <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-light">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto" id="successHeader">Success!</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="successBody">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer data-turbolinks-track="reload"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    @stack('scripts')

    <script>
        window.addEventListener('refreshIframe', event => {
            document.getElementById('frame').contentDocument.location.reload(true);
        });
        feather.replace()

        window.addEventListener('toast', event => {
            console.log("10");
            toast(event.detail.header, event.detail.message, event.detail.status);
        })

        function toast($header = null, $message = null, $status = null) {
            if ($status == 'danger') {
                var toastLiveExample = document.getElementById('dangerToast')
                document.getElementById("dangerBody").innerHTML = $message;
                document.getElementById("dangerHeader").innerHTML = $header;
            } else if ($status == 'warning') {
                var toastLiveExample = document.getElementById('warningToast')
                document.getElementById("warningBody").innerHTML = $message;
                document.getElementById("warningHeader").innerHTML = $header;
            } else {
                var toastLiveExample = document.getElementById('successToast')
                document.getElementById("successBody").innerHTML = $message;
                document.getElementById("successHeader").innerHTML = $header;
            }
            var toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        }
    </script>
</body>

</html>
