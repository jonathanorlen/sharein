<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
    @stack('styles')
</head>

<body class="font-sans antialiased bg-light" style="overflow: hidden; position: relative;">
    <x-jet-banner />
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @include('layouts.partials.header')

    <!-- Page Content -->
    <main class="container">
        <div class="row">
            {{ $slot }}
            <div class="col-md-6 d-md-flex align-items-center d-none" id="preview" data-turbolinks-permanent>
                <iframe src="{{ url('/' . auth()->user()->domain) }}" title="description"
                    class="col-md-5 col-sm-7 mx-auto" style="height: 85%" id="frame"></iframe>
            </div>
        </div>
    </main>


    @include('layouts.partials.modal-delete')
    @include('layouts.partials.toast')

    @stack('modals')

    @include('layouts.partials.scripts')
    @stack('scripts')
</body>

</html>
