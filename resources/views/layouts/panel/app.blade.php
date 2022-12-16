<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.panel.partials.head')
    @stack('styles')
</head>

<body class="font-sans antialiased bg-light" style="overflow: hidden; position: relative;">
    <x-jet-banner />
    {{-- @livewire('navigation-menu') --}}

    <!-- Page Navigation -->
    @include('layouts.panel.partials.navigation')

    <!-- Page Content -->
    <main class="container mt-3 mt-md-5 p-3 p-sm-1">
        {{ $slot }}
    </main>


    @include('layouts.panel.partials.modal-delete')
    @include('layouts.panel.partials.toast')

    @stack('modals')

    @include('layouts.panel.partials.scripts')
    @stack('scripts')
</body>

</html>
