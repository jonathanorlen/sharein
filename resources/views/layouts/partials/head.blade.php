<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }} | Panel</title>
<link rel="shortcut icon" href="{{ asset('image/logo_title.png') }}" type="image/x-icon">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

<!-- Icon -->
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/feather-icons"></script> --}}
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


<!-- Styles -->
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@livewireStyles

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>

@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"></script>
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js" defer
    data-turbolinks-track="reload"></script>
