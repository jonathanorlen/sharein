<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.partials.head')
    @stack('styles')
</head>

<body class="font-sans antialiased bg-light">
    <!-- Page Heading -->
    <x-jet-banner />

    @livewire('navigation-menu')
    @if (!request()->is('panel/statistik*'))
        @include('layouts.partials.header')
    @endif



    <!-- Page Content -->
    <main class="container">
        <div class="row">
            {{ $slot }}
        </div>
    </main>

    @include('layouts.partials.modal-delete')
    @include('layouts.partials.toast')

    @stack('modals')

    @include('layouts.partials.scripts')
    @stack('scripts')
</body>

</html>
